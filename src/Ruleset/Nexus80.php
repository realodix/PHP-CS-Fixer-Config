<?php

namespace Realodix\PhpCsFixerConfig\Ruleset;

final class Nexus80 extends AbstractRuleset
{
    protected $name = 'Nexus for PHP 8.0';

    public function ruleSet(): array
    {
        return [
            '@Symfony' => true,
        ];
    }
}
