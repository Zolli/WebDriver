[![Build Status](https://travis-ci.org/Zolli/WebDriver.svg?branch=master)](https://travis-ci.org/Zolli/WebDriver)
[![Coverage Status](https://coveralls.io/repos/github/Zolli/WebDriver/badge.svg?branch=master)](https://coveralls.io/github/Zolli/WebDriver?branch=master)

# Zolli\WebDriver

## A Selenium JsonWire Protocol implementation

### installation

```bash
$ composer require zolli/webdriver
```

### Documentation

[Documentation found inside this repository](https://github.com/Zolli/WebDriver/blob/master/docs/Index.md)

### Getting Started

```php
include './vendor/autoload.php';

// Create required support classes
$capability = \Zolli\WebDriver\Capability\DesiredCapability::chrome();
$executor = new \Zolli\WebDriver\Http\Guzzle\GuzzleHttpCommandExecutor('http://localhost:4444/wd/hub');
$commandFactory = new \Zolli\WebDriver\Http\Command\HttpCommandFactory();

// Instantiate the driver
$driver = new \Zolli\WebDriver\Remote\RemoteDriver($executor, $commandFactory);

// Create a session
$session = $driver->createSession($capability);

// Use session to issue commands to the server
$session->navigateTo('https://google.com');
```

### Contribution

Feel free to create issues and pull requests, but don't forget to comply with PSR-2.

### License

This project licensed under Apache License 2.0 

![Apache Software Foundation Logo](http://i.imgur.com/luWUdti.png)
