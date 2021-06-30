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

        $this->assertTrue($config->getUsingCache());
        $this->assertTrue($config->getRiskyAllowed());
        $this->assertSame($rules, $config->getRules());
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

        $config = Factory::fromRuleSet($ruleSet, $overrideRules);

        $this->assertEquals(
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

        $this->assertArrayHasKey(
            'header_comment',
            $config->getRules()
        );
    }

    /**
     * @covers ::fromRuleSet
     */
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Factory::fromRuleSet(new RuleSet\RealodixPlus())
        );

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Factory::fromRuleSet(new RuleSet\CodeIgniterRisky())
        );

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Factory::fromRuleSet(new RuleSet\Drupal())
        );

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Factory::fromRuleSet(new RuleSet\LaravelRisky())
        );

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Factory::fromRuleSet(new RuleSet\PhpStorm())
        );

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Factory::fromRuleSet(new RuleSet\PHPUnitRisky())
        );

        $this->assertInstanceOf(
            \PhpCsFixer\ConfigInterface::class,
            Factory::fromRuleSet(new RuleSet\YiiRisky())
        );
    }
}
