<?php

namespace Realodix\CsConfig\RuleSet;

use PhpCsFixerCustomFixers\Fixer;

final class Realodix extends AbstractRuleSet
{
    protected $name = 'Realodix Coding Standards';

    public function getRules(): array
    {
        $baseRules = (new Laravel())->getRules();

        $rules = [
            /*
             * Modify
             */
            'no_empty_phpdoc'         => false,
            'phpdoc_summary'          => false,
            'ternary_operator_spaces' => false,
            'unary_operator_spaces'   => false,
            'binary_operator_spaces'  => [
                // Diff https://github.com/matt-allan/laravel-code-style/blob/b224862/src/Config.php#L26
                'operators' => ['=>' => 'align_single_space_minimal'],
            ],
            'method_argument_space' => [
                // PHP80Migration
                // Diff https://github.com/matt-allan/laravel-code-style/blob/b224862/src/Config.php#L70
                'after_heredoc' => true,
            ],

            /*
             * Addition
             */
            'explicit_string_variable'     => true,
            'fully_qualified_strict_types' => true,
            'no_superfluous_elseif'        => true,
            'no_useless_else'              => true,
            'php_unit_method_casing'       => true,
            'phpdoc_to_comment'            => true,
            'phpdoc_order'                 => true,

            'phpdoc_var_annotation_correct_order' => true,
            'phpdoc_add_missing_param_annotation' => [
                'only_untyped' => false,
            ],
            'phpdoc_align' => [
                // align_phpdoc
                'tags' => [
                    'param',
                    'throws', 'type', 'var',
                    // 'return',
                ],
            ],
            Fixer\NoDuplicatedArrayKeyFixer::name()     => true,
            Fixer\NoDuplicatedImportsFixer::name()      => true,
            Fixer\NoUselessParenthesisFixer::name()     => true,
            Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
            Fixer\PhpdocTypesTrimFixer::name()          => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
