<?php

namespace Realodix\CsConfig\RuleSet;

use Jubeki\LaravelCodeStyle\Config as LaravelCS;

final class LaravelRisky extends AbstractRuleSet
{
    protected $name = 'Laravel Code Style (risky)';

    public function getRules(): array
    {
        return array_merge(
            (new Laravel())->getRules(),
            LaravelCS::RULE_DEFINITIONS['@Laravel:risky']
        );
    }
}
