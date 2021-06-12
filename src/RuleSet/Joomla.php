<?php

namespace Realodix\CsConfig\RuleSet;

final class Joomla extends AbstractRuleSet
{
    protected $name = 'Joomla Coding Standards';

    /**
     * Based on joomla/joomla-cms
     *
     * See https://github.com/joomla/joomla-cms/blob/4.0-dev/.php_cs.dist
     *
     * Diff
     * - [M] blank_line_before_return           Rename to blank_line_before_statement
     * - [M] lowercase_constants                Rename to constant_case
     * - [M] no_extra_consecutive_blank_lines   Rename to no_extra_blank_lines
     * - [M] trailing_comma_in_multiline_array  Rename to trailing_comma_in_multiline
     */
    public function getRules(): array
    {
        $rules = [
            // psr-1
            'encoding' => true,
            // psr-2
            'blank_line_after_namespace'    => true,
            'constant_case'                 => true,
            'elseif'                        => true,
            'line_ending'                   => true,
            'lowercase_keywords'            => true,
            'no_spaces_after_function_name' => true,
            'single_blank_line_at_eof'      => true,
            'method_argument_space'         => true,
            'single_import_per_statement'   => true,
            'no_spaces_inside_parenthesis'  => true,
            'single_line_after_imports'     => true,
            'no_trailing_whitespace'        => true,
            'visibility_required'           => true,
            // symfony
            'blank_line_before_statement'           => ['statements' => ['return']],
            'cast_spaces'                           => true,
            'function_typehint_space'               => true,
            'include'                               => true,
            'no_alias_functions'                    => true,
            'no_blank_lines_after_class_opening'    => true,
            'no_empty_statement'                    => true,
            'no_extra_blank_lines'                  => true,
            'no_trailing_comma_in_list_call'        => true,
            'no_trailing_comma_in_singleline_array' => true,
            'no_unneeded_control_parentheses'       => true,
            'no_unused_imports'                     => true,
            'no_whitespace_before_comma_in_array'   => true,
            'no_whitespace_in_blank_line'           => true,
            'phpdoc_trim'                           => true,
            'simplified_null_return'                => true,
            'single_blank_line_before_namespace'    => true,
            'trailing_comma_in_multiline'           => true,
            'whitespace_after_comma_in_array'       => true,
            // contrib
            'concat_space' => ['spacing' => 'one'],
        ];

        return $rules;
    }
}
