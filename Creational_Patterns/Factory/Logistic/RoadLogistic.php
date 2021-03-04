<?php


class RoadLogistic extends Logistic
{

    protected function createTransport(): Transport
    {
        echo "Доставка по дороге";
        return new Car();
    }

    protected function createCalculation(): CostCalculation
    {
        return new RoadCalculation();
    }
}