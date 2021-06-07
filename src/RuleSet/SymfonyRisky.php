<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class SymfonyRisky extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Symfony:risky';

    /**
     * Based on symfony/symfony
     *
     * See https://github.com/symfony/symfony/blob/5.4/.php-cs-fixer.dist.php.
     */
    public function myRules(): array
    {
        $basicRules = (new Symfony())->myRules();

        $rules = [
            '@PHPUnit75Migration:risky' => true,
            '@Symfony:risky'            => true,
        ];

        return array_merge($basicRules, $rules);
    }
}
