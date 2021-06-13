<?php

namespace Realodix\CsConfig\RuleSet;

use MattAllan\LaravelCodeStyle\Config;

final class LaravelRisky extends AbstractRuleSet
{
    protected $name = 'Laravel Coding Standards (risky)';

    /**
     * Based on
     * - https://docs.styleci.io/presets#laravel
     * - https://github.com/matt-allan/laravel-code-style
     */
    public function getRules(): array
    {
        $basicRules = Config::RULE_DEFINITIONS['@Laravel'];
        $laravelRisky = Config::RULE_DEFINITIONS['@Laravel:risky'];

        return array_merge($basicRules, $laravelRisky);
    }
}
