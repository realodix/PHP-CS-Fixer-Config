<?php

namespace Realodix\CsConfig\RuleSet;

use Jubeki\LaravelCodeStyle\Config as LaravelCS;

final class Laravel extends AbstractRuleSet
{
    protected $name = 'Laravel Code Style';

    public function getRules(): array
    {
        return LaravelCS::RULE_DEFINITIONS['@Laravel'];
    }
}
