<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class CodeIgniter extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'CodeIgniter4 Coding Standards';

    /**
     * codeigniter4/CodeIgniter4
     * https://github.com/codeigniter4/CodeIgniter4/blob/develop/utils/PhpCsFixer/CodeIgniter4.php
     */
    public function myRules(): array
    {
        $rules = [
            'align_multiline_comment' => ['comment_type' => 'phpdocs_only'],
            'array_indentation'       => true,
            'array_push'              => true, // risky
            'array_syntax'            => ['syntax' => 'short'],
            'backtick_to_shell_exec'  => true,
            'binary_operator_spaces'  => [
                'default'   => 'single_space',
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
            'static_lambda'                => true,
            'ternary_to_null_coalescing'   => true,
            'yoda_style'                   => [
                'equal'                => false,
                'identical'            => null,
                'less_and_greater'     => false,
                'always_move_variable' => false,
            ],
        ];

        return $rules;
    }
}
