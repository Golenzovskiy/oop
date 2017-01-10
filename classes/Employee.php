<?php

abstract class Employee
{
    protected $id, $name, $payment;

    abstract public function payment();

    /**
     * Employee constructor.
     * @param $id
     * @param $name
     * @param $payment
     */
    public function __construct($id, $name, $payment)
    {
        $this->id = $id;
        $this->name = $name;
        $this->payment = $payment;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return htmlspecialchars($this->name);
    }

    public function getPayment()
    {
        return $this->payment;
    }
}
