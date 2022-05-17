<?php

namespace Realodix\CsConfig\RuleSet;

use PhpCsFixerCustomFixers\Fixer;

final class RealodixPlus extends AbstractRuleSet
{
    protected $name = 'Realodix Coding Standards (strict)';

    public function getRules(): array
    {
        $baseRules = (new Realodix())->getRules();

        $rules = [
            'no_superfluous_elseif'  => true,
            'binary_operator_spaces' => [
                // Diff https://github.com/matt-allan/laravel-code-style/blob/b224862/src/Config.php#L26
                'operators' => [
                    '=>' => 'align_single_space_minimal',
                ],
            ],
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    // https://github.com/doctrine/coding-standard/blob/cfda1d6/lib/Doctrine/ruleset.xml#L192
                    'api', 'author', 'category', 'copyright', 'created', 'license', 'package', 'since',
                    'subpackage', 'version',
                    // https://github.com/laminas/laminas-coding-standard/blob/bcf6e07/src/LaminasCodingStandard/ruleset.xml#L883
                    'expectedException', 'expectedExceptionCode', 'expectedExceptionMessage', 'expectedExceptionMessageRegExp',
                ],
            ],

            Fixer\CommentSurroundedBySpacesFixer::name()            => true,
            Fixer\MultilineCommentOpeningClosingAloneFixer::name()  => true,
            Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            Fixer\NoLeadingSlashInGlobalNamespaceFixer::name()      => true,
            Fixer\NoPhpStormGeneratedCommentFixer::name()           => true,
            Fixer\NoUselessCommentFixer::name()                     => true,
            Fixer\NoUselessDoctrineRepositoryCommentFixer::name()   => true,
            Fixer\PhpdocNoIncorrectVarAnnotationFixer::name()       => true,
            Fixer\PhpdocNoSuperfluousParamFixer::name()             => true,
            Fixer\PhpdocSelfAccessorFixer::name()                   => true,
            Fixer\SingleSpaceAfterStatementFixer::name()            => true,
            Fixer\SingleSpaceBeforeStatementFixer::name()           => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
