<?php

namespace Zolli\WebDriver\Selector\Strategy;

class ElementNameSelectorStrategy extends AbstractSelectorStrategy
{

    /**
     * @inheritdoc
     */
    public function getStrategyName(): string
    {
        return Strategies::NAME;
    }

}