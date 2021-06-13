<?php

namespace Realodix\CsConfig\RuleSet;

interface RuleSetInterface
{
    /**
     * Returns the name of the rule set
     */
    public function name(): string;

    /**
     * Returns an array of rules along with their configuration
     */
    public function rules(): array;

    /**
     * Returns the minimum required PHP version (PHP_VERSION_ID)
     *
     * @see http://php.net/manual/en/reserved.constants.php
     */
    public function requiredPHPVersion(): int;
}
