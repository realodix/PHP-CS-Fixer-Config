<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class YiiRisky extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Yii Code Style (risky)';

    /**
     * Based on yiisoft/yii2
     * - https://github.com/yiisoft/yii2/blob/master/cs/src/YiiConfig.php
     * - https://github.com/yiisoft/yii2/blob/master/docs/internals/core-code-style.md
     *
     * There are 9 rules found commented:
     * - mb_str_functions
     * - method_separation
     * - no_extra_consecutive_blank_lines.curly_brace_block
     * - no_extra_consecutive_blank_lines.extra
     * - ordered_class_elements
     * - php_unit_strict
     * - phpdoc_inline_tag
     * - phpdoc_order
     * - phpdoc_to_comment
     *
     * Diff
     * - [D] binary_operator_spaces
     * - [D] ordered_imports.sortAlgorithm
     * - [M] array_syntax
     * - [M] binary_operator_spaces
     */
    public function myRules(): array
    {
        $rules = [
            'dir_constant'             => true,
            'ereg_to_preg'             => true,
            'modernize_types_casting'  => true,
            'no_alias_functions'       => true,
            'no_php4_constructor'      => true,
            'non_printable_character'  => true,
            'php_unit_construct'       => true,
            'php_unit_dedicate_assert' => true,
            'psr_autoloading'          => true,
            'self_accessor'            => true,
        ];

        return $rules;
    }
}
