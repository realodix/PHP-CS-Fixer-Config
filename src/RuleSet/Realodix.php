<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class Realodix extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Realodix Coding Standards';

    public function myRules(): array
    {
        $rules = [

            'binary_operator_spaces'       => ['operators' => ['=>' => 'align']], // unalign_equals (default)
            'fully_qualified_strict_types' => true,
            'no_empty_phpdoc'              => false,
            'no_useless_else'              => true,
            'phpdoc_summary'               => false,
            'phpdoc_to_comment'            => true,
            'phpdoc_align'                 => [ // align_phpdoc
                'tags' => [
                    'param',
                    // 'return',
                    'throws', 'type', 'var',
                ],
            ],
            'phpdoc_var_annotation_correct_order' => true,
        ];

        $laravelByStyleCi = (new LaravelByStyleCI())->myRules();

        return array_merge($laravelByStyleCi, $rules);
    }
}
