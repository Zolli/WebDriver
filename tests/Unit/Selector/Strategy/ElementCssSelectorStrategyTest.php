<?php

namespace Zolli\WebDriver\Tests\Unit\Selector\Strategy;

use Zolli\WebDriver\Selector\Strategy\ElementCssSelectorStrategy;

class ElementCssSelectorStrategyTest extends SelectorStrategyTestBase
{

    /**
     * @inheritdoc
     */
    public function getStrategyClass(): string
    {
        return ElementCssSelectorStrategy::class;
    }

    /**
     * @inheritdoc
     */
    public function getExampleSelector(): string
    {
        return '.header-ui .menu ul';
    }

}