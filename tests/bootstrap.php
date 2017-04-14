<?php

$rootDir = realpath(__DIR__  . DIRECTORY_SEPARATOR . '..');
$autoloadFile = $rootDir . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

if (!is_file($autoloadFile)) {
    echo 'You need to install dependencies with composer first!';
    exit(255);
}

include_once $autoloadFile;
