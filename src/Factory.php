<?php

namespace Realodix\PhpCsFixerConfig;

use drupol\PhpCsFixerConfigsDrupal\Fixer as Drupol;
use PhpCsFixer\Config;
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
     */
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = []): Config
    {
        if (\PHP_VERSION_ID < $ruleSet->targetPhpVersion()) {
            throw new \RuntimeException(\sprintf(
                'Current PHP version "%s" is less than targeted PHP version "%s".',
                \PHP_VERSION_ID,
                $ruleSet->targetPhpVersion()
            ));
        }

        $config = new Config($ruleSet->name());
        $config
            ->setRiskyAllowed(true)
            ->setRules(\array_merge(
                $ruleSet->rules(),
                $overrideRules
            ))
            ->registerCustomFixers(
                new CustomFixers(),
                // Drupal
                new Drupol\BlankLineBeforeEndOfClass($config->getIndent(), $config->getLineEnding()),
                new Drupol\ControlStructureCurlyBracketsElseFixer($config->getIndent(), $config->getLineEnding()),
                new Drupol\InlineCommentSpacerFixer(),
                new Drupol\TryCatchBlock($config->getIndent(), $config->getLineEnding()),
            );

        return $config;
    }
}
