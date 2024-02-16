<?php

namespace TransportCalc\transport;

readonly class TransportCalculationResult
{
    public function __construct(
        public string $name,
        public ?int    $pricePerKg,
        public ?int    $pricePerKm,
        public int    $priceTotal
    ) {}
}