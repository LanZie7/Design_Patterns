<?php


class Bike
{
	protected Wheel $wheel;
	protected Seat $seat;
	protected Frame $frame;

    public function __construct(BikeBuilder $bikeBuilder)
    {
        $this->wheel = $bikeBuilder->getWheel();
        $this->seat = $bikeBuilder->getSeat();
        $this->frame = $bikeBuilder->getFrame();
    }

}