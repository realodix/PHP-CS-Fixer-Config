<?php

namespace Realodix\CsConfig\Test;

use PHPUnit\Framework\TestCase;
use Realodix\CsConfig\Factory;
use Realodix\CsConfig\RuleSet;

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

    /**
     * @covers Factory
     */
    public function testHeaderComment(): void
    {
        $config = Factory::fromRuleSet(new RuleSet\Blank('a'));

        self::assertArrayHasKey(
            'header_comment',
            $config->getRules()
        );
    }
}
