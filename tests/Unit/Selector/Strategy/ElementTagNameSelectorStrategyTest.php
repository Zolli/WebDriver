<?php

namespace Zolli\WebDriver\Tests\Unit\Selector\Strategy;

use Zolli\WebDriver\Selector\Strategy\ElementTagNameSelectorStrategy;

class ElementTagNameSelectorStrategyTest extends SelectorStrategyTestBase
{

    /**
     * @inheritdoc
     */
    public function getStrategyClass(): string
    {
        return ElementTagNameSelectorStrategy::class;
    }

    /**
     * @inheritdoc
     */
    public function getExampleSelector(): string
    {
        return 'body';
    }

}