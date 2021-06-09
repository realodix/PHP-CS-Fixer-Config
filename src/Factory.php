<?php

namespace Realodix\PhpCsFixerConfig;

use PhpCsFixer\Config;
use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Finder;
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
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = [], array $options = []): ConfigInterface
    {
        if (\PHP_VERSION_ID < $ruleSet->targetPhpVersion()) {
            throw new \RuntimeException(\sprintf(
                'Current PHP version "%s" is less than targeted PHP version "%s".',
                \PHP_VERSION_ID,
                $ruleSet->targetPhpVersion()
            ));
        }

        $defaultFinder = Finder::create()
            ->files()
            ->in(__DIR__);

        // Resolve Config options
        $options['customFixers'] = $options['customFixers'] ?? [];
        $options['finder'] = $options['finder'] ?? $defaultFinder;
        $options['hideProgress'] = $options['hideProgress'] ?? false;
        $options['usingCache'] = $options['usingCache'] ?? true;
        $options['rules'] = array_merge($ruleSet->rules(), $overrideRules, $options['customRules'] ?? []);

        return (new Config($ruleSet->name()))
            ->registerCustomFixers(
                new CustomFixers(),
                $options['customFixers']
            )
            ->setFinder($options['finder'])
            ->setHideProgress($options['hideProgress'])
            ->setRiskyAllowed(true)
            ->setUsingCache($options['usingCache'])
            ->setRules(\array_merge(
                $options['rules']
            ));
    }
}
