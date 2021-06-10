<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class SymfonyRisky extends AbstractRuleSet
{
    protected $name = 'Symfony Coding Standards (risky)';

    /**
     * Based on symfony/symfony
     * https://github.com/symfony/symfony/blob/5.4/.php-cs-fixer.dist.php
     */
    public function ruleSet(): array
    {
        $basicRules = (new Symfony())->ruleSet();

        $rules = [
            '@PHPUnit75Migration:risky' => true,
            '@Symfony:risky' => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
