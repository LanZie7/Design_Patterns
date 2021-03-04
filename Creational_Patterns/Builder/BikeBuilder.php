<?php


class BikeBuilder
{
    protected Wheel $wheel;
    protected Seat $seat;
    protected Frame $frame;

    public function build() : Bike {
        return new Bike($this);
    }

    /**
     * @return Wheel
     */
    public function getWheel(): Wheel
    {
        return $this->wheel;
    }

    /**
     * @param Wheel $wheel
     */
    public function setWheel(Wheel $wheel): void
    {
        $this->wheel = $wheel;
    }

    /**
     * @return Seat
     */
    public function getSeat(): Seat
    {
        return $this->seat;
    }

    /**
     * @param Seat $seat
     */
    public function setSeat(Seat $seat): void
    {
        $this->seat = $seat;
    }

    /**
     * @return Frame
     */
    public function getFrame(): Frame
    {
        return $this->frame;
    }

    /**
     * @param Frame $frame
     */
    public function setFrame(Frame $frame): void
    {
        $this->frame = $frame;
    }


}