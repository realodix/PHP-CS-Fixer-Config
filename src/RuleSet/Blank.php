<?php

namespace Realodix\CsConfig\RuleSet;

final class Blank extends AbstractRuleSet
{
    protected $name = 'Your Coding Standards';

    public function getRules(): array
    {
        return [];
    }
}
