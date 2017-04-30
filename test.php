<?php

include './vendor/autoload.php';

$capability = \Zolli\WebDriver\Capability\DesiredCapability::chrome();
$executor = new \Zolli\WebDriver\Http\Guzzle\GuzzleHttpCommandExecutor('http://localhost:4444/wd/hub');
$commandFactory = new \Zolli\WebDriver\Http\Command\HttpCommandFactory();

$driver = new \Zolli\WebDriver\Remote\RemoteDriver($executor, $commandFactory);
$session = $driver->createSession($capability);
$window = $session->getWindow();
$window->setSize(1920, 1080);
$window->setPosition(0, 0);

$session->navigateTo('http://www.logout.hu');
$cookies = $session->getAllCookie();
$coll = $cookies->get('__utma');
$coll->setValue('tesert value tester tester tester');
var_dump($coll->store());

var_dump($coll->getValue());

$cc = $session->createCookie();

$cc->setName('tester')->setValue('teser value');
var_dump($cc->store());

$session->destroy();

