<?php

require 'Logistic/Logistic.php';
require 'Logistic/RoadLogistic.php';
require 'Logistic/ShipLogistic.php';

require 'Transport/Transport.php';
require 'Transport/Car.php';
require 'Transport/Ship.php';


require 'CostCalculation/CostCalculation.php';
require 'CostCalculation/RoadCalculation.php';
require 'CostCalculation/ShipCalculation.php';

function test(Logistic $logistic)
{
    $logistic->startDelivery();
}

test(new RoadLogistic());
echo "-----------".PHP_EOL;
test(new ShipLogistic());
