<?php

use RenduOpenSource\Startup\Startup;

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../src/Startup.php';

$startup = new Startup();

foreach($startup->getStartups() as $item){
    echo $item;
}