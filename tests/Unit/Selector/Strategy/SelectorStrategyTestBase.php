<?php

namespace Zolli\WebDriver\Tests\Unit\Selector\Strategy;

use PHPUnit\Framework\TestCase;

abstract class SelectorStrategyTestBase extends TestCase
{

    /**
     * @var \Zolli\WebDriver\Selector\Strategy\AbstractSelectorStrategy
     */
    protected $strategy;

    /**
     * Returns the fully qualified class name of the strategy that the current class tests
     *
     * @return string
     */
    public abstract function getStrategyClass(): string;

    /**
     * Returns a valid example selector for the currently tested strategy
     *
     * @return string
     */
    public abstract function getExampleSelector(): string;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $className = $this->getStrategyClass();

        $this->strategy = new $className;
        $this->strategy->setSelector($this->getExampleSelector());
    }

    public function testItReturnsTheSelectorCorrectly()
    {
        $this->assertEquals($this->getExampleSelector(), $this->strategy->getSelector());
    }

    public function testItCastsToStringProperly()
    {
        $expected = 'Using: ' . $this->strategy->getStrategyName() . ' Value: ' . $this->getExampleSelector();
        $actual = (string) $this->strategy;

        return $this->assertEquals($expected, $actual);
    }
}