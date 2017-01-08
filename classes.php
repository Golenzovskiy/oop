<?php

abstract class Employee
{
    protected $id;        // Id сотрудника
    protected $name;      // Имя сотрудника
    protected $payment;   // Среднемесячная выплата

    abstract protected function payment();

    /**
     * Employee constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->payment = (int) $this->payment();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPayment(): int
    {
        return $this->payment;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return htmlspecialchars($this->name);
    }
}

class Designer extends Employee
{
    protected $salary; // Оклад сотрдуника

    /**
     * Designer constructor.
     * @param $id
     * @param $name
     * @param $salary
     */
    public function __construct($id, $name, $salary)
    {
        $this->salary = $salary;
        parent::__construct($id, $name);
    }

    protected function payment()
    {
        return $this->salary;
    }
}

class Seller extends Designer
{
    protected $plan; // Сотрудник продал на сумму

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

    protected function payment()
    {
        $percent = $this->plan * 1.2;
        return $this->salary + $percent;
    }
}

class Supernumerary extends  Employee
{
    protected $hourlyRate; // часовая ставка

    /**
     * Supernumerary constructor.
     * @param $id
     * @param $name
     * @param $hourlyRate
     */
    public function __construct($id, $name, $hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;
        parent::__construct($id, $name);
    }

    protected function payment()
    {
        return 20.8 * 8 * $this->hourlyRate;
    }
}

class EmployeeCollection {
    protected $employees;

    /**
     * EmployeeCollection constructor.
     * @param array $employees
     */
    public function __construct(array $employees)
    {
        $this->employees = $employees;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function sortByTwoFields($propertyOne, $propertyTwo)
    {
        usort($this->employees, function($userOne, $userTwo) use ($propertyOne, $propertyTwo) {
            return $userTwo->$propertyOne() <=> $userOne->$propertyOne() ?:
                $userOne->$propertyTwo() <=> $userTwo->$propertyTwo();
        });
    }
}

$id = 1;
foreach ($employeeData as $position => $arrEmployees) {
    if ($position == 'Designer') {
        foreach ($arrEmployees as $name => $value) {
            $employees[] = new $position($id++, $name, $value[0]);
        }
    } elseif ($position == 'Seller') {
        foreach ($arrEmployees as $name => $value) {
            $employees[] = new $position($id++, $name, $value[0], $value[1]);
        }
    } elseif ($position == 'Supernumerary') {
        foreach ($arrEmployees as $name => $value) {
            $employees[] = new $position($id++, $name, $value[0]);
        }

    }
}

$collection = new EmployeeCollection($employees);
$collection->sortByTwoFields('getPayment', 'getName');
