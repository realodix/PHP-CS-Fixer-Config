<?php

use PhpCsFixer\Finder;
use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet\Realodix;

$finder = Finder::create()
    ->files()
    ->in(__DIR__)
    ->exclude(['build'])
    ->append([__FILE__]);

$overrideRules = [
    'binary_operator_spaces' => ['default' => 'single_space'],
    'PedroTroller/doctrine_migrations' => true,
];

$options = [
    'finder' => $finder,

];

return Factory::create(new Realodix(), $overrideRules, $options)->forProjects();
