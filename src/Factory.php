<?php

namespace Realodix\CsConfig;

use drupol\PhpCsFixerConfigsDrupal\Fixer as DrupolFixer;
use PhpCsFixer\Config;
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
     * @return \PhpCsFixer\Config
     */
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = []): Config
    {
        $finder = \PhpCsFixer\Finder::create()
                  ->files()
                  ->in(__DIR__);

        return (new \PhpCsFixer\Config($ruleSet->name()))
                ->registerCustomFixers(new \PedroTroller\CS\Fixer\Fixers)
                ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
                ->registerCustomFixers(self::customFixers())
                ->setFinder($finder)
                ->setRiskyAllowed(true)
                ->setRules(array_merge($ruleSet->rules(), $overrideRules ?? []));
    }

    private static function customFixers(): array
    {
        $PhpCsFixer = new \PhpCsFixer\Config;

        return [
            new CustomFixer\PhpStorm\BracesOneLineFixer,
            new CustomFixer\Symplify\BlankLineAfterStrictTypesFixer,
            new CustomFixer\Symplify\ParamReturnAndVarTagMalformsFixer,
            new DrupolFixer\BlankLineBeforeEndOfClass(
                $PhpCsFixer->getIndent(),
                $PhpCsFixer->getLineEnding()
            ),
            new DrupolFixer\ControlStructureCurlyBracketsElseFixer(
                $PhpCsFixer->getIndent(),
                $PhpCsFixer->getLineEnding()
            ),
            new DrupolFixer\InlineCommentSpacerFixer,
            new \SlamCsFixer\FinalAbstractPublicFixer,
            new \SlamCsFixer\FinalInternalClassFixer,
            new \SlamCsFixer\FunctionReferenceSpaceFixer,
            new \SlamCsFixer\InlineCommentSpacerFixer,
            new \SlamCsFixer\PhpFileOnlyProxyFixer(
                new \PhpCsFixer\Fixer\Basic\BracesFixer
            ),
            new \SlamCsFixer\Utf8Fixer,
        ];
    }
}
