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
     * - [R] array_syntax - Default ['syntax' => 'short']
     */
    public function myRules(): array
    {
        $rules = [
            '@PSR2'                             => true,
            'ordered_imports'                   => ['sort_algorithm' => 'alpha'],
            'no_unused_imports'                 => true,
            'not_operator_with_successor_space' => true,
            'trailing_comma_in_multiline'       => true,
            'phpdoc_scalar'                     => true,
            'unary_operator_spaces'             => true,
            'binary_operator_spaces'            => true,
            'blank_line_before_statement'       => [
                'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
            ],
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_var_without_name'        => true,
            'class_attributes_separation'    => [
                'elements' => [
                    'method' => 'one',
                ],
            ],
            'method_argument_space' => [
                'on_multiline'                     => 'ensure_fully_multiline',
                'keep_multiple_spaces_after_comma' => true,
            ],
            'single_trait_insert_per_statement' => true,
        ];

        return $rules;
    }
}
