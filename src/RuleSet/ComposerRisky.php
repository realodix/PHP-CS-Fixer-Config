<?php

namespace Realodix\CsConfig\RuleSet;

final class ComposerRisky extends AbstractRuleSet
{
    protected $name = 'Composer Coding Standards (risky)';

    /**
     * Based on composer/composer
     * - https://github.com/composer/composer/blob/9a32bf9/.php_cs (master)
     *
     * Diff
     * - [M] psr0 Rename to psr_autoloading
     */
    public function getRules(): array
    {
        $baseRules = (new Composer())->getRules();

        $rules = [
            'psr_autoloading' => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
