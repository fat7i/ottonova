<?php

namespace Ottonova\VacationCalculator\Employee;

use Ottonova\VacationCalculator\Contract\Contract;

/**
 * Class Factory
 * @package Ottonova\VacationCalculator\Employee
 */
class Factory
{
    /**
     * @param string $name
     * @param \DateTimeImmutable $dateOfBirth
     * @param \DateTimeImmutable $contractStartDate
     * @param int $specialContractVacationDays
     * @return EmployeeInterface
     */
    public static function makeEmployee(
        string $name,
        \DateTimeImmutable $dateOfBirth,
        \DateTimeImmutable $contractStartDate,
        int $specialContractVacationDays
    ): EmployeeInterface {
        $contract = new Contract($contractStartDate, $specialContractVacationDays);

        $employee = new Employee($name, $dateOfBirth);
        $employee->setContract($contract);

        return $employee;
    }
}
