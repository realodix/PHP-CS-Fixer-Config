<?php

use Realodix\CsConfig\Factory;
use Realodix\CsConfig\RuleSet;

$overrideRules = [
    // ..
];

$options = [
    // ..
];

return Factory::fromRuleSet(new RuleSet\LaravelRisky(), $overrideRules, $options)->setRiskyAllowed(false);
