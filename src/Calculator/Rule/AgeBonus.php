<?php

namespace Ottonova\VacationCalculator\Calculator\Rule;

use Ottonova\VacationCalculator\Employee\EmployeeInterface;

/**
 * Class AgeBonus
 * @package Ottonova\VacationCalculator\Calculator\Rule
 */
class AgeBonus implements RuleInterface
{
    /**
     *  minimum age required to get age bonus
     */
    const DUE_BONUS_AGE = 30;

    /**
     * amount of year of bonus cycle
     */
    const DUE_BONUS_CYCLE = 5;

    /**
     * due days for each cycle
     */
    const BONUS_DAYS = 1;

    /**
     * @param EmployeeInterface $employee
     * @param \DateTimeImmutable $year
     * @return int
     */
    public function apply(EmployeeInterface $employee, \DateTimeImmutable $year): int
    {
        $dueDays = 0;
        $age = $employee->calculateAge($year);

        if (self::DUE_BONUS_AGE > $age) {
            return $dueDays;
        }

        $contract = $employee->getContract();
        $contractStartDate = $contract->getStartDate();
        $workingYears = $contractStartDate->diff($year)->y;
        $dueDays = (floor($workingYears / self::DUE_BONUS_CYCLE)) * self::BONUS_DAYS;

        return $dueDays;
    }
}
