<?php

use Ottonova\VacationCalculator\Data\DataAttributeEnum;
use Ottonova\VacationCalculator\Employee\Factory;
use Ottonova\VacationCalculator\Employee\Collection;
use Ottonova\VacationCalculator\Calculator\Calculator;
use Ottonova\VacationCalculator\Calculator\Rule\AgeBonus;
use Ottonova\VacationCalculator\Calculator\Rule\ContractVacationDays;
use Ottonova\VacationCalculator\Printer\CliPrinter;

require_once('vendor/autoload.php');
require 'data.php';

if (0 >= (int) $argv[1]) {
    die('Invalid Year!');
}

$year = (new \DateTimeImmutable)->setDate($argv[1], 12, 31);
$employeeCollection = new Collection();

if (is_array($data)) {
    //@codingStandardsIgnoreStart
    foreach($data as $item) {
        $employee = Factory::makeEmployee(
            (string) $item[DataAttributeEnum::NAME],
            \DateTimeImmutable::createFromFormat(
                DataAttributeEnum::DATE_OF_BIRTH_FORMAT,
                $item[DataAttributeEnum::DATE_OF_BIRTH]
            ),
            \DateTimeImmutable::createFromFormat(
                DataAttributeEnum::CONTRACT_DATE_FORMAT,
                $item[DataAttributeEnum::CONTRACT_START_DATE]
            ),
            (int) $item[DataAttributeEnum::SPECIAL_CONTRACT]
        );

        $employeeCollection->add($employee);
    }
    //@codingStandardsIgnoreEnd

    $calculator = new Calculator($employeeCollection, $year);
    $calculator->addRule(new ContractVacationDays());
    $calculator->addRule(new AgeBonus());

    $employees = $calculator->calculate();

    $printer = new CliPrinter($year, $employees);
    echo $printer->print();
}
