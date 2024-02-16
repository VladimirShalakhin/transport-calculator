<?php

namespace TransportCalc\transport;

use TransportCalc\Cargo;

trait PricePerUnit
{
    private function getPricePerUnit(int $value, array $tariff): int
    {
        $prevKey = null;

        foreach ($tariff as $key => $val) {
            if ($value <= $key) {
                if ($prevKey === null) {
                    return $val;
                } else {
                    $diff1 = abs($key - $value);
                    $diff2 = abs($prevKey - $value);

                    if ($diff1 <= $diff2) {
                        return $val;
                    } else {
                        return $tariff[$prevKey];
                    }
                }
            }
            $prevKey = $key;
        }
        return end($tariff);
    }

    public function calculate(Cargo $cargo): TransportCalculationResult
    {
        $pricePerKg = $this->getPricePerUnit($cargo->weight, $this->weightTariff);
        $pricePerKm = $this->getPricePerUnit($cargo->distance, $this->distanceTariff);
        $totalPrice = ($pricePerKg * $cargo->weight + $pricePerKm * $cargo->distance);

        return new TransportCalculationResult($this->getNameOfClass(), $pricePerKg, $pricePerKm, $totalPrice);
    }

}