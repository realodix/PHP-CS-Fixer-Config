<?php

namespace Realodix\CsConfig\RuleSet;

final class YiiRisky extends AbstractRuleSet
{
    protected $name = 'Yii Code Style (risky)';

    /**
     * Based on yiisoft/yii2
     * - https://github.com/yiisoft/yii2/blob/8ac70d4/cs/src/YiiConfig.php (master)
     * - https://github.com/yiisoft/yii2/blob/8ac70d4/docs/internals/core-code-style.md (master)
     */
    public function getRules(): array
    {
        $basicRules = (new Yii())->getRules();

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

        return array_merge($basicRules, $rules);
    }
}
