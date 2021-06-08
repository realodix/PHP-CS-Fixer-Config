<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

use MattAllan\LaravelCodeStyle\Config;

final class Laravel extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Laravel Coding Standards';

    /**
     * Based on
     * - https://docs.styleci.io/presets#laravel
     * - https://github.com/matt-allan/laravel-code-style.
     */
    public function myRules(): array
    {
        return Config::RULE_DEFINITIONS['@Laravel'];
    }
}
