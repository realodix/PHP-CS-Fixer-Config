<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

use PhpCsFixerCustomFixers\Fixer;

final class Realodix extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Realodix PHP Coding Standards';

    public function myRules(): array
    {
        $rules = [
            'align_multiline_comment'      => ['comment_type' => 'all_multiline'],
            'binary_operator_spaces'       => ['operators' => ['=>' => 'align']], // unalign_equals (default)
            'fully_qualified_strict_types' => true,
            'no_empty_phpdoc'              => false,
            'no_useless_else'              => true,
            'php_unit_method_casing'       => true,
            'phpdoc_summary'               => false,
            'phpdoc_to_comment'            => true,
            'ternary_operator_spaces'      => false,
            'unary_operator_spaces'        => false,

            'phpdoc_align' => [ // align_phpdoc
                'tags' => [
                    'param',
                    // 'return',
                    'throws', 'type', 'var',
                ],
            ],
            'phpdoc_var_annotation_correct_order'                  => true,
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

        $laravelByStyleCi = (new LaravelByStyleCI())->myRules();

        return array_merge($laravelByStyleCi, $rules);
    }
}
