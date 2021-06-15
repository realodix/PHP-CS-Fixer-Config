<?php

namespace Realodix\CsConfig;

use drupol\PhpCsFixerConfigsDrupal\Fixer as DrupolFixer;
use PhpCsFixer\Finder;
use Realodix\CsConfig\RuleSet\RuleSetInterface;

final class Factory
{
    /**
     * @param string $name
     */
    private static function phpCsFixer(string $name = 'default')
    {
        return new \PhpCsFixer\Config($name);
    }

    /**
     * Creates a configuration based on a rule set.
     *
     * @param RuleSetInterface $ruleSet
     * @param array            $overrideRules
     *
     * @throws \RuntimeException
     */
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = [])
    {
        $finder = Finder::create()
                  ->files()
                  ->in(__DIR__);

        return self::phpCsFixer($ruleSet->name())
                ->registerCustomFixers(new \PedroTroller\CS\Fixer\Fixers)
                ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
                ->registerCustomFixers(self::customFixers())
                ->setFinder($finder)
                ->setRiskyAllowed(true)
                ->setRules(array_merge($ruleSet->rules(), $overrideRules ?? []));
    }

    private static function customFixers(): array
    {
        return [
            new CustomFixer\PhpStorm\BracesOneLineFixer,
            new CustomFixer\Symplify\BlankLineAfterStrictTypesFixer,
            new CustomFixer\Symplify\ParamReturnAndVarTagMalformsFixer,
            new DrupolFixer\BlankLineBeforeEndOfClass(
                self::phpCsFixer()->getIndent(),
                self::phpCsFixer()->getLineEnding()
            ),
            new DrupolFixer\ControlStructureCurlyBracketsElseFixer(
                self::phpCsFixer()->getIndent(),
                self::phpCsFixer()->getLineEnding()
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
