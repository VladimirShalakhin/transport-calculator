<?php

namespace TransportCalc\transport\Truck;

use TransportCalc\transport\PricePerUnit;
use TransportCalc\Cargo;
use TransportCalc\transport\TransportCalculationResult;

class TrailerTruck extends BaseTruck
{
    use PricePerUnit;

    public function __construct(
        public readonly int $weightLimit = 20000,
        public readonly int $distanceLimit = 3000,
        public readonly array $weightTariff = [
            0 => 5,
            500 => 3
        ],
        public readonly array $distanceTariff = [
            0 => 20,
            500 => 15
        ]
    ) {}
}