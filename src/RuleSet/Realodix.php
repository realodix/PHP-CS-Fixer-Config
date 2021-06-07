<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class Realodix extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Realodix Coding Standards';

    public function myRules(): array
    {
        $basicRules = (new Laravel())->myRules();

        $rules = [
            'align_multiline_comment'      => true,
            'binary_operator_spaces'       => ['operators' => ['=>' => 'align']], // unalign_equals (default)
            'fully_qualified_strict_types' => true,
            'no_empty_phpdoc'              => false,
            'no_useless_else'              => true,
            'no_useless_return'            => true,
            'phpdoc_align'                 => [ // align_phpdoc
                'tags' => [
                    'param',
                    // 'return',
                    'throws', 'type', 'var',
                ],
            ],
            'phpdoc_summary'                      => false,
            'php_unit_method_casing'              => true,
            'phpdoc_to_comment'                   => true,
            'phpdoc_var_annotation_correct_order' => true,
            'ternary_operator_spaces'             => false,
            'unary_operator_spaces'               => false,
        ];

        return array_merge($basicRules, $rules);
    }
}
