<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class Symfony extends AbstractRuleSet
{
    protected $name = 'Symfony Coding Standards';

    /**
     * Based on symfony/symfony
     * https://github.com/symfony/symfony/blob/5.4/.php-cs-fixer.dist.php
     */
    public function ruleSet(): array
    {
        $rules = [
            '@PHP71Migration' => true,
            '@Symfony' => true,
            'protected_to_private' => false,
        ];

        return $rules;
    }
}
