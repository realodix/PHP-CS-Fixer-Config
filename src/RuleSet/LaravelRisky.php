<?php

namespace Realodix\CsConfig\RuleSet;

use MattAllan\LaravelCodeStyle\Config as LaravelCS;

final class LaravelRisky extends AbstractRuleSet
{
    protected $name = 'Laravel Coding Standards (risky)';

    /**
     * Based on matt-allan/laravel-code-style
     * - https://github.com/matt-allan/laravel-code-style/blob/b224862/src/Config.php (main)
     */
    public function getRules(): array
    {
        $baseRules = (new Laravel())->getRules();

        $rules = LaravelCS::RULE_DEFINITIONS['@Laravel:risky'];

        return array_merge($baseRules, $rules);
    }
}
