<?php

namespace Realodix\CsConfig\Test;

use PHPUnit\Framework\TestCase;
use Realodix\CsConfig\Factory;

class FactoryTest extends TestCase
{
    /**
     * @covers ::fromRuleSet
     */
    public function testOverrideRules(): void
    {
        $rules = [
            'foo' => true,
        ];

        $ruleSet = new DummyRuleSet($rules);

        $overrideRules = [
            'foo' => false,
        ];

        $config = Factory::fromRuleSet(
            $ruleSet,
            $overrideRules,
        );

        self::assertEquals(
            array_merge($rules, $overrideRules),
            $config->getRules()
        );
    }
}
