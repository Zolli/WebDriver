<?php

namespace Zolli\WebDriver\Tests\Unit\Selector\Strategy;

use Zolli\WebDriver\Selector\Strategy\ElementNameSelectorStrategy;

class ElementNameSelectorStrategyTest extends SelectorStrategyTestBase
{

    /**
     * @inheritdoc
     */
    public function getStrategyClass(): string
    {
        return ElementNameSelectorStrategy::class;
    }

    /**
     * @inheritdoc
     */
    public function getExampleSelector(): string
    {
        return 'password-repeat';
    }

}