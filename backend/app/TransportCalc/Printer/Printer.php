<?php

namespace TransportCalc\Printer;

use TransportCalc\calculator\CalculationResult;
use TransportCalc\Cargo;

class Printer
{
    public function calculationResultToString(CalculationResult $calculationResults, Cargo $cargo): PrinterResult
    {
        $resultString = [];
        foreach ($calculationResults->options as $calculationResult) {
            if ($calculationResult->name == 'SeaContainer') {
                $string = sprintf('цена за 1 контейнер = %d руб',$calculationResult->priceTotal);
            } else {
                $string = sprintf('%d руб. * %d км. + %d руб. * %d кг. = %d руб.', $calculationResult->pricePerKm, $cargo->distance, $calculationResult->pricePerKg, $cargo->weight, $calculationResult->priceTotal);
            }
            array_push($resultString, $string);
        }
        return new PrinterResult($resultString);
    }
}