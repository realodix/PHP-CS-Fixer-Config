<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class Nexus80 extends AbstractRuleSet
{
    protected $name = 'Nexus for PHP 8.0';

    public function ruleSet(): array
    {
        return [
            '@Symfony' => true,
        ];
    }
}
