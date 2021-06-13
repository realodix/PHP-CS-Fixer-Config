<?php

namespace Realodix\CsConfig\RuleSet;

use PhpCsFixerCustomFixers\Fixer;

final class RealodixStrict extends AbstractRuleSet
{
    protected $name = 'Realodix Coding Standards (strict)';

    public function getRules(): array
    {
        $basicRules = (new Realodix())->getRules();

        $rules = [
            'align_multiline_comment'          => ['comment_type' => 'all_multiline'],
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    // SlevomatCodingStandard.Commenting.ForbiddenAnnotations
                    // https://github.com/doctrine/coding-standard/blob/9.0.x/lib/Doctrine/ruleset.xml
                    'api', 'author', 'category', 'copyright', 'created', 'license',
                    'package', 'since', 'subpackage', 'version',
                ],
            ],

            Fixer\CommentedOutFunctionFixer::name()                 => true,
            Fixer\CommentSurroundedBySpacesFixer::name()            => true,
            Fixer\DataProviderNameFixer::name()                     => ['prefix' => '', 'suffix' => 'Provider'],
            Fixer\MultilineCommentOpeningClosingAloneFixer::name()  => true,
            Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            Fixer\NoImportFromGlobalNamespaceFixer::name()          => true,
            Fixer\NoLeadingSlashInGlobalNamespaceFixer::name()      => true,
            Fixer\NoPhpStormGeneratedCommentFixer::name()           => true,
            Fixer\NoUselessDoctrineRepositoryCommentFixer::name()   => true,
            Fixer\PhpdocNoIncorrectVarAnnotationFixer::name()       => true,
            Fixer\PhpdocParamOrderFixer::name()                     => true,
            Fixer\PhpdocParamTypeFixer::name()                      => true,
            Fixer\PhpdocSelfAccessorFixer::name()                   => true,
            Fixer\PhpdocSingleLineVarFixer::name()                  => true,
            Fixer\SingleSpaceAfterStatementFixer::name()            => true,
            Fixer\SingleSpaceBeforeStatementFixer::name()           => true,
            // Fixer\OperatorLinebreakFixer::name()                   => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
