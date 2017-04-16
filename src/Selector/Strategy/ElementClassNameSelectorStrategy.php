<?php

namespace Zolli\WebDriver\Selector\Strategy;

class ElementClassNameSelectorStrategy extends AbstractSelectorStrategy
{

    /**
     * @inheritdoc
     */
    public function getStrategyName(): string
    {
        return Strategies::CLASS_NAME;
    }

}
