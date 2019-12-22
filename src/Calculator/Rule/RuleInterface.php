<?php

namespace Ottonova\VacationCalculator\Calculator\Rule;

use Ottonova\VacationCalculator\Employee\EmployeeInterface;

/**
 * Interface RuleInterface
 * @package Ottonova\VacationCalculator\Calculator\Rule
 */
interface RuleInterface
{
    /**
     * @param EmployeeInterface $employee
     * @param \DateTimeImmutable $year
     * @return int
     */
    public function apply(EmployeeInterface $employee, \DateTimeImmutable $year): int;
}
