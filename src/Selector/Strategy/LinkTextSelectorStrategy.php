<?php

namespace Zolli\WebDriver\Selector\Strategy;

class LinkTextSelectorStrategy extends AbstractSelectorStrategy
{

    /**
     * @inheritdoc
     */
    public function getStrategyName(): string
    {
        return Strategies::LINK_TEXT;
    }

}