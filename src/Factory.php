<?php

namespace Realodix\CsConfig;

use drupol\PhpCsFixerConfigsDrupal\Fixer as DrupolFixer;
use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\RuleSet\RuleSetInterface;

class Factory
{
    /**
     * Creates a configuration based on a rule set.
     *
     * @param RuleSetInterface $ruleSet
     * @param array            $overrideRules
     *
     * @throws \RuntimeException
     *
     * @return \PhpCsFixer\ConfigInterface
     */
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = []): ConfigInterface
    {
        // Meant to be used in vendor/ to get to the root directory
        $dir = \dirname(__DIR__, 4);
        $dir = realpath($dir) ?: $dir;

        $finder = \PhpCsFixer\Finder::create()
                  ->files()
                  ->in($dir);

        return (new \PhpCsFixer\Config($ruleSet->name()))
                ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
                ->registerCustomFixers(new \PedroTroller\CS\Fixer\Fixers())
                ->registerCustomFixers(self::customFixers())
                ->setFinder($finder)
                ->setRiskyAllowed(true)
                ->setRules(array_merge($ruleSet->rules(), $overrideRules));
    }

    private static function customFixers(): array
    {
        $indent = (new \PhpCsFixer\Config)->getIndent();
        $lineEnding = (new \PhpCsFixer\Config)->getLineEnding();

        return [
            new CustomFixer\PhpStorm\BracesOneLineFixer,
            new DrupolFixer\BlankLineBeforeEndOfClass($indent, $lineEnding),
            new DrupolFixer\ControlStructureCurlyBracketsElseFixer($indent, $lineEnding),
            new DrupolFixer\InlineCommentSpacerFixer(),
            new DrupolFixer\NewlineAfterLastCommaInArrayFixer($indent, $lineEnding),
            new DrupolFixer\TryCatchBlock($indent, $lineEnding),
        ];
    }
}
