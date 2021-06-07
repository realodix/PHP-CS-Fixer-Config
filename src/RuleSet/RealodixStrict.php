<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

use PhpCsFixerCustomFixers\Fixer;

final class RealodixStrict extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Realodix Coding Standards (strict)';

    public function myRules(): array
    {
        $rules = [
            'align_multiline_comment'                              => ['comment_type' => 'all_multiline'],
            'ternary_operator_spaces'                              => false,
            'unary_operator_spaces'                                => false,
            Fixer\CommentedOutFunctionFixer::name()                => true,
            Fixer\CommentSurroundedBySpacesFixer::name()           => true,
            Fixer\DataProviderNameFixer::name()                    => ['prefix' => '', 'suffix' => 'Provider'],
            Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
            Fixer\NoDuplicatedArrayKeyFixer::name()                => true,
            Fixer\NoDuplicatedImportsFixer::name()                 => true,
            Fixer\NoPhpStormGeneratedCommentFixer::name()          => true,
            Fixer\NoSuperfluousConcatenationFixer::name()          => true,
            Fixer\NoUselessCommentFixer::name()                    => true,
            Fixer\NoUselessDoctrineRepositoryCommentFixer::name()  => true,
            Fixer\NoUselessParenthesisFixer::name()                => true,
            Fixer\NoUselessStrlenFixer::name()                     => true,
            Fixer\PhpdocNoIncorrectVarAnnotationFixer::name()      => true,
            Fixer\PhpdocNoSuperfluousParamFixer::name()            => true,
            Fixer\PhpdocParamOrderFixer::name()                    => true,
            Fixer\PhpdocParamTypeFixer::name()                     => true,
            Fixer\PhpdocSelfAccessorFixer::name()                  => true,
            Fixer\PhpdocSingleLineVarFixer::name()                 => true,
            Fixer\PhpdocTypesTrimFixer::name()                     => true,
            Fixer\PhpUnitNoUselessReturnFixer::name()              => true,
            Fixer\SingleSpaceAfterStatementFixer::name()           => true,
            Fixer\SingleSpaceBeforeStatementFixer::name()          => true,
            // Fixer\OperatorLinebreakFixer::name()                   => true,
        ];

        $realodix = (new Realodix())->myRules();

        return array_merge($realodix, $rules);
    }
}