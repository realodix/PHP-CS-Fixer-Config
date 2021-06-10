<?php

declare(strict_types=1);

use Nexus\CsConfig\Factory;
use Nexus\CsConfig\Ruleset\Nexus73;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->files()
    ->in(__DIR__)
    ->exclude(['build'])
    ->append([__FILE__])
;

$overrides = [
    'binary_operator_spaces' => ['default' => 'single_space'],
];

$options = [
    'finder' => $finder,
];

return Factory::create(new Nexus73(), $overrides, $options)->forProjects();
