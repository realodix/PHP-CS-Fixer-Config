<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet\RealodixStrict;

$overrideRules = [
    'PedroTroller/doctrine_migrations' => true,
];

$options = [
    // ..
];

return Factory::fromRuleSet(new RealodixStrict(), $overrideRules, $options);
