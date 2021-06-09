<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class PHPUnitRisky extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'PHPUnit Coding Standards (risky)';

    /**
     * sebastianbergmann/phpunit
     * https://github.com/sebastianbergmann/phpunit/blob/master/.php-cs-fixer.dist.php
     *
     * Diff
     * - [M] ordered_interfaces
     */
    public function myRules(): array
    {
        $basicRules = (new PHPUnit())->myRules();

        $rules = [
            'array_push'                => true,
            'combine_nested_dirname'    => true,
            'declare_strict_types'      => true,
            'dir_constant'              => true,
            'ereg_to_preg'              => true,
            'fopen_flag_order'          => true,
            'function_to_constant'      => true,
            'implode_call'              => true,
            'is_null'                   => true,
            'logical_operators'         => true,
            'modernize_types_casting'   => true,
            'no_alias_functions'        => true,
            'no_homoglyph_names'        => true,
            'no_php4_constructor'       => true,
            'no_unneeded_final_method'  => true,
            'no_unset_on_property'      => true,
            'no_useless_sprintf'        => true,
            'non_printable_character'   => true,
            'ordered_interfaces'        => true,
            'ordered_traits'            => true,
            'pow_to_exponentiation'     => true,
            'self_accessor'             => true,
            'set_type_to_cast'          => true,
            'static_lambda'             => true,
            'strict_param'              => true,
            'string_line_ending'        => true,
            'ternary_to_elvis_operator' => true,
            'void_return'               => true,

            'php_unit_set_up_tear_down_visibility'   => true,
            'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],
            'no_unreachable_default_argument_value'  => true,
            'no_trailing_whitespace_in_string'       => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
