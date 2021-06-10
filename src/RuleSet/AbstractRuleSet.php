<?php

namespace Nexus\CsConfig\Ruleset;

abstract class AbstractRuleset implements RulesetInterface
{
    /**
     * Name of the ruleset.
     *
     * @var string
     */
    protected $name;

    /**
     * Rules for the ruleset.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Minimum PHP version.
     *
     * @var int
     */
    protected $requiredPHPVersion = 0;

    /**
     * Have this ruleset turn on `$isRiskyAllowed` flag?
     *
     * @var bool
     */
    protected $autoActivateIsRiskyAllowed = false;

    /**
     * {@inheritDoc}
     */
    final public function getName(): string
    {
        $class = strrchr(self::class, '\\') ?: self::class;

        return $this->name ?? trim($class, '\\');
    }

    /**
     * {@inheritDoc}
     */
    final public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * {@inheritDoc}
     */
    final public function getRequiredPHPVersion(): int
    {
        return $this->requiredPHPVersion;
    }

    /**
     * {@inheritDoc}
     */
    final public function willAutoActivateIsRiskyAllowed(): bool
    {
        return $this->autoActivateIsRiskyAllowed;
    }
}
