<?php

namespace Realodix\CsConfig\RuleSet;

use PhpCsFixerCustomFixers\Fixer;

final class Realodix extends AbstractRuleSet
{
    protected $name = 'Realodix Coding Standards';

    public function getRules(): array
    {
        $basicRules = (new Laravel())->getRules();

        $rules = [
            'no_empty_phpdoc'         => false,
            'phpdoc_summary'          => false,
            'ternary_operator_spaces' => false,
            'unary_operator_spaces'   => false,

            'align_multiline_comment'      => true,
            'fully_qualified_strict_types' => true,
            'no_useless_else'              => true,
            'no_useless_return'            => true,
            'php_unit_method_casing'       => true,
            'phpdoc_to_comment'            => true,

            'phpdoc_var_annotation_correct_order' => true,
            'binary_operator_spaces'              => [
                // unalign_equals (default)
                'operators' => ['=>' => 'align'],
            ],
            'phpdoc_add_missing_param_annotation' => [
                'only_untyped' => false,
            ],
            'phpdoc_align'                        => [
                // align_phpdoc
                'tags' => [
                    'param',
                    'throws', 'type', 'var',
                    // 'return',
                ],
            ],

            Fixer\NoDuplicatedArrayKeyFixer::name()     => true,
            Fixer\NoDuplicatedImportsFixer::name()      => true,
            Fixer\NoUselessParenthesisFixer::name()     => true,
            Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
