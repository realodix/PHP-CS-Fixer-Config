<?php

namespace Realodix\CsConfig\RuleSet;

final class ComposerRisky extends AbstractRuleSet
{
    protected $name = 'Composer Coding Standards  (risky)';

    /**
     * Based on composer/composer
     * - https://github.com/composer/composer/blob/9a32bf9/.php_cs (master)
     */
    public function getRules(): array
    {
        $basicRules = (new Composer())->getRules();
        $rules = [
            'psr_autoloading' => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
