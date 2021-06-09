<?php

namespace Realodix\PhpCsFixerConfig;

use PhpCsFixer\Config;
use PhpCsFixer\ConfigInterface;
use PhpCsFixerCustomFixers\Fixers as CustomFixers;
use Realodix\PhpCsFixerConfig\RuleSet\RuleSetInterface;

final class Factory
{
    /**
     * Creates a configuration based on a rule set.
     *
     * @param array<string, array|bool> $overrideRules
     *
     * @throws \RuntimeException
     *
     * @return \PhpCsFixer\ConfigInterface
     */
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = []): ConfigInterface
    {
        if (\PHP_VERSION_ID < $ruleSet->targetPhpVersion()) {
            throw new \RuntimeException(\sprintf(
                'Current PHP version "%s" is less than targeted PHP version "%s".',
                \PHP_VERSION_ID,
                $ruleSet->targetPhpVersion()
            ));
        }

        return (new Config($ruleSet->name()))
            ->registerCustomFixers(new CustomFixers())
            ->setRiskyAllowed(true)
            ->setRules(\array_merge(
                $ruleSet->rules(),
                $overrideRules
            ));
    }
}
