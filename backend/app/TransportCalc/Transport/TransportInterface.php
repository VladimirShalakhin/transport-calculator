<?php

namespace TransportCalc\transport;

use TransportCalc\Cargo;

interface TransportInterface
{
    public function canDelivery(Cargo $cargo):bool;
    public function calculate(Cargo $cargo): TransportCalculationResult;
}