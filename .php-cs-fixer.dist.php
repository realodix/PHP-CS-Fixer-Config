<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

$overrideRules = [
    // ..
];

$options = [
    // ..
];

return Factory::fromRuleSet(new RuleSet\RealodixStrict(), $overrideRules, $options);
