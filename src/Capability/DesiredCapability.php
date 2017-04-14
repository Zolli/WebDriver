<?php

namespace Zolli\WebDriver\Capability;

use Zolli\WebDriver\Exception\InvalidArgumentException;

/**
 * Collection of desired capabilities
 *
 * @package Zolli\WebDriver
 * @subpackage Capability
 */
class DesiredCapability
{

    /**
     * @var array
     */
    protected $capabilities;

    /**
     * DesiredCapability constructor
     *
     * @param array $capabilities
     */
    public function __construct(array $capabilities = [])
    {
        $this->capabilities = $capabilities;
    }

    /**
     * Determines that the current or created session has a specific capability
     *
     * @param string $capability The capability name. Use Capability Enum
     *
     * @return bool
     */
    public function has(string $capability): bool
    {
        return array_key_exists($capability, $this->capabilities);
    }

    /**
     * Adds a new desired capability
     *
     * @param string $capability The capability name. Use Capability Enum class
     * @param mixed $value The value of the given capability
     *
     * @return DesiredCapability
     */
    public function add(string $capability, $value): DesiredCapability
    {
        $this->capabilities[$capability] = $value;

        return $this;
    }

    /**
     * Converts assembled capabilities to JSON format
     *
     * @return string
     *
     * @throws InvalidArgumentException
     */
    public function toJson(): string
    {
        $json = json_encode($this->capabilities);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException(json_last_error_msg(), json_last_error());
        }

        return $json;
    }

}