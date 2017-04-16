<?php

namespace Zolli\WebDriver\Selector\Strategy;

interface SelectorStrategyInterface
{

    /**
     * Returns the current selector strategy name
     *
     * @return string
     */
    public function getStrategyName(): string;

    /**
     * Set the selector used in element selection
     *
     * @param string $selector
     *
     * @return SelectorStrategyInterface
     */
    public function setSelector(string $selector): SelectorStrategyInterface;

    /**
     * Returns the currently set selector
     *
     * @return string
     */
    public function getSelector(): string;

    /**
     * Returns the string representation of the current selector
     *
     * @return string
     */
    public function __toString();

}