<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class Symfony extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Symfony';

    /**
     * Based on symfony/symfony
     *
     * See https://github.com/symfony/symfony/blob/5.4/.php-cs-fixer.dist.php
     */
    public function myRules(): array
    {
        $rules = [
            '@PHP71Migration'      => true,
            '@Symfony'             => true,
            'protected_to_private' => false,
        ];

        return $rules;
    }
}
