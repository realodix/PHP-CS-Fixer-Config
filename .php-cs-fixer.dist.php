<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

$config = Factory::fromRuleSet(new RuleSet\RealodixStrict());
$config->getFinder()->in(__DIR__);

return $config;
