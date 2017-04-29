<?php

namespace Zolli\WebDriver\Selector\Strategy;

/**
 * Abstract base for element selector strategies
 *
 * @package Zolli\WebDriver
 * @subpackage Selector\Strategy
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
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
        return 'Using: ' . $this->getStrategyName() . ' Value: ' . $this->selector;
    }

}