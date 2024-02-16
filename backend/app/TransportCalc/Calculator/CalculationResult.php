<?php

namespace TransportCalc\calculator;

readonly class CalculationResult
{
    public function __construct(
        public array $optimalDeliveryMethod,
        public array $options
    ) {}
}