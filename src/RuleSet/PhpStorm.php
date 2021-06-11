<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class PhpStorm extends AbstractRuleSet
{
    protected $name = 'PhpStorm Coding Standards';

    /**
     * JetBrains/phpstorm-stubs
     * https://github.com/JetBrains/phpstorm-stubs/blob/master/.php-cs-fixer.php
     *
     * There are 4 rules found commented:
     * - phpdoc_align
     * - phpdoc_trim_consecutive_blank_line_separation
     * - phpdoc_types_order
     * - single_quote
     *
     * Diff
     * - [D] PhpStorm/braces_one_line   Currently cannot be implemented, hope it can be
     *                                  implemented in the future
     * - [M] array_syntax               Same as the default value
     * - [M] general_phpdoc_tag_rename  Same as the default value
     */
    public function getRules(): array
    {
        $rules = [
            '@PSR12'                            => true,
            'blank_line_after_opening_tag'      => false,
            'braces'                            => false,
            'class_definition'                  => ['single_line' => true],
            'no_break_comment'                  => false,
            'no_trailing_whitespace_in_comment' => false,
            //
            'array_syntax'                    => true,
            'binary_operator_spaces'          => ['operators' => ['|' => 'no_space']],
            'cast_spaces'                     => ['space' => 'none'],
            'clean_namespace'                 => true,
            'concat_space'                    => ['spacing' => 'one'],
            'echo_tag_syntax'                 => true,
            'fully_qualified_strict_types'    => true,
            'function_typehint_space'         => true,
            'general_phpdoc_tag_rename'       => true,
            'include'                         => true,
            'lambda_not_used_import'          => true,
            'linebreak_after_opening_tag'     => true,
            'magic_constant_casing'           => true,
            'magic_method_casing'             => true,
            'native_function_casing'          => true,
            'no_alternative_syntax'           => true,
            'no_binary_string'                => true,
            'no_blank_lines_after_phpdoc'     => true,
            'no_empty_comment'                => true,
            'no_empty_phpdoc'                 => true,
            'no_leading_namespace_whitespace' => true,
            'no_short_bool_cast'              => true,
            'no_spaces_around_offset'         => true,
            'no_trailing_comma_in_list_call'  => true,
            'no_trailing_whitespace'          => true,
            'no_unneeded_curly_braces'        => ['namespaces' => true],
            'no_unset_cast'                   => true,
            'no_unused_imports'               => true,
            'normalize_index_brace'           => true,
            'phpdoc_indent'                   => true,
            'phpdoc_inline_tag_normalizer'    => true,
            'phpdoc_no_useless_inheritdoc'    => true,
            'phpdoc_return_self_reference'    => true,
            'phpdoc_scalar'                   => true,
            'phpdoc_single_line_var_spacing'  => true,
            'phpdoc_trim'                     => true,
            'phpdoc_types'                    => true,
            'phpdoc_var_without_name'         => true,
            'semicolon_after_instruction'     => true,
            'single_line_throw'               => true,
            'single_space_after_construct'    => true,
            'space_after_semicolon'           => ['remove_in_empty_for_expressions' => true],
            'standardize_not_equals'          => true,
            'switch_continue_to_break'        => true,
            'trim_array_spaces'               => true,
            'unary_operator_spaces'           => true,
            'whitespace_after_comma_in_array' => true,

            'native_function_type_declaration_casing'     => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_singleline_whitespace_before_semicolons'  => true,
            'no_trailing_comma_in_singleline_array'       => true,
            'no_whitespace_before_comma_in_array'         => true,
            'object_operator_without_whitespace'          => true,

            'no_extra_blank_lines' => [
                'tokens' => [
                    'case', 'continue', 'curly_brace_block', 'default', 'extra',
                    'parenthesis_brace_block', 'square_brace_block', 'switch', 'throw',
                    'use', 'use_trait',
                ],
            ],
            'no_unneeded_control_parentheses' => [
                'statements' => [
                    'break', 'clone', 'continue', 'echo_print', 'return', 'switch_case',
                    'yield', 'yield_from',
                ],
            ],
        ];

        return $rules;
    }
}
