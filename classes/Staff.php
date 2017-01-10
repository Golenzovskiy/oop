<?php

abstract class Staff extends Employee
{
    protected $salary;

    public function __construct($id, $name, $salary)
    {
        $this->salary = $salary;
        $payment = $this->payment();
        parent::__construct($id, $name, $payment);
    }
}
