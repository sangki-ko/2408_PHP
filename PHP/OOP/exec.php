<?php

require_once("./FlyingSquirrel.php");
require_once("./Whale.php");
require_once("./GoldFish.php");

use PHP\OOP\FlyingSquirrel;
use PHP\OOP\Whale;
use PHP\OOP\GoldFish;

$whale = new Whale("고래", "바다");
echo $whale->printInfo();

$FlyingSquirrel = new FlyingSquirrel("\n다람쥐", "숲");
echo $FlyingSquirrel->printInfo();
echo $FlyingSquirrel->printPet();

$GoldFish = new GoldFish;
echo $GoldFish->printPet();
echo $GoldFish->swimming();