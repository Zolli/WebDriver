<?php

namespace Zolli\WebDriver\Selector\Strategy;

class ElementIdSelectorStrategy extends AbstractSelectorStrategy
{

    /**
     * @inheritdoc
     */
    public function getStrategyName(): string
    {
        return Strategies::ID;
    }

}