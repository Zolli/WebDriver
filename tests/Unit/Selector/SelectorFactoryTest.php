<?php

namespace Zolli\WebDriver\Tests\Unit\Selector;

use PHPUnit\Framework\TestCase;
use Zolli\WebDriver\Selector\SelectorFactory;
use Zolli\WebDriver\Selector\Strategy\ElementClassNameSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\ElementCssSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\ElementIdSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\ElementNameSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\ElementTagNameSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\LinkTextSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\PartialLinkTextSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\XpathSelectorStrategy;

class SelectorFactoryTest extends TestCase
{

    public function methodNameProvider()
    {
        return [
            ['className', 'a', ElementClassNameSelectorStrategy::class],
            ['cssSelector', 'b', ElementCssSelectorStrategy::class],
            ['id', 'c', ElementIdSelectorStrategy::class],
            ['name', 'd', ElementNameSelectorStrategy::class],
            ['tagName', 'e', ElementTagNameSelectorStrategy::class],
            ['linkText', 'f', LinkTextSelectorStrategy::class],
            ['partialLinkText', 'g', PartialLinkTextSelectorStrategy::class],
            ['xpath', 'h', XpathSelectorStrategy::class],
        ];
    }

    /**
     * @dataProvider methodNameProvider
     */
    public function testFactoryClassReturnTheCorrectSelectorsWithCorrectValues($methodName, $selectorValue, $selectorClass)
    {
        /** @var \Zolli\WebDriver\Selector\Strategy\AbstractSelectorStrategy $selector */
        $selector = call_user_func_array(SelectorFactory::class . '::' . $methodName, [$selectorValue]);

        $this->assertInstanceOf($selectorClass, $selector);
        $this->assertEquals($selectorValue, $selector->getSelector());
    }

}