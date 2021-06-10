<?php

namespace Realodix\PhpCsFixerConfig\Ruleset;

interface RulesetInterface
{
    /**
     * Name of this ruleset.
     */
    public function getName(): string;

    /**
     * Defined rules for this ruleset.
     */
    public function getRules(): array;

    /**
     * Returns the minimum `PHP_VERSION_ID`
     * that is required by this ruleset.
     */
    public function getRequiredPHPVersion(): int;

    /**
     * Does this ruleset have risky rules?
     *
     * If yes and `PhpCsFixer\Config` has the `$isRiskyAllowed`
     * flag set to `false`, those risky rules won't be run.
     *
     * Set this flag to `true` to automatically setup
     * the `$isRiskyAllowed` flag.
     */
    public function willAutoActivateIsRiskyAllowed(): bool;
}
