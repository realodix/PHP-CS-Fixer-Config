<?php

namespace Realodix\PhpCsFixerConfig\Ruleset;

abstract class AbstractRuleset implements RulesetInterface
{
    protected $name;

    protected $rules = [];

    protected $requiredPHPVersion = 0;

    protected $autoActivateIsRiskyAllowed = false;

    final public function getName(): string
    {
        $class = strrchr(self::class, '\\') ?: self::class;

        return $this->name ?? trim($class, '\\');
    }

    final public function getRules(): array
    {
        return $this->rules;
    }

    final public function getRequiredPHPVersion(): int
    {
        return $this->requiredPHPVersion;
    }

    final public function willAutoActivateIsRiskyAllowed(): bool
    {
        return $this->autoActivateIsRiskyAllowed;
    }
}
