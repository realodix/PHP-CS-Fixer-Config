<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

$overrideRules = [
    'Symplify/blank_line_after_strict_types' => true,
    'Symplify/param_return_and_var_tag_malforms' => true,
    'Symplify/remove_useless_default_comment' => true,
];

$options = [
    // ..
];

return Factory::fromRuleSet(new RuleSet\RealodixStrict(), $overrideRules, $options);
