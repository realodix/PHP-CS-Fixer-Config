<?php

namespace Realodix\CsConfig\RuleSet;

final class Laravel extends AbstractRuleSet
{
    protected $name = 'Laravel Coding Standards';

    /**
     * Based on
     * - https://github.com/matt-allan/laravel-code-style/blob/b224862/src/Config.php (main)
     * - https://gist.github.com/laravel-shift/cab527923ed2a109dda047b97d53c200#gistcomment-3755709
     */
    public function getRules(): array
    {
        $rules = [
            '@PSR2'                   => true,
            'align_multiline_comment' => ['comment_type' => 'phpdocs_like'],
            'array_indentation'       => true,
            'array_syntax'            => ['syntax' => 'short'],
            'binary_operator_spaces'  => [
                'operators' => [
                    '=>' => null,
                    '='  => 'single_space',
                ],
            ],
            'braces' => [
                'allow_single_line_anonymous_class_with_empty_body' => true,
            ],
            'cast_spaces'             => true,
            'class_definition'        => true,
            'clean_namespace'         => true,
            'concat_space'            => ['spacing' => 'none'],
            'constant_case'           => ['case' => 'lower'],
            'declare_equal_normalize' => true,
            'elseif'                  => true,
            'encoding'                => true,
            'full_opening_tag'        => true,
            'function_declaration'    => true,
            'function_typehint_space' => true,
            'heredoc_to_nowdoc'       => true,
            'include'                 => true,
            'increment_style'         => ['style' => 'post'],
            'indentation_type'        => true,
            'lambda_not_used_import'  => true,
            'line_ending'             => true,
            'list_syntax'             => ['syntax' => 'short'],
            'lowercase_cast'          => true,
            'lowercase_keywords'      => true,
            'magic_constant_casing'   => true,
            'magic_method_casing'     => true,
            'method_argument_space'   => true,
            'native_function_casing'  => true,
            'no_alternative_syntax'   => true,
            'no_binary_string'        => true,
            'no_closing_tag'          => true,
            'no_empty_phpdoc'         => true,
            'no_empty_statement'      => true,
            'no_extra_blank_lines'    => [
                'tokens' => ['throw', 'use', 'use_trait', 'extra'],
            ],
            'no_leading_import_slash'  => true,
            'no_mixed_echo_print'      => ['use' => 'echo'],
            'no_short_bool_cast'       => true,
            'no_spaces_around_offset'  => ['positions' => ['inside']],
            'no_trailing_whitespace'   => true,
            'no_unneeded_curly_braces' => true,
            'no_unset_cast'            => true,
            'no_unused_imports'        => true,
            'no_useless_return'        => true,
            'normalize_index_brace'    => true,
            'ordered_imports'          => ['sort_algorithm' => 'alpha'],
            'phpdoc_indent'            => true,
            'phpdoc_no_access'         => true,
            'phpdoc_no_alias_tag'      => ['replacements' => ['type' => 'var']],
            'phpdoc_no_package'        => true,
            'phpdoc_scalar'            => true,
            'phpdoc_summary'           => true,
            'phpdoc_trim'              => true,
            'phpdoc_types'             => true,
            'phpdoc_var_without_name'  => true,
            'return_type_declaration'  => ['space_before' => 'none'],
            'short_scalar_cast'        => true,
            'single_blank_line_at_eof' => true,
            'single_quote'             => true,
            'space_after_semicolon'    => true,
            'standardize_not_equals'   => true,
            'switch_case_space'        => true,
            'switch_continue_to_break' => true,
            'ternary_operator_spaces'  => true,
            'trim_array_spaces'        => true,
            'unary_operator_spaces'    => true,
            'visibility_required'      => ['elements' => ['method', 'property']],

            'blank_line_after_namespace'         => true,
            'blank_line_after_opening_tag'       => true,
            'blank_line_before_statement'        => ['statements' => ['return']],
            'class_attributes_separation'        => ['elements' => ['method' => 'one']],
            'compact_nullable_typehint'          => true,
            'lowercase_static_reference'         => true,
            'no_alias_language_construct_call'   => true,
            'no_blank_lines_after_class_opening' => true,
            'no_blank_lines_after_phpdoc'        => true,
            'no_leading_namespace_whitespace'    => true,
            'no_spaces_after_function_name'      => true,
            'no_spaces_inside_parenthesis'       => true,
            'no_trailing_comma_in_list_call'     => true,
            'no_trailing_whitespace_in_comment'  => true,
            'no_unneeded_control_parentheses'    => true,
            'no_whitespace_in_blank_line'        => true,
            'phpdoc_inline_tag_normalizer'       => true,
            'phpdoc_no_useless_inheritdoc'       => true,
            'phpdoc_return_self_reference'       => true,
            'phpdoc_single_line_var_spacing'     => true,
            'single_import_per_statement'        => true,
            'single_line_after_imports'          => true,
            'single_line_comment_style'          => ['comment_types' => ['hash']],
            'switch_case_semicolon_to_colon'     => true,
            'trailing_comma_in_multiline'        => ['elements' => ['arrays']],

            'multiline_whitespace_before_semicolons'      => true,
            'native_function_type_declaration_casing'     => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_singleline_whitespace_before_semicolons'  => true,
            'no_trailing_comma_in_singleline_array'       => true,
            'no_whitespace_before_comma_in_array'         => true,
            'not_operator_with_successor_space'           => true,
            'object_operator_without_whitespace'          => true,
            'single_blank_line_before_namespace'          => true,
            'single_class_element_per_statement'          => true,
            'whitespace_after_comma_in_array'             => true,
        ];

        return $rules;
    }
}
