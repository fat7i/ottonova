<?php

namespace Ottonova\VacationCalculator\Employee;

use Ottonova\VacationCalculator\Contract\ContractInterface;

/**
 * Class Employee
 * @package Ottonova\VacationCalculator\Employee
 */
class Employee implements EmployeeInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTimeImmutable
     */
    private $dateOfBirth;

    /**
     * @var int
     */
    private $age;

    /**
     * @var ContractInterface
     */
    private $contract;

    /**
     * @var int
     */
    private $vacationDays = 0;

    /**
     * Employee constructor.
     * @param string $name
     * @param \DateTimeImmutable $dateOfBirth
     */
    public function __construct(string $name, \DateTimeImmutable $dateOfBirth)
    {
        $this->name = $name;
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateOfBirth(): \DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    /**
     * @return ContractInterface
     */
    public function getContract(): ContractInterface
    {
        return $this->contract;
    }

    /**
     * @param ContractInterface $contract
     */
    public function setContract(ContractInterface $contract)
    {
        $this->contract = $contract;
    }

    /**
     * @param int $vacationDays
     */
    public function setVacationDays(int $vacationDays)
    {
        $this->vacationDays = $vacationDays;
    }

    /**
     * @return int
     */
    public function getVacationDays(): int
    {
        return $this->vacationDays;
    }

    /**
     * @param \DateTimeImmutable $year
     * @return int
     */
    public function calculateAge(\DateTimeImmutable $year): int
    {
        $this->age = $this->dateOfBirth->diff($year)->y;
        return $this->age;
    }
}
