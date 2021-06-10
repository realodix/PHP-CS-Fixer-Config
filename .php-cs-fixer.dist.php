<?php

declare(strict_types=1);

use PedroTroller\CS\Fixer\Fixers;
use PhpCsFixer\Finder;
use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet\Nexus80;

$finder = Finder::create()
    ->files()
    ->in(__DIR__)
    ->exclude(['build'])
    ->append([__FILE__])
;

$overrideRules = [
    'binary_operator_spaces' => ['default' => 'single_space'],
    'PedroTroller/doctrine_migrations' => true,
];

$options = [
    'finder' => $finder,
    'customFixers' => new Fixers(),
];

return Factory::create(new Nexus80(), $overrideRules, $options)->forProjects();
