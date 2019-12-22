<?php

namespace Ottonova\VacationCalculator\Contract;

/**
 * Interface ContractInterface
 * @package Ottonova\VacationCalculator\Contract
 */
interface ContractInterface
{
    /**
     * @return \DateTimeImmutable
     */
    public function getStartDate(): \DateTimeImmutable;

    /**
     * @return bool
     */
    public function isSpecial(): bool;

    /**
     * @return int
     */
    public function getSpecialContractVacationDays(): int;

    /**
     * @param \DateTimeImmutable $year
     * @return bool
     */
    public function isValidForYear(\DateTimeImmutable $year): bool;
}
