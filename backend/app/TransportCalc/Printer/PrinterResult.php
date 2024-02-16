<?php

namespace TransportCalc\Printer;

readonly class PrinterResult
{
    public function __construct(
        public array $priceString
    ) {}
}