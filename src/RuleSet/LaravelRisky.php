<?php

namespace Realodix\CsConfig\RuleSet;

use MattAllan\LaravelCodeStyle\Config;

final class LaravelRisky extends AbstractRuleSet
{
    protected $name = 'Laravel Coding Standards (risky)';

    /**
     * Based on matt-allan/laravel-code-style
     * - https://github.com/matt-allan/laravel-code-style/blob/b224862/src/Config.php (main)
     */
    public function getRules(): array
    {
        $basicRules = Config::RULE_DEFINITIONS['@Laravel'];
        $laravelRisky = Config::RULE_DEFINITIONS['@Laravel:risky'];

        return array_merge($basicRules, $laravelRisky);
    }
}
