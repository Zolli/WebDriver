<?php

namespace Zolli\WebDriver\Tests\Unit\Selector\Strategy;

use Zolli\WebDriver\Selector\Strategy\XpathSelectorStrategy;

class XpathSelectorStrategyTest extends SelectorStrategyTestBase
{

    /**
     * @inheritdoc
     */
    public function getStrategyClass(): string
    {
        return XpathSelectorStrategy::class;
    }

    /**
     * @inheritdoc
     */
    public function getExampleSelector(): string
    {
        return '//*[@id="home-container"]/div[1]';
    }

}