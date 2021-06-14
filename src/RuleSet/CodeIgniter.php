<?php

namespace Realodix\CsConfig\RuleSet;

final class CodeIgniter extends AbstractRuleSet
{
    protected $name = 'CodeIgniter4 Coding Standards';

    /**
     * Based on codeigniter4/CodeIgniter4
     * - https://github.com/codeigniter4/CodeIgniter4/blob/3d0a4a7/utils/PhpCsFixer/CodeIgniter4.php (develop)
     *
     * Diff
     * - [D] binary_operator_spaces.default     Same as the default value
     * - [D] yoda_style.always_move_variable    Same as the default value
     * - [M] align_multiline_comment
     * - [M] array_syntax
     */
    public function getRules(): array
    {
        $rules = [
            'align_multiline_comment' => true,
            'array_indentation'       => true,
            'array_push'              => true, // risky
            'array_syntax'            => true,
            'backtick_to_shell_exec'  => true,
            'binary_operator_spaces'  => [
                'operators' => [
                    '='  => 'align_single_space',
                    '=>' => 'align_single_space',
                    '||' => 'align_single_space',
                    '.=' => 'align_single_space',
                ],
            ],
            'blank_line_before_statement' => [
                'statements' => [
                    'case',
                    'continue',
                    'declare',
                    'default',
                    'do',
                    'exit',
                    'for',
                    'foreach',
                    'goto',
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'while',
                    'yield',
                    'yield_from',
                ],
            ],
            'blank_line_after_namespace'   => true,
            'blank_line_after_opening_tag' => true,
            'function_to_constant'         => true,
            'indentation_type'             => true,
            'line_ending'                  => true,
            'no_alias_functions'           => [
                'sets' => ['@all'],
            ],
            'static_lambda'              => true,
            'ternary_to_null_coalescing' => true,
            'yoda_style'                 => [
                'equal'            => false,
                'identical'        => null,
                'less_and_greater' => false,
            ],
        ];

        return $rules;
    }
}
