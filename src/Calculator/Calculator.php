<?php

namespace Ottonova\VacationCalculator\Calculator;

use Ottonova\VacationCalculator\Calculator\Rule\RuleInterface;
use Ottonova\VacationCalculator\Employee\Collection;
use Ottonova\VacationCalculator\Employee\EmployeeInterface;

/**
 * Class Calculator
 * @package Ottonova\VacationCalculator\Calculator
 */
class Calculator
{
    /**
     * @var Collection
     */
    private $employeeCollection;

    /**
     * @var \DateTimeImmutable
     */
    private $interestYear;

    /**
     * @var RuleInterface[]
     */
    private $rules;

    /**
     * Calculator constructor.
     * @param Collection $employeeCollection
     * @param \DateTimeImmutable $interestYear
     */
    public function __construct(Collection $employeeCollection, \DateTimeImmutable $interestYear)
    {
        $this->employeeCollection = $employeeCollection;
        $this->interestYear = $interestYear;
    }

    /**
     * @return Collection
     */
    public function calculate()
    {
        $employees = $this->employeeCollection->employees;

        if (is_array($employees)) {
            /** @var EmployeeInterface $employee */
            foreach ($employees as $employee) {
                $employee->setVacationDays($this->applyRules($employee));
            }
        }

        return $this->employeeCollection;
    }

    /**
     * @param RuleInterface $rule
     */
    public function addRule(RuleInterface $rule)
    {
        $this->rules[] = $rule;
    }

    /**
     * @param EmployeeInterface $employee
     * @return int
     */
    public function applyRules(EmployeeInterface $employee): int
    {
        $vacationDays = 0;
        if (!empty($this->rules) && $employee->getContract()->isValidForYear($this->interestYear)) {
            foreach ($this->rules as $rule) {
                $vacationDays += $rule->apply($employee, $this->interestYear);
            }
        }

        return $vacationDays;
    }
}
