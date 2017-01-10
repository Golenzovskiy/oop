<?php

class EmployeeCollection
{
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
