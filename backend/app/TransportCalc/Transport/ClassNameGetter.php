<?php

namespace TransportCalc\transport;

trait ClassNameGetter
{
    public function getNameOfClass(): string
    {
        $ex = explode("\\", static::class);
        return end($ex);
    }
}