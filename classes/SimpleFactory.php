<?php

class SimpleFactory
{
    public $type;
    public $employees;

    public function createDesigners(array $employeeData): array
    {
        $a = [];
        foreach ($employeeData['Designer'] as $name => $value) {
            $a[] = new Designer(substr(md5($name), -5), $name, $value[0]);
        }
        return $a;
    }

    public function createSeller(array $employeeData): array
    {
        $a = [];
        foreach ($employeeData['Seller'] as $name => $value) {
            $a[] = new Seller(substr(md5($name), -5), $name, $value[0], $value[1]);
        }
        return $a;
    }

    public function createFreelance(array $employeeData): array
    {
        $a = [];
        foreach ($employeeData['Freelance'] as $name => $value) {
            $a[] = new Freelance(substr(md5($name), -5), $name, $value[0]);
        }
        return $a;
    }
}
