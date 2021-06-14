<?php

namespace Realodix\CsConfig\RuleSet;

final class Composer extends AbstractRuleSet
{
    protected $name = 'Composer Coding Standards';

    /**
     * Based on composer/composer
     * - https://github.com/composer/composer/blob/9a32bf9/.php_cs (master)
     *
     * Diff
     * - [D] cast_spaces                        Same as the default value
     * - [D] header_comment                     Must be set manually
     * - [M] class_attributes_separation        New option syntax
     * - [M] no_extra_consecutive_blank_lines   Rename to no_extra_blank_lines
     * - [M] psr0                               Rename to psr_autoloading
     * - [M] trailing_comma_in_multiline_array  Rename to trailing_comma_in_multiline
     */
    public function getRules(): array
    {
        $rules = [
            '@PSR2'                       => true,
            'array_syntax'                => ['syntax' => 'long'],
            'binary_operator_spaces'      => true,
            'include'                     => true,
            'no_blank_lines_after_phpdoc' => true,
            'no_empty_statement'          => true,
            'no_extra_blank_lines'        => true,
            'no_leading_import_slash'     => true,
            'no_unused_imports'           => true,
            'no_whitespace_in_blank_line' => true,
            'phpdoc_align'                => true,
            'phpdoc_indent'               => true,
            'phpdoc_no_access'            => true,
            'phpdoc_no_package'           => true,
            'phpdoc_order'                => true,
            'phpdoc_scalar'               => true,
            'phpdoc_trim'                 => true,
            'phpdoc_types'                => true,
            'standardize_not_equals'      => true,
            'ternary_operator_spaces'     => true,
            'trailing_comma_in_multiline' => true,
            'unary_operator_spaces'       => true,

            'blank_line_before_statement'           => ['statements' => ['declare', 'return']],
            'class_attributes_separation'           => ['elements' => ['method' => 'one']],
            'no_blank_lines_after_class_opening'    => true,
            'no_leading_namespace_whitespace'       => true,
            'no_trailing_comma_in_singleline_array' => true,
            'object_operator_without_whitespace'    => true,
            'single_blank_line_before_namespace'    => true,
        ];

        return $rules;
    }
}
