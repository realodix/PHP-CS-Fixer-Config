<?php

namespace Realodix\CsConfig\RuleSet;

use MattAllan\LaravelCodeStyle\Config as MattAllanLCS;

final class LaravelRisky extends AbstractRuleSet
{
    protected $name = 'Laravel Code Style (risky)';

    public function getRules(): array
    {
        return array_merge(
            (new Laravel())->getRules(),
            MattAllanLCS::RULE_DEFINITIONS['@Laravel:risky']
        );
    }
}
