<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class ThePhpLeague extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Realodix Coding Standards';

    /**
     * Based on thephpleague/uri
     *
     * See https://github.com/thephpleague/uri/blob/master/.php-cs-fixer.php
     *
     * Diff
     * - [R] array_syntax - Same as the default value
     * - [R] concat_space - Same as the default value
     * - [R] header_comment - Must be set manually
     * - [R] ordered_imports.sort_algorithm - Same as the default value
     * - [R] phpdoc_add_missing_param_annotation - Same as the default value
     * - [R] return_type_declaration - Same as the default value
     */
    public function myRules(): array
    {
        $rules = [
            '@PSR2'                                 => true,
            'new_with_braces'                       => true,
            'no_blank_lines_after_phpdoc'           => true,
            'no_empty_phpdoc'                       => true,
            'no_empty_comment'                      => true,
            'no_leading_import_slash'               => true,
            'no_superfluous_phpdoc_tags'            => true,
            'no_trailing_comma_in_singleline_array' => true,
            'no_unused_imports'                     => true,
            'ordered_imports'                       => [
                'imports_order' => [
                    'class', 'function', 'const',
                ],
            ],
            'phpdoc_align'                          => true,
            'phpdoc_no_empty_return'                => true,
            'phpdoc_order'                          => true,
            'phpdoc_scalar'                         => true,
            'phpdoc_to_comment'                     => true,
            'phpdoc_summary'                        => true,
            'psr_autoloading'                       => true,
            'single_blank_line_before_namespace'    => true,
            'single_quote'                          => true,
            'space_after_semicolon'                 => true,
            'ternary_operator_spaces'               => true,
            'trailing_comma_in_multiline'           => true,
            'trim_array_spaces'                     => true,
            'whitespace_after_comma_in_array'       => true,
            'yoda_style'                            => true,
        ];

        return $rules;
    }
}
