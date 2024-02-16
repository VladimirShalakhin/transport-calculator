<?php

namespace TransportCalc\transport\Truck;

use TransportCalc\Cargo;
use TransportCalc\transport\TransportCalculationResult;
use TransportCalc\transport\TransportInterface;
use TransportCalc\transport\ClassNameGetter;

abstract class BaseTruck implements TransportInterface
{
    use ClassNameGetter;

    public readonly int $weightLimit;
    public readonly int $distanceLimit;

    public function canDelivery(Cargo $cargo): bool
    {
        return ($this->weightLimit >= $cargo->weight && $this->distanceLimit >= $cargo->distance);
    }

    public function calculate(Cargo $cargo): TransportCalculationResult
    {
        $totalPrice = ($this->pricePerKg * $cargo->weight + $this->pricePerKm * $cargo->distance);
        return new TransportCalculationResult($this->getNameOfClass(), $this->pricePerKg, $this->pricePerKm, $totalPrice);
    }

}