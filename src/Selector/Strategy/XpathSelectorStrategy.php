<?php

namespace Zolli\WebDriver\Selector\Strategy;

class XpathSelectorStrategy extends AbstractSelectorStrategy
{

    /**
     * @inheritdoc
     */
    public function getStrategyName(): string
    {
        return Strategies::XPATH;
    }

}