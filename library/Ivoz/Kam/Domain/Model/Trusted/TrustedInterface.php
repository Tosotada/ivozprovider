<?php

namespace Ivoz\Kam\Domain\Model\Trusted;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface TrustedInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    public function setSrcIp($srcIp = null);

    /**
     * Get srcIp
     *
     * @return string
     */
    public function getSrcIp();

    /**
     * @deprecated
     * Set proto
     *
     * @param string $proto
     *
     * @return self
     */
    public function setProto($proto = null);

    /**
     * Get proto
     *
     * @return string
     */
    public function getProto();

    /**
     * @deprecated
     * Set fromPattern
     *
     * @param string $fromPattern
     *
     * @return self
     */
    public function setFromPattern($fromPattern = null);

    /**
     * Get fromPattern
     *
     * @return string
     */
    public function getFromPattern();

    /**
     * @deprecated
     * Set ruriPattern
     *
     * @param string $ruriPattern
     *
     * @return self
     */
    public function setRuriPattern($ruriPattern = null);

    /**
     * Get ruriPattern
     *
     * @return string
     */
    public function getRuriPattern();

    /**
     * @deprecated
     * Set tag
     *
     * @param string $tag
     *
     * @return self
     */
    public function setTag($tag = null);

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag();

    /**
     * @deprecated
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * @deprecated
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority);

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();

    /**
     * Set company
     *
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyInterface $company = null);

    /**
     * Get company
     *
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();
}
