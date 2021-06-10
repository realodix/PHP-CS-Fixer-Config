<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class YiiRisky extends AbstractRuleSet
{
    protected $name = 'Yii Code Style (risky)';

    /**
     * Based on yiisoft/yii2
     * - https://github.com/yiisoft/yii2/blob/master/cs/src/YiiConfig.php
     * - https://github.com/yiisoft/yii2/blob/master/docs/internals/core-code-style.md
     */
    public function ruleSet(): array
    {
        $basicRules = (new Yii())->ruleSet();

        $rules = [
            'dir_constant' => true,
            'ereg_to_preg' => true,
            'modernize_types_casting' => true,
            'no_alias_functions' => true,
            'no_php4_constructor' => true,
            'non_printable_character' => true,
            'php_unit_construct' => true,
            'php_unit_dedicate_assert' => true,
            'psr_autoloading' => true,
            'self_accessor' => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
