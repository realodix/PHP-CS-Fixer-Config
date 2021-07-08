<?php

namespace Realodix\CsConfig\RuleSet;

final class Realodix extends AbstractRuleSet
{
    protected $name = 'Realodix Coding Standards';

    public function getRules(): array
    {
        $baseRules = (new Laravel())->getRules();

        $methodArgumentSpace = true;
        if (version_compare(PHP_VERSION, '7.3.0', '>')) {
            $methodArgumentSpace = [
                // PHP80Migration
                // Diff https://github.com/matt-allan/laravel-code-style/blob/b224862/src/Config.php#L70
                'after_heredoc' => true,
            ];
        }

        $rules = [
            /*
             * Modify
             */
            'no_empty_phpdoc'         => false,
            'phpdoc_summary'          => false,
            'ternary_operator_spaces' => false,
            'unary_operator_spaces'   => false,
            'method_argument_space'   => $methodArgumentSpace,

            /*
             * Addition
             */
            'explicit_string_variable'     => true,
            'fully_qualified_strict_types' => true,
            'no_useless_else'              => true,
            'php_unit_method_casing'       => true,
            'phpdoc_order'                 => true,
            'phpdoc_separation'            => true,
            'phpdoc_to_comment'            => true,

            'phpdoc_var_annotation_correct_order' => true,
            'phpdoc_add_missing_param_annotation' => [
                'only_untyped' => false,
            ],
            'phpdoc_align' => [
                // align_phpdoc
                'tags' => [
                    'param',
                    'throws', 'type', 'var',
                    // 'return',
                ],
            ],
        ];

        return array_merge($baseRules, $rules);
    }
}
