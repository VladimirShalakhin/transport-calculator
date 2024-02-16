<?php

namespace TransportCalc\transport\Plane;

use TransportCalc\Cargo;
use TransportCalc\transport\ClassNameGetter;
use TransportCalc\transport\PricePerUnit;
use TransportCalc\transport\TransportCalculationResult;
use TransportCalc\transport\TransportInterface;

class Plane implements TransportInterface
{
    use PricePerUnit;
    use ClassNameGetter;

    public function __construct(
        public readonly array $weightLimit = [3000, 6000],
        public readonly int $distanceLimit = 5000,
        public readonly array $weightTariff = [
            0 => 5,
            1000 => 3
        ],
        public readonly array $distanceTariff = [
            0 => 50,
            2000 => 10
        ]
    ) {}

    public function canDelivery(Cargo $cargo): bool
    {
        return (($this->weightLimit[0] >= $cargo->weight && $this->distanceLimit >= $cargo->distance) || ($this->weightLimit[1] >= $cargo->weight && $this->distanceLimit >= $cargo->distance));
    }
}