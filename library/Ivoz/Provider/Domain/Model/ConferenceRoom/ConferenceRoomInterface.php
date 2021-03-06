<?php

namespace Ivoz\Provider\Domain\Model\ConferenceRoom;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface ConferenceRoomInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

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
     * Set pinProtected
     *
     * @param boolean $pinProtected
     *
     * @return self
     */
    public function setPinProtected($pinProtected);

    /**
     * Get pinProtected
     *
     * @return boolean
     */
    public function getPinProtected();

    /**
     * @deprecated
     * Set pinCode
     *
     * @param string $pinCode
     *
     * @return self
     */
    public function setPinCode($pinCode = null);

    /**
     * Get pinCode
     *
     * @return string
     */
    public function getPinCode();

    /**
     * @deprecated
     * Set maxMembers
     *
     * @param integer $maxMembers
     *
     * @return self
     */
    public function setMaxMembers($maxMembers);

    /**
     * Get maxMembers
     *
     * @return integer
     */
    public function getMaxMembers();

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
