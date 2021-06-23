<?php

namespace Realodix\CsConfig\Test;

use PHPUnit\Framework\TestCase;
use Realodix\CsConfig\Factory;
use Realodix\CsConfig\RuleSet;

/**
 * @coversDefaultClass Realodix\CsConfig\Factory
 */
class FactoryTest extends TestCase
{
    /**
     * @covers ::fromRuleSet
     */
    public function testFromRuleSetCreatesConfig()
    {
        $rules = ['foo' => 'bar'];

        $ruleSet = new DummyRuleSet($rules);

        $config = Factory::fromRuleSet($ruleSet);

        self::assertTrue($config->getUsingCache());
        self::assertTrue($config->getRiskyAllowed());
        self::assertSame($rules, $config->getRules());
    }

    /**
     * @covers ::fromRuleSet
     */
    public function testOverrideRules(): void
    {
        $rules = ['foo' => true];

        $ruleSet = new DummyRuleSet($rules);

        $overrideRules = [
            'foo' => false,
        ];

        $config = Factory::fromRuleSet($ruleSet,$overrideRules);

        self::assertEquals(
            array_merge($rules, $overrideRules),
            $config->getRules()
        );
    }

    /**
     * @covers ::fromRuleSet
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
