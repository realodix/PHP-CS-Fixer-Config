<?php

use PhpCsFixer\Finder;
use Realodix\CsConfig\Factory;
use Realodix\CsConfig\RuleSet;

$overrideRules = [
    // ..
];

$finder = Finder::create()
          ->in(__DIR__);

return Factory::fromRuleSet(new RuleSet\RealodixPlus, $overrideRules)
        ->setFinder($finder);
