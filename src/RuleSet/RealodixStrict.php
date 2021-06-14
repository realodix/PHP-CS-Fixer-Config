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
            Fixer\PhpdocParamOrderFixer::name()                     => true,
            Fixer\PhpdocParamTypeFixer::name()                      => true,
            Fixer\PhpdocSelfAccessorFixer::name()                   => true,
            Fixer\SingleSpaceAfterStatementFixer::name()            => true,
            Fixer\SingleSpaceBeforeStatementFixer::name()           => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
