<?php

namespace Realodix\CsConfig\RuleSet;

final class LaravelRisky extends AbstractRuleSet
{
    protected $name = 'Laravel Coding Standards (risky)';

    /**
     * Based on
     * - https://github.com/matt-allan/laravel-code-style/blob/b224862/src/Config.php (main)
     * - https://gist.github.com/laravel-shift/cab527923ed2a109dda047b97d53c200#gistcomment-3755709
     */
    public function getRules(): array
    {
        $baseRules = (new Laravel())->getRules();

        $rules = [
            'no_alias_functions'                    => true,
            'no_unreachable_default_argument_value' => true,
            'psr_autoloading'                       => true,
            'self_accessor'                         => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
