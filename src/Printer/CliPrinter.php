<?php

namespace Ottonova\VacationCalculator\Printer;

use Ottonova\VacationCalculator\Employee\Collection;
use Ottonova\VacationCalculator\Employee\EmployeeInterface;

/**
 * Class CliPrinter
 * @package Ottonova\VacationCalculator\Printer
 */
class CliPrinter implements PrinterInterface
{
    /**
     * @var \DateTimeImmutable
     */
    private $year;

    /**
     * @var Collection
     */
    private $employeesCollection;

    /**
     * CliPrinter constructor.
     * @param \DateTimeImmutable $year
     * @param Collection $employeesCollection
     */
    public function __construct(\DateTimeImmutable $year, Collection $employeesCollection)
    {
        $this->year = $year;
        $this->employeesCollection = $employeesCollection;
    }

    /**
     * @return mixed|string
     */
    public function print()
    {
        $output = "+ Vacation days for ". $this->year->format('Y') ." \n";
        /** @var EmployeeInterface $employee */
        foreach ($this->employeesCollection->employees as $employee) {
            $output .= "\n Name: ". $employee->getName() . ', Due days: ' . $employee->getVacationDays();
        }
        return $output;
    }
}
