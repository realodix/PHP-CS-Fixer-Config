<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

use FusionsPim\PhpCsFixer\Factory;

final class FusionsPim extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Fusions PIM';

    /**
     * Based on symfony/symfony
     *
     * See https://github.com/symfony/symfony/blob/5.4/.php-cs-fixer.dist.php
     */
    public function myRules(): array
    {
        return Factory::fromDefaults();
    }
}
