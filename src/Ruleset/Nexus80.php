<?php

namespace Realodix\PhpCsFixerConfig\Ruleset;

final class Nexus80 extends AbstractRuleset
{
    public function __construct()
    {
        $this->name = 'Nexus for PHP 8.0';
        $this->rules = [
            '@Symfony' => true,
        ];
        $this->requiredPHPVersion = 80000;
        $this->autoActivateIsRiskyAllowed = true;
    }
}
