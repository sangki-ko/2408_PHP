<?php

require_once("./FlyingSquirrel.php");
require_once("./Whale.php");

use PHP\OOP\FlyingSquirrel;
use PHP\OOP\Whale;

$whale = new Whale("고래", "바다");

echo $whale->printInfo();

$FlyingSquirrel = new FlyingSquirrel("\n다람쥐", "숲");

echo $FlyingSquirrel->printInfo();