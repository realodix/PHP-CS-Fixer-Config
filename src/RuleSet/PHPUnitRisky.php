<?php

namespace Realodix\CsConfig\RuleSet;

final class PHPUnitRisky extends AbstractRuleSet
{
    protected $name = 'PHPUnit Coding Standards (risky)';

    /**
     * Based on sebastianbergmann/phpunit
     * https://github.com/sebastianbergmann/phpunit/blob/1824636/.php-cs-fixer.dist.php (master)
     *
     * Diff
     * - [M] ordered_interfaces
     */
    public function getRules(): array
    {
        $baseRules = (new PHPUnit())->getRules();

        $rules = [
            'array_push'                             => true,
            'combine_nested_dirname'                 => true,
            'declare_strict_types'                   => true,
            'dir_constant'                           => true,
            'ereg_to_preg'                           => true,
            'fopen_flag_order'                       => true,
            'function_to_constant'                   => true,
            'implode_call'                           => true,
            'is_null'                                => true,
            'logical_operators'                      => true,
            'modernize_types_casting'                => true,
            'no_alias_functions'                     => true,
            'no_homoglyph_names'                     => true,
            'no_php4_constructor'                    => true,
            'no_trailing_whitespace_in_string'       => true,
            'no_unneeded_final_method'               => true,
            'no_unreachable_default_argument_value'  => true,
            'no_unset_on_property'                   => true,
            'no_useless_sprintf'                     => true,
            'non_printable_character'                => true,
            'ordered_interfaces'                     => true,
            'ordered_traits'                         => true,
            'php_unit_set_up_tear_down_visibility'   => true,
            'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],
            'pow_to_exponentiation'                  => true,
            'self_accessor'                          => true,
            'set_type_to_cast'                       => true,
            'static_lambda'                          => true,
            'strict_param'                           => true,
            'string_line_ending'                     => true,
            'ternary_to_elvis_operator'              => true,
            'void_return'                            => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
