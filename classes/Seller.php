<?php

class Seller extends Staff
{
    protected $plan;

    /**
     * Seller constructor.
     * @param $id
     * @param $name
     * @param $salary
     * @param $plan
     */
    public function __construct($id, $name, $salary, $plan)
    {
        $this->plan = $plan;
        parent::__construct($id, $name, $salary);
    }

    public function payment()
    {
        $percent = $this->plan * 1.2;
        return $this->salary + $percent;
    }
}
