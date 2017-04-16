<?php

namespace Zolli\WebDriver\Selector\Strategy;

class PartialLinkTextSelectorStrategy extends AbstractSelectorStrategy
{

    /**
     * @inheritdoc
     */
    public function getStrategyName(): string
    {
        return Strategies::PARTIAL_LINK_TEXT;
    }

}