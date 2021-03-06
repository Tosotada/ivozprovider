<?php

namespace Ivoz\Provider\Domain\Model\Schedule;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface ScheduleInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    public function checkIsOnTimeRange($dayOfTheWeek, \DateTime $time, \DateTimeZone $timeZone);

    public function isOnSchedule(\DateTime $time);

    /**
     * @deprecated
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * @deprecated
     * Set timeIn
     *
     * @param \DateTime $timeIn
     *
     * @return self
     */
    public function setTimeIn($timeIn);

    /**
     * Get timeIn
     *
     * @return \DateTime
     */
    public function getTimeIn();

    /**
     * @deprecated
     * Set timeout
     *
     * @param \DateTime $timeout
     *
     * @return self
     */
    public function setTimeout($timeout);

    /**
     * Get timeout
     *
     * @return \DateTime
     */
    public function getTimeout();

    /**
     * @deprecated
     * Set monday
     *
     * @param boolean $monday
     *
     * @return self
     */
    public function setMonday($monday = null);

    /**
     * Get monday
     *
     * @return boolean
     */
    public function getMonday();

    /**
     * @deprecated
     * Set tuesday
     *
     * @param boolean $tuesday
     *
     * @return self
     */
    public function setTuesday($tuesday = null);

    /**
     * Get tuesday
     *
     * @return boolean
     */
    public function getTuesday();

    /**
     * @deprecated
     * Set wednesday
     *
     * @param boolean $wednesday
     *
     * @return self
     */
    public function setWednesday($wednesday = null);

    /**
     * Get wednesday
     *
     * @return boolean
     */
    public function getWednesday();

    /**
     * @deprecated
     * Set thursday
     *
     * @param boolean $thursday
     *
     * @return self
     */
    public function setThursday($thursday = null);

    /**
     * Get thursday
     *
     * @return boolean
     */
    public function getThursday();

    /**
     * @deprecated
     * Set friday
     *
     * @param boolean $friday
     *
     * @return self
     */
    public function setFriday($friday = null);

    /**
     * Get friday
     *
     * @return boolean
     */
    public function getFriday();

    /**
     * @deprecated
     * Set saturday
     *
     * @param boolean $saturday
     *
     * @return self
     */
    public function setSaturday($saturday = null);

    /**
     * Get saturday
     *
     * @return boolean
     */
    public function getSaturday();

    /**
     * @deprecated
     * Set sunday
     *
     * @param boolean $sunday
     *
     * @return self
     */
    public function setSunday($sunday = null);

    /**
     * Get sunday
     *
     * @return boolean
     */
    public function getSunday();

    /**
     * Set company
     *
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyInterface $company);

    /**
     * Get company
     *
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();
}
