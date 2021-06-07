<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class Composer extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Composer';

    /**
     * Based on composer/composer
     *
     * See https://github.com/composer/composer/blob/master/.php_cs
     */
    public function myRules(): array
    {
        $rules = [
            '@PSR2'                                 => true,
            'array_syntax'                          => ['syntax' => 'long'],
            'binary_operator_spaces'                => true,
            'blank_line_before_statement'           => ['statements' => ['declare', 'return']],
            'cast_spaces'                           => ['space' => 'single'],
            'header_comment'                        => ['header' => $header],
            'include'                               => true,
            'class_attributes_separation'           => ['elements' => ['method']],
            'no_blank_lines_after_class_opening'    => true,
            'no_blank_lines_after_phpdoc'           => true,
            'no_empty_statement'                    => true,
            'no_extra_consecutive_blank_lines'      => true,
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
            'psr0'                                  => true,
            'single_blank_line_before_namespace'    => true,
            'standardize_not_equals'                => true,
            'ternary_operator_spaces'               => true,
            'trailing_comma_in_multiline_array'     => true,
            'unary_operator_spaces'                 => true,
        ];

        return $rules;
    }
}
