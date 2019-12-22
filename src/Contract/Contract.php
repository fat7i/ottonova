<?php

namespace Ottonova\VacationCalculator\Contract;

/**
 * Class Contract
 * @package Ottonova\VacationCalculator\Contract
 */
class Contract implements ContractInterface
{
    /**
     * @var \DateTimeImmutable
     */
    private $startDate;

    /**
     * @var int
     */
    private $specialContractVacationDays;

    /**
     * @var bool
     */
    private $isSpecial = false;

    /**
     * Contract constructor.
     * @param \DateTimeImmutable $startDate
     * @param int|null $specialContractVacationDays
     */
    public function __construct(\DateTimeImmutable $startDate, int $specialContractVacationDays = null)
    {
        //Todo @Ben throw exception if contact start date not equal 1 or 15
        $this->startDate = $startDate;

        if (0 < $specialContractVacationDays) {
            $this->specialContractVacationDays = $specialContractVacationDays;
            $this->isSpecial = true;
        }
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    /**
     * @return bool
     */
    public function isSpecial(): bool
    {
        return $this->isSpecial;
    }

    /**
     * @return int
     */
    public function getSpecialContractVacationDays(): int
    {
        return $this->specialContractVacationDays;
    }

    /**
     * @param \DateTimeImmutable $currentYear
     * @return bool
     */
    public function isValidForYear(\DateTimeImmutable $currentYear): bool
    {
        if ($this->getStartDate() <= $currentYear) {
            return true;
        }

        return false;
    }
}
