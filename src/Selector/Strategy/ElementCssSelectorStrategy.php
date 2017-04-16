<?php

namespace Zolli\WebDriver\Selector\Strategy;

class ElementCssSelectorStrategy extends AbstractSelectorStrategy
{

    /**
     * @inheritdoc
     */
    public function getStrategyName(): string
    {
        return Strategies::CSS_SELECTOR;
    }

}