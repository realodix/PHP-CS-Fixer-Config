<?php

namespace Realodix\CsConfig\RuleSet;

use MattAllan\LaravelCodeStyle\Config;

final class Laravel extends AbstractRuleSet
{
    protected $name = 'Laravel Coding Standards';

    /**
     * Based on matt-allan/laravel-code-style
     * - https://github.com/matt-allan/laravel-code-style/blob/b224862/src/Config.php (main)
     */
    public function getRules(): array
    {
        return Config::RULE_DEFINITIONS['@Laravel'];
    }
}
