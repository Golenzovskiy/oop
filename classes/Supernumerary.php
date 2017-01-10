<?php

abstract class Supernumerary extends  Employee
{
    protected $hourlyRate;

    /**
     * Supernumerary constructor.
     * @param $id
     * @param $name
     * @param $hourlyRate
     */
    public function __construct($id, $name, $hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;
        $payment = $this->payment();
        parent::__construct($id, $name, $payment);
    }
}
