<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class Spatie extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Spatie Coding Standards';

    /**
     * Based on spatie/laravel-permission
     *
     * See https://github.com/spatie/laravel-permission/blob/master/.php_cs.dist.php
     *
     * Diff
     * - [R] array_syntax - same as the default value
     * - [R] ordered_imports - same as the default value
     * - [R] blank_line_before_statement - same as the default value
     * - [R] method_argument_space.on_multiline - same as the default value
     */
    public function myRules(): array
    {
        $rules = [
            '@PSR2'                             => true,
            'no_unused_imports'                 => true,
            'not_operator_with_successor_space' => true,
            'trailing_comma_in_multiline'       => true,
            'phpdoc_scalar'                     => true,
            'unary_operator_spaces'             => true,
            'binary_operator_spaces'            => true,
            'phpdoc_single_line_var_spacing'    => true,
            'phpdoc_var_without_name'           => true,
            'class_attributes_separation'       => [
                'elements' => [
                    'method' => 'one',
                ],
            ],
            'method_argument_space' => [
                'keep_multiple_spaces_after_comma' => true,
            ],
            'single_trait_insert_per_statement' => true,
        ];

        return $rules;
    }
}
