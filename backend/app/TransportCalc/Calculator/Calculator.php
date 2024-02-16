<?php
namespace TransportCalc\calculator;

use Exception;
use TransportCalc\Cargo;
use TransportCalc\transport\TransportInterface;

class Calculator {
    public function __construct(
        public array $availableTransports = []
    ) {}

    /**
     * @throws Exception
     */
    public function calculate(Cargo $cargo): CalculationResult
    {
        $availableOptions = [];
        foreach ($this->availableTransports as $transportClass) {
            $transport = new $transportClass;
            if ($transport instanceof TransportInterface) {
                if ($transport->canDelivery($cargo)) {
                    $deliveryInfo = $transport->calculate($cargo);
                    $availableOptions[] = $deliveryInfo;
                }
            } else {
                throw new InvalidTransportInstanceException("Передан класс не обладающий нужным интерфейсом");
            }
        }
        $options = $this->AscendingSort($availableOptions);
        $optimalDeliveryTransport = $this->getOptimal($options);
        return new CalculationResult($optimalDeliveryTransport, $options);
    }

    private function AscendingSort(array $prices): array
    {
        uasort($prices, fn($a, $b) => $a->priceTotal <=> $b->priceTotal);
        return $prices;
    }

    private function getOptimal(array $prices): array
    {
        $result = [];
        array_push($result, $prices[0]);

        foreach ($prices as $price) {
            if ($price->priceTotal == $result[0]->priceTotal) {
                array_push($result, $price);
            }
            if ($price->priceTotal < $result[0]->priceTotal) {
                unset($result);
                $result = [];
                array_push($result, $price);
            }
        }
        return $result;
    }
}