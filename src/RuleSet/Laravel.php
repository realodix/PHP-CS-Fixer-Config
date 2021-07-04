<?php

namespace Realodix\CsConfig\RuleSet;

use MattAllan\LaravelCodeStyle\Config as MattAllanLCS;

final class Laravel extends AbstractRuleSet
{
    protected $name = 'Laravel Code Style';

    public function getRules(): array
    {
        return MattAllanLCS::RULE_DEFINITIONS['@Laravel'];
    }
}
