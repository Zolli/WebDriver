<?php

namespace Zolli\WebDriver\Tests\Unit\Selector\Strategy;

use Zolli\WebDriver\Selector\Strategy\ElementIdSelectorStrategy;

class ElementIdSelectorStrategyTest extends SelectorStrategyTestBase
{

    /**
     * @inheritdoc
     */
    public function getStrategyClass(): string
    {
        return ElementIdSelectorStrategy::class;
    }

    /**
     * @inheritdoc
     */
    public function getExampleSelector(): string
    {
        return 'page-container';
    }

}