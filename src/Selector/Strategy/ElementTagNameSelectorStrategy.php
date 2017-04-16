<?php

namespace Zolli\WebDriver\Selector\Strategy;

class ElementTagNameSelectorStrategy extends AbstractSelectorStrategy
{

    /**
     * @inheritdoc
     */
    public function getStrategyName(): string
    {
        return Strategies::TAG_NAME;
    }

}