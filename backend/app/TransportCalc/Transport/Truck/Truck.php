<?php

namespace TransportCalc\transport\Truck;

class Truck extends BaseTruck
{
    public function __construct(
        public readonly int $weightLimit = 3000,
        public readonly int $distanceLimit = 5000,
        public readonly int $pricePerKm = 18,
        public readonly int $pricePerKg = 4,
    ) {}
}