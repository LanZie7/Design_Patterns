<?php


class ShipLogistic extends Logistic
{

    protected function createTransport(): Transport
    {
        echo "Доставка по воде";
        return new Ship();
    }

    protected function createCalculation(): CostCalculation
    {
        return new ShipCalculation();
    }

}