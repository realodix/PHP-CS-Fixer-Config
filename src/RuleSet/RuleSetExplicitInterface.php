<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

/**
 * Marker interface for explicit rule sets.
 *
 * An explicit rule set:
 *
 * - does not configure any rules for rule sets (https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/3.0/doc/ruleSets/index.rst)
 * - configures a rule that can be configured with an explicit configuration when the rule is enabled
 * - configures every rule that is not deprecated
 */
interface RuleSetExplicitInterface
{
}
