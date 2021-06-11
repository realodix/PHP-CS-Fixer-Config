<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

use PhpCsFixerCustomFixers\Fixer;

final class Realodix extends AbstractRuleSet
{
    protected $name = 'Realodix Coding Standards';

    public function getRules(): array
    {
        $basicRules = (new Laravel())->getRules();

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

            Fixer\NoDuplicatedArrayKeyFixer::name()     => true,
            Fixer\NoDuplicatedImportsFixer::name()      => true,
            Fixer\NoUselessParenthesisFixer::name()     => true,
            Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
