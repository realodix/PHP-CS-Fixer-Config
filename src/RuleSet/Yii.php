<?php

namespace Realodix\CsConfig\RuleSet;

final class Yii extends AbstractRuleSet
{
    protected $name = 'Yii Code Style';

    /**
     * Based on yiisoft/yii2
     * - https://github.com/yiisoft/yii2/blob/8ac70d4/cs/src/YiiConfig.php (master)
     * - https://github.com/yiisoft/yii2/blob/8ac70d4/docs/internals/core-code-style.md (master)
     *
     * There are 9 rules found commented:
     * - mb_str_functions
     * - method_separation
     * - no_extra_consecutive_blank_lines.curly_brace_block
     * - no_extra_consecutive_blank_lines.extra
     * - object_operator_without_whitespace.ordered_class_elements
     * - php_unit_strict
     * - phpdoc_inline_tag
     * - phpdoc_order
     * - phpdoc_to_comment
     *
     * Diff
     * - [D] binary_operator_spaces
     * - [D] ordered_imports.sortAlgorithm
     * - [M] array_syntax
     */
    public function getRules(): array
    {
        $rules = [
            '@PSR2'                                  => true,
            'array_syntax'                           => true,
            'binary_operator_spaces'                 => true,
            'blank_line_after_opening_tag'           => true,
            'cast_spaces'                            => true,
            'concat_space'                           => ['spacing' => 'one'],
            'function_typehint_space'                => true,
            'heredoc_to_nowdoc'                      => true,
            'include'                                => true,
            'linebreak_after_opening_tag'            => true,
            'lowercase_cast'                         => true,
            'magic_constant_casing'                  => true,
            'multiline_whitespace_before_semicolons' => true,
            'native_function_casing'                 => true,
            'new_with_braces'                        => true,
            'no_blank_lines_after_class_opening'     => true,
            'no_blank_lines_after_phpdoc'            => true,
            'no_empty_comment'                       => true,
            'no_empty_phpdoc'                        => true,
            'no_empty_statement'                     => true,
            'no_extra_blank_lines'                   => [
                'tokens' => [
                    'break', 'continue', 'return', 'throw', 'use', 'use_trait',
                    'parenthesis_brace_block', 'square_brace_block',
                ],
            ],
            'no_leading_import_slash'                     => true,
            'no_leading_namespace_whitespace'             => true,
            'no_mixed_echo_print'                         => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_short_bool_cast'                          => true,
            'no_singleline_whitespace_before_semicolons'  => true,
            'no_spaces_around_offset'                     => true,
            'no_trailing_comma_in_list_call'              => true,
            'no_trailing_comma_in_singleline_array'       => true,
            'no_unneeded_control_parentheses'             => true,
            'no_unused_imports'                           => true,
            'no_useless_else'                             => true,
            'no_useless_return'                           => true,
            'no_whitespace_before_comma_in_array'         => true,
            'no_whitespace_in_blank_line'                 => true,
            'normalize_index_brace'                       => true,
            'object_operator_without_whitespace'          => true,
            'ordered_imports'                             => [
                'imports_order' => [
                    'const', 'function', 'class',
                ],
            ],
            'php_unit_fqcn_annotation'            => true,
            'phpdoc_add_missing_param_annotation' => true,
            'phpdoc_indent'                       => true,
            'phpdoc_no_access'                    => true,
            'phpdoc_no_empty_return'              => true,
            'phpdoc_no_package'                   => true,
            'phpdoc_no_useless_inheritdoc'        => true,
            'phpdoc_return_self_reference'        => true,
            'phpdoc_scalar'                       => true,
            'phpdoc_single_line_var_spacing'      => true,
            'phpdoc_summary'                      => true,
            'phpdoc_trim'                         => true,
            'phpdoc_types'                        => true,
            'phpdoc_var_without_name'             => true,
            'protected_to_private'                => true,
            'short_scalar_cast'                   => true,
            'single_blank_line_before_namespace'  => true,
            'single_line_comment_style'           => [
                'comment_types' => ['hash'],
            ],
            'single_quote'                    => true,
            'standardize_not_equals'          => true,
            'ternary_operator_spaces'         => true,
            'trailing_comma_in_multiline'     => true,
            'trim_array_spaces'               => true,
            'unary_operator_spaces'           => true,
            'whitespace_after_comma_in_array' => true,
        ];

        return $rules;
    }
}
