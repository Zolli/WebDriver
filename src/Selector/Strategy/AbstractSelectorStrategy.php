<?php

namespace Zolli\WebDriver\Selector\Strategy;

abstract class AbstractSelectorStrategy implements SelectorStrategyInterface
{

    /**
     * @var string
     */
    protected $selector;

    /**
     * @inheritdoc
     */
    public function setSelector(string $selector): SelectorStrategyInterface
    {
        $this->selector = $selector;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSelector(): string
    {
        return $this->selector;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return 'Strategy: ' . $this->getStrategyName() . ' Selector: ' . $this->selector;
    }

}