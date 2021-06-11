<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class PHPUnit extends AbstractRuleSet
{
    protected $name = 'PHPUnit Coding Standards';

    /**
     * sebastianbergmann/phpunit
     * https://github.com/sebastianbergmann/phpunit/blob/master/.php-cs-fixer.dist.php
     *
     * Diff
     * - [D] global_namespace_import.import_classes Same as the default value
     * - [D] header_comment                         Must be set manually
     * - [M] list_syntax
     * - [M] ordered_interfaces
     */
    public function getRules(): array
    {
        $rules = [
            '@Symfony'                           => true,
            'braces'                             => true,
            'class_attributes_separation'        => true,
            'class_definition'                   => true,
            'concat_space'                       => ['spacing' => 'one'],
            'increment_style'                    => ['style' => 'post'],
            'no_extra_blank_lines'               => true,
            'no_mixed_echo_print'                => ['use' => 'print'],
            'no_superfluous_phpdoc_tags'         => ['allow_mixed' => true, 'allow_unused_params' => false],
            'no_unneeded_control_parentheses'    => true,
            'no_unneeded_curly_braces'           => true,
            'phpdoc_tag_type'                    => true,
            'phpdoc_types_order'                 => true,
            'phpdoc_types'                       => ['groups' => ['simple', 'meta']],
            'space_after_semicolon'              => true,
            'visibility_required'                => true,
            'blank_line_after_opening_tag'       => false,
            'general_phpdoc_tag_rename'          => false,
            'linebreak_after_opening_tag'        => false,
            'method_argument_space'              => false,
            'native_function_casing'             => false,
            'new_with_braces'                    => false,
            'php_unit_fqcn_annotation'           => false,
            'php_unit_method_casing'             => false,
            'single_blank_line_before_namespace' => false,
            'single_line_comment_style'          => false,
            'single_line_throw'                  => false,
            'yoda_style'                         => false,
            'binary_operator_spaces'             => [
                'operators' => [
                    '='  => 'align_single_space_minimal',
                    '=>' => 'align_single_space_minimal',
                    '|'  => null,
                ],
            ],
            'blank_line_before_statement' => [
                'statements' => [
                    'break', 'continue', 'declare', 'default', 'do', 'exit', 'for',
                    'foreach', 'goto', 'if', 'include', 'include_once', 'require',
                    'require_once', 'return', 'switch', 'throw', 'try', 'while', 'yield',
                ],
            ],
            'ordered_class_elements' => [
                'order' => [
                    'use_trait', 'constant_public', 'constant_protected', 'constant_private',
                    'property_public_static', 'property_protected_static', 'property_private_static',
                    'property_public', 'property_protected', 'property_private', 'method_public_static',
                    'construct', 'destruct', 'magic', 'phpunit', 'method_public', 'method_protected',
                    'method_private', 'method_protected_static', 'method_private_static',
                ],
            ],

            'align_multiline_comment'    => true,
            'array_indentation'          => true,
            'combine_consecutive_issets' => true,
            'combine_consecutive_unsets' => true,
            'explicit_indirect_variable' => true,
            'explicit_string_variable'   => true,
            'global_namespace_import'    => ['import_constants' => true, 'import_functions' => true],
            'heredoc_to_nowdoc'          => true,
            'list_syntax'                => true,
            'native_constant_invocation' => false,
            'native_function_invocation' => false,
            'no_superfluous_elseif'      => true,
            'no_useless_else'            => true,
            'no_useless_return'          => true,
            'operator_linebreak'         => ['only_booleans' => true, 'position' => 'end'],
            'ordered_imports'            => ['imports_order' => ['const', 'class', 'function']],
            'phpdoc_no_empty_return'     => true,
            'phpdoc_order_by_value'      => ['annotations' => ['covers', 'dataProvider', 'throws', 'uses']],
            'phpdoc_order'               => true,
            'phpdoc_tag_casing'          => true,
            'return_assignment'          => true,
            'self_static_accessor'       => true,
            'simplified_null_return'     => false,
            'ternary_to_null_coalescing' => true,

            'multiline_comment_opening_closing'      => true,
            'multiline_whitespace_before_semicolons' => true,
            'no_blank_lines_before_namespace'        => true,
            'no_null_property_initialization'        => true,
            'phpdoc_add_missing_param_annotation'    => false,
            'phpdoc_var_annotation_correct_order'    => true,
            'simple_to_complex_string_variable'      => true,
        ];

        return $rules;
    }
}
