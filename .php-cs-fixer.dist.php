<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

$overrideRules = [
    'PedroTroller/doctrine_migrations' => true,
];

$options = [
    // ..
];

return Factory::fromRuleSet(new RuleSet\PhpStorm(), $overrideRules, $options);
