<?php

namespace TransportCalc\transport\Ship;

use TransportCalc\Cargo;
use TransportCalc\transport\ClassNameGetter;
use TransportCalc\transport\TransportCalculationResult;
use TransportCalc\transport\TransportInterface;

readonly class SeaContainer implements TransportInterface {
    use ClassNameGetter;
	public function __construct(
        public int  $weightLimit = 25000,
        public ?int $distanceLimit = null,
        public ?int $pricePerKm = null,
        public ?int $pricePerKg = null,
        public int $pricePerContainer = 80000
    ) {}

    public function canDelivery(Cargo $cargo): bool
    {
        return ($this->weightLimit >= $cargo->weight);
    }

    public function calculate(Cargo $cargo): TransportCalculationResult
    {
        return new TransportCalculationResult($this->getNameOfClass(), $this->pricePerKg, $this->pricePerKm, $this->pricePerContainer);
    }
}