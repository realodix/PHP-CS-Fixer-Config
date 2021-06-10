<?php

namespace Realodix\PhpCsFixerConfig\Ruleset;

interface RulesetInterface
{
    /**
     * Returns the name of the rule set.
     */
    public function getName(): string;

    /**
     * Returns an array of rules along with their configuration.
     */
    public function getRules(): array;

    /**
     * Returns the minimum required PHP version (PHP_VERSION_ID).
     *
     * @see http://php.net/manual/en/reserved.constants.php
     */
    public function targetPhpVersion(): int;

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
