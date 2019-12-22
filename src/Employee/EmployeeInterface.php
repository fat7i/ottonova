<?php

namespace Ottonova\VacationCalculator\Employee;

use Ottonova\VacationCalculator\Contract\ContractInterface;

/**
 * Interface EmployeeInterface
 * @package Ottonova\VacationCalculator\Employee
 */
interface EmployeeInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return \DateTimeImmutable
     */
    public function getDateOfBirth(): \DateTimeImmutable;

    /**
     * @param \DateTimeImmutable $year
     * @return int
     */
    public function calculateAge(\DateTimeImmutable $year): int;

    /**
     * @return ContractInterface
     */
    public function getContract(): ContractInterface;

    /**
     * @return int
     */
    public function getVacationDays(): int;
}
