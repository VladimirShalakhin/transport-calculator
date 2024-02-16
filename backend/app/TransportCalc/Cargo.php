<?php

namespace TransportCalc;

readonly class Cargo
{
    public function __construct(
        public readonly int $weight,
        public readonly int $distance
    ) {}
}