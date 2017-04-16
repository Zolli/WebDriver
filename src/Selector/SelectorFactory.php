<?php

namespace Zolli\WebDriver\Selector;

use Zolli\WebDriver\Selector\Strategy\ElementClassNameSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\ElementCssSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\ElementIdSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\ElementNameSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\ElementTagNameSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\LinkTextSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\PartialLinkTextSelectorStrategy;
use Zolli\WebDriver\Selector\Strategy\XpathSelectorStrategy;

class SelectorFactory
{

    public static function className($selector)
    {
        return (new ElementClassNameSelectorStrategy())->setSelector($selector);
    }

    public static function cssSelector($selector)
    {
        return (new ElementCssSelectorStrategy())->setSelector($selector);
    }

    public static function id($selector)
    {
        return (new ElementIdSelectorStrategy())->setSelector($selector);
    }

    public static function name($selector)
    {
        return (new ElementNameSelectorStrategy())->setSelector($selector);
    }

    public static function tagName($selector)
    {
        return (new ElementTagNameSelectorStrategy())->setSelector($selector);
    }

    public static function linkText($selector)
    {
        return (new LinkTextSelectorStrategy())->setSelector($selector);
    }

    public static function partialLinkText($selector)
    {
        return (new PartialLinkTextSelectorStrategy())->setSelector($selector);
    }

    public static function xpath($selector)
    {
        return (new XpathSelectorStrategy())->setSelector($selector);
    }

}