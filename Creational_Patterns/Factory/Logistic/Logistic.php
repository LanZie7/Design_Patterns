<?php


abstract class Logistic
{

    private Transport $transport;
    private CostCalculation $calc;

    public function __construct()
    {
        $this->transport = $this->createTransport();
        $this->calc = $this->createCalculation();
    }

    public function showCost() {
        echo $this->calc->calcCost();
    }


    public function startDelivery()
    {
        echo "Начинаем доставку!".PHP_EOL;
        echo $this->calc->calcCost();
        $this->transport->delivery();
        echo "Pазгружаем".PHP_EOL;
    }

    abstract protected function createTransport() : Transport;
    abstract protected function createCalculation() : CostCalculation;

}