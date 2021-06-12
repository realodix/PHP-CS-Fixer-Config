<?php

namespace Realodix\CsConfig\RuleSet;

use MattAllan\LaravelCodeStyle\Config;

final class Laravel extends AbstractRuleSet
{
    protected $name = 'Laravel Coding Standards';

    /**
     * Based on
     * - https://docs.styleci.io/presets#laravel
     * - https://github.com/matt-allan/laravel-code-style.
     */
    public function getRules(): array
    {
        return Config::RULE_DEFINITIONS['@Laravel'];
    }
}
