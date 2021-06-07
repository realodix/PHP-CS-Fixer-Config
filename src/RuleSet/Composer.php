<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class Composer extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Composer';

    /**
     * Based on composer/composer
     *
     * See https://github.com/composer/composer/blob/master/.php_cs
     *
     * Diff
     * - [R] header_comment - Must be set manually
     * - [M] no_extra_consecutive_blank_lines - Rename to no_extra_blank_lines
     * - [M] psr0 - Rename to psr_autoloading
     * - [M] trailing_comma_in_multiline_array - Rename to trailing_comma_in_multiline
     */
    public function myRules(): array
    {
        $rules = [
            '@PSR2'                                 => true,
            'array_syntax'                          => ['syntax' => 'long'],
            'binary_operator_spaces'                => true,
            'blank_line_before_statement'           => ['statements' => ['declare', 'return']],
            'cast_spaces'                           => ['space' => 'single'],
            'include'                               => true,
            'class_attributes_separation'           => ['elements' => ['method']],
            'no_blank_lines_after_class_opening'    => true,
            'no_blank_lines_after_phpdoc'           => true,
            'no_empty_statement'                    => true,
            'no_extra_blank_lines'      => true,
            'no_leading_import_slash'               => true,
            'no_leading_namespace_whitespace'       => true,
            'no_trailing_comma_in_singleline_array' => true,
            'no_unused_imports'                     => true,
            'no_whitespace_in_blank_line'           => true,
            'object_operator_without_whitespace'    => true,
            'phpdoc_align'                          => true,
            'phpdoc_indent'                         => true,
            'phpdoc_no_access'                      => true,
            'phpdoc_no_package'                     => true,
            'phpdoc_order'                          => true,
            'phpdoc_scalar'                         => true,
            'phpdoc_trim'                           => true,
            'phpdoc_types'                          => true,
            'psr_autoloading'                                  => true,
            'single_blank_line_before_namespace'    => true,
            'standardize_not_equals'                => true,
            'ternary_operator_spaces'               => true,
            'trailing_comma_in_multiline'     => true,
            'unary_operator_spaces'                 => true,
        ];

        return $rules;
    }
}
