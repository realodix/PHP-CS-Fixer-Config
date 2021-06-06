<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

use MattAllan\LaravelCodeStyle\Config;

final class LaravelRisky extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Laravel:risky';

    /**
     * Based on
     * - https://docs.styleci.io/presets#laravel
     * - https://github.com/matt-allan/laravel-code-style.
     */
    public function myRules(): array
    {
        $laravel = Config::RULE_DEFINITIONS['@Laravel'];
        $laravelRisky = Config::RULE_DEFINITIONS['@Laravel:risky'];

        return array_merge($laravel, $laravelRisky);
    }
}
