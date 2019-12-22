<?php

namespace Ottonova\VacationCalculator\Calculator\Rule;

use Ottonova\VacationCalculator\Employee\EmployeeInterface;

/**
 * Class ContractVacationDays
 * @package Ottonova\VacationCalculator\Calculator\Rule
 */
class ContractVacationDays implements RuleInterface
{
    const VACATION_DAYS_PER_YEAR = 26;

    /**
     * @param EmployeeInterface $employee
     * @param \DateTimeImmutable $year
     * @return int
     */
    public function apply(EmployeeInterface $employee, \DateTimeImmutable $year): int
    {
        $vacationDaysPerYear = self::VACATION_DAYS_PER_YEAR;
        $contractStartDate = $employee->getContract()->getStartDate();

        if ($employee->getContract()->isSpecial()) {
            $vacationDaysPerYear = $employee->getContract()->getSpecialContractVacationDays();
        }

        if ($contractStartDate->format('Y') == $year->format('Y')) {
            return $this->calculateDiffMonthsVacation($employee, $year, $vacationDaysPerYear);
        }

        return $vacationDaysPerYear;
    }

    /**
     * @param EmployeeInterface $employee
     * @param \DateTimeImmutable $year
     * @param int $vacationDaysPerYear
     * @return int
     */
    private function calculateDiffMonthsVacation(
        EmployeeInterface $employee,
        \DateTimeImmutable $year,
        int $vacationDaysPerYear
    ): int {
        $contractStartDate = $employee->getContract()->getStartDate();

        $diff = $contractStartDate->diff($year);
        $diffMonths = round(($diff->d / 30) + $diff->m);
        return round($diffMonths * ($vacationDaysPerYear / 12));
    }
}
