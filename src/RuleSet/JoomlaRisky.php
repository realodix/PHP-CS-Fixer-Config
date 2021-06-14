<?php

namespace Realodix\CsConfig\RuleSet;

final class JoomlaRisky extends AbstractRuleSet
{
    protected $name = 'Joomla Coding Standards (risky)';

    /**
     * Based on joomla/joomla-cms
     * - https://github.com/joomla/joomla-cms/blob/125b2d7/.php_cs.dist (4.1-dev)
     */
    public function getRules(): array
    {
        $basicRules = (new Joomla())->getRules();

        $rules = [
            'no_alias_functions' => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
