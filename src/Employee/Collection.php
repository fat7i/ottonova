<?php

namespace Ottonova\VacationCalculator\Employee;

/**
 * Class Collection
 * @package Ottonova\VacationCalculator\Employee
 */
class Collection
{
    /**
     * @var
     */
    public $employees;

    /**
     * @param EmployeeInterface $employee
     */
    public function add(EmployeeInterface $employee)
    {
        $this->employees[] = $employee;
    }
}
