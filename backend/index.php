<?php

use TransportCalc\calculator\Calculator;
use TransportCalc\calculator\InvalidTransportInstanceException;
use TransportCalc\Cargo;
use TransportCalc\transport\Plane\Plane;
use TransportCalc\transport\Ship\SeaContainer;
use TransportCalc\transport\Truck\TrailerTruck;
use TransportCalc\transport\Truck\Truck;
use TransportCalc\Printer\Printer;

require './app/bootstrap.php';
$cargo = new Cargo(3000, 500);

$availableTransports = [
    Truck::class,
    TrailerTruck::class,
    Plane::class,
    SeaContainer::class
];

$calculator = new Calculator();
$printer = new Printer();
$calculator->availableTransports = $availableTransports;
$result = [];
try {
    $result = $calculator->calculate($cargo);
} catch (InvalidTransportInstanceException $e) {
    echo $e->getMessage();
}
$resultPrinter = $printer->calculationResultToString($result, $cargo);
return '';
