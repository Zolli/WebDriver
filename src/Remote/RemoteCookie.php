<?php

namespace Zolli\WebDriver\Remote;

use DateTime;
use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Exception\BadMethodCallException;
use Zolli\WebDriver\Exception\RuntimeException;
use Zolli\WebDriver\Http\Command\HttpCommandFactoryInterface;
use Zolli\WebDriver\Http\HttpCommandExecutorInterface;

/**
 * Class that represents a Cookie in the browser end
 *
 * @package Zolli\WebDriver
 * @subpackage Remote
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class RemoteCookie
{

    /**
     * @var HttpCommandExecutorInterface
     */
    private $executor;

    /**
     * @var HttpCommandFactoryInterface
     */
    private $commandFactory;

    /**
     * @var array
     */
    private $data;

    /**
     * @var bool
     */
    private $isNew = false;

    /**
     * RemoteCookie constructor.
     *
     * @param HttpCommandExecutorInterface $executor
     * @param HttpCommandFactoryInterface $commandFactory
     * @param array $cookieData
     */
    public function __construct(
        HttpCommandExecutorInterface $executor,
        HttpCommandFactoryInterface $commandFactory,
        array $cookieData = []
    )
    {
        $this->executor = $executor;
        $this->commandFactory = $commandFactory;
        $this->data = $cookieData;

        if (empty($cookieData)) {
            $this->isNew = true;
        }
    }

    /**
     * Returns the name of this cookie
     *
     * @return null|string
     */
    public function getName(): ?string
    {
        return (!isset($this->data['name'])) ? null : (string) $this->data['name'];
    }

    /**
     * Set the name of this cookie
     *
     * @param string $name
     *
     * @return \Zolli\WebDriver\Remote\RemoteCookie
     */
    public function setName(string $name): RemoteCookie
    {
        if (!$this->isNew) {
            throw new BadMethodCallException('Cannot modify the name of an already defined cookie!');
        }

        $this->data['name'] = $name;

        return $this;
    }

    /**
     * Returns the value of this cookie
     *
     * @return null|string
     */
    public function getValue(): ?string
    {
        return (!isset($this->data['value'])) ? null : (string) $this->data['value'];
    }

    /**
     * Set the value of this cookie
     *
     * @param mixed $value
     *
     * @return RemoteCookie
     */
    public function setValue($value): RemoteCookie
    {
        $this->data['value'] = $value;

        return $this;
    }

    /**
     * Returns the path of this cookie
     *
     * @return null|string
     */
    public function getPath(): ?string
    {
        return (!isset($this->data['path'])) ? null : (string) $this->data['path'];
    }

    /**
     * Set the path of the current cookie. If the path is not set is defaults to '/'
     *
     * @param string $path
     *
     * @return \Zolli\WebDriver\Remote\RemoteCookie
     */
    public function setPath(string $path): RemoteCookie
    {
        if (!$this->isNew) {
            throw new BadMethodCallException('Cannot modify the path of an already defined cookie!');
        }

        $this->data['path'] = $path;

        return $this;
    }

    /**
     * Returns the domain of this cookie
     *
     * @return null|string
     */
    public function getDomain(): ?string
    {
        return (!isset($this->data['domain'])) ? null : (string) $this->data['domain'];
    }

    /**
     * Sets the domain of the current cookie
     *
     * @param string $domain
     *
     * @return \Zolli\WebDriver\Remote\RemoteCookie
     */
    public function setDomain(string $domain): RemoteCookie
    {
        if (!$this->isNew) {
            throw new BadMethodCallException('Cannot modify the domain of an already defined cookie!');
        }

        $this->data['domain'] = $domain;

        return $this;
    }

    /**
     * Determines that current cookie is secure
     *
     * @return bool|null
     */
    public function isSecure(): ?bool
    {
        return (!isset($this->data['secure'])) ? null : (bool) $this->data['secure'];
    }

    /**
     * Sets the secure flag on the cookie
     *
     * @param bool $secure
     *
     * @return \Zolli\WebDriver\Remote\RemoteCookie
     */
    public function setSecure(bool $secure): RemoteCookie
    {
        if (!$this->isNew) {
            throw new BadMethodCallException('Cannot modify the secure property of an already defined cookie!');
        }

        $this->data['secure'] = $secure;

        return $this;
    }

    /**
     * Determines that cookie is only for HTTP
     *
     * @return bool|null
     */
    public function isHttpOnly(): ?bool
    {
        return (!isset($this->data['httpOnly'])) ? null : (bool) $this->data['httpOnly'];
    }

    /**
     * Sets cookie to HTTP only
     *
     * @param bool $httpOnly
     *
     * @return \Zolli\WebDriver\Remote\RemoteCookie
     */
    public function setHttpOnly(bool $httpOnly): RemoteCookie
    {
        if (!$this->isNew) {
            throw new BadMethodCallException('Cannot modify the httpOnly property of an already defined cookie!');
        }

        $this->data['httpOnly'] = $httpOnly;

        return $this;
    }

    /**
     * Return the expiry of the current cookie
     *
     * @return \DateTime
     */
    public function getExpiry(): DateTime
    {
        $timestamp = (!isset($this->data['expiry'])) ? 'now' : (string) $this->data['expiry'];

        return new DateTime($timestamp);
    }

    /**
     * Set the expiry of this cookie
     *
     * @param \DateTime $expiry
     *
     * @return RemoteCookie
     */
    public function setExpiry(DateTime $expiry): RemoteCookie
    {
        $this->data['expiry'] = $expiry->format('U');

        return $this;
    }

    /**
     * Store the current session detail in the browser
     */
    public function store(): void
    {
        $command = $this->commandFactory->createCommand(Commands::SET_COOKIE, [
            'cookie' => $this->data
        ]);

        $this->executor->execute($command);
        $this->isNew = false;
    }

    /**
     * Removes the cookie from the browser
     */
    public function remove() {
        if ($this->isNew === true) {
            throw new RuntimeException('This cookie not sent to the client, so you cannot remove it!');
        }

        $command = $this->commandFactory->createCommand(Commands::DELETE_NAMED_COOKIE, [], [
            'name' => $this->getName(),
        ]);

        $this->executor->execute($command);
    }

    /**
     * Determines that this cookie is already sent to browser
     *
     * @return bool
     */
    public function isStored()
    {
        return $this->isNew;
    }

}