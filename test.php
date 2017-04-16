<?php

include './vendor/autoload.php';

$capability = \Zolli\WebDriver\Capability\DesiredCapability::chrome();
$executor = new \Zolli\WebDriver\Http\Guzzle\GuzzleHttpCommandExecutor('http://192.168.1.180:25000/wd/hub');
$commandFactory = new \Zolli\WebDriver\Http\Command\HttpCommandFactory();

$driver = new \Zolli\WebDriver\Remote\RemoteDriver($executor, $commandFactory);
$session = $driver->createSession($capability);
$session->setTimeouts(100000);

$session->navigateTo('http://www.logout.hu');
$id = $session->findElement(\Zolli\WebDriver\Selector\SelectorFactory::cssSelector('#head'));
$id2 = $session->findElements(\Zolli\WebDriver\Selector\SelectorFactory::cssSelector('.megabox'));
