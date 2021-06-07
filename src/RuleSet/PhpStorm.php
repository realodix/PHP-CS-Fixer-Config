<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class PhpStorm extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'PhpStorm';

    /**
     * Based on JetBrains/phpstorm-stubs
     *
     * See https://github.com/JetBrains/phpstorm-stubs/blob/master/.php-cs-fixer.php
     *
     * There are 4 rules found to have been disabled (commented)
     * - phpdoc_align
     * - phpdoc_trim_consecutive_blank_line_separation
     * - phpdoc_types_order
     * - single_quote
     *
     * Diff
     * - [D] PhpStorm/braces_one_line - Currently cannot be implemented.
     * - [D] array_syntax - Same as the default value
     * - [D] function_declaration - Same as the default value
     * - [D] general_phpdoc_tag_rename - Same as the default value
     * - [D] visibility_required - Same as the default value
     */
    public function myRules(): array
    {
        $rules = [
            // 'PhpStorm/braces_one_line'        => true,
            'binary_operator_spaces'          => ['operators' => ['|' => 'no_space']],
            'blank_line_after_namespace'      => true,
            'blank_line_after_opening_tag'    => false,
            'cast_spaces'                     => ['space' => 'none'],
            'class_definition'                => ['single_line' => true],
            'clean_namespace'                 => true,
            'compact_nullable_typehint'       => true,
            'concat_space'                    => ['spacing' => 'one'],
            'constant_case'                   => true,
            'declare_equal_normalize'         => true,
            'echo_tag_syntax'                 => true,
            'elseif'                          => true,
            'encoding'                        => true,
            'full_opening_tag'                => true,
            'fully_qualified_strict_types'    => true,
            'function_typehint_space'         => true,
            'include'                         => true,
            'indentation_type'                => true,
            'lambda_not_used_import'          => true,
            'line_ending'                     => true,
            'linebreak_after_opening_tag'     => true,
            'lowercase_cast'                  => true,
            'lowercase_keywords'              => true,
            'lowercase_static_reference'      => true,
            'magic_constant_casing'           => true,
            'magic_method_casing'             => true,
            'method_argument_space'           => true,
            'native_function_casing'          => true,
            'new_with_braces'                 => true,
            'no_alternative_syntax'           => true,
            'no_binary_string'                => true,
            'no_blank_lines_after_phpdoc'     => true,
            'no_closing_tag'                  => true,
            'no_empty_comment'                => true,
            'no_empty_phpdoc'                 => true,
            'no_leading_import_slash'         => true,
            'no_leading_namespace_whitespace' => true,
            'no_short_bool_cast'              => true,
            'no_spaces_after_function_name'   => true,
            'no_spaces_around_offset'         => true,
            'no_spaces_inside_parenthesis'    => true,
            'no_trailing_comma_in_list_call'  => true,
            'no_trailing_whitespace'          => true,
            'no_unneeded_curly_braces'        => ['namespaces' => true],
            'no_unset_cast'                   => true,
            'no_unused_imports'               => true,
            'no_whitespace_in_blank_line'     => true,
            'normalize_index_brace'           => true,
            'ordered_class_elements'          => ['order' => ['use_trait']],
            'ordered_imports'                 => [
                'imports_order'  => ['class', 'function', 'const'],
                'sort_algorithm' => 'none',
            ],
            'phpdoc_indent'                   => true,
            'phpdoc_inline_tag_normalizer'    => true,
            'phpdoc_no_useless_inheritdoc'    => true,
            'phpdoc_return_self_reference'    => true,
            'phpdoc_scalar'                   => true,
            'phpdoc_single_line_var_spacing'  => true,
            'phpdoc_trim'                     => true,
            'phpdoc_types'                    => true,
            'phpdoc_var_without_name'         => true,
            'return_type_declaration'         => true,
            'semicolon_after_instruction'     => true,
            'short_scalar_cast'               => true,
            'single_blank_line_at_eof'        => true,
            'single_import_per_statement'     => true,
            'single_line_after_imports'       => true,
            'single_line_throw'               => true,
            'single_space_after_construct'    => true,
            'space_after_semicolon'           => ['remove_in_empty_for_expressions' => true],
            'standardize_not_equals'          => true,
            'switch_case_semicolon_to_colon'  => true,
            'switch_case_space'               => true,
            'switch_continue_to_break'        => true,
            'ternary_operator_spaces'         => true,
            'trim_array_spaces'               => true,
            'unary_operator_spaces'           => true,
            'whitespace_after_comma_in_array' => true,

            'native_function_type_declaration_casing'     => true,
            'no_blank_lines_after_class_opening'          => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_singleline_whitespace_before_semicolons'  => true,
            'no_trailing_comma_in_singleline_array'       => true,
            'no_whitespace_before_comma_in_array'         => true,
            'object_operator_without_whitespace'          => true,
            'single_blank_line_before_namespace'          => true,
            'single_class_element_per_statement'          => ['elements' => ['property']],
            'single_trait_insert_per_statement'           => true,
            'no_trailing_whitespace_in_comment'           => true,

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
