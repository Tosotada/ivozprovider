<?php

namespace Ivoz\Provider\Domain\Model\RetailAccount;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;
use Doctrine\Common\Collections\Collection;

interface RetailAccountInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * {@inheritDoc}
     */
    public function setName($name);

    /**
     * {@inheritDoc}
     */
    public function setIp($ip = null);

    /**
     * {@inheritDoc}
     */
    public function setPassword($password = null);

    public function setPort($port = null);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * @deprecated
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * @deprecated
     * Set transport
     *
     * @param string $transport
     *
     * @return self
     */
    public function setTransport($transport);

    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport();

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();

    /**
     * Get port
     *
     * @return integer
     */
    public function getPort();

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword();

    /**
     * @deprecated
     * Set fromDomain
     *
     * @param string $fromDomain
     *
     * @return self
     */
    public function setFromDomain($fromDomain = null);

    /**
     * Get fromDomain
     *
     * @return string
     */
    public function getFromDomain();

    /**
     * @deprecated
     * Set directConnectivity
     *
     * @param string $directConnectivity
     *
     * @return self
     */
    public function setDirectConnectivity($directConnectivity);

    /**
     * Get directConnectivity
     *
     * @return string
     */
    public function getDirectConnectivity();

    /**
     * @deprecated
     * Set ddiIn
     *
     * @param string $ddiIn
     *
     * @return self
     */
    public function setDdiIn($ddiIn);

    /**
     * Get ddiIn
     *
     * @return string
     */
    public function getDdiIn();

    /**
     * Set brand
     *
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand = null);

    /**
     * Get brand
     *
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();

    /**
     * Set domain
     *
     * @param \Ivoz\Provider\Domain\Model\Domain\DomainInterface $domain
     *
     * @return self
     */
    public function setDomain(\Ivoz\Provider\Domain\Model\Domain\DomainInterface $domain = null);

    /**
     * Get domain
     *
     * @return \Ivoz\Provider\Domain\Model\Domain\DomainInterface
     */
    public function getDomain();

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

    /**
     * Set transformationRuleSet
     *
     * @param \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetInterface $transformationRuleSet
     *
     * @return self
     */
    public function setTransformationRuleSet(\Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetInterface $transformationRuleSet = null);

    /**
     * Get transformationRuleSet
     *
     * @return \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetInterface
     */
    public function getTransformationRuleSet();

    /**
     * Set outgoingDdi
     *
     * @param \Ivoz\Provider\Domain\Model\Ddi\DdiInterface $outgoingDdi
     *
     * @return self
     */
    public function setOutgoingDdi(\Ivoz\Provider\Domain\Model\Ddi\DdiInterface $outgoingDdi = null);

    /**
     * Get outgoingDdi
     *
     * @return \Ivoz\Provider\Domain\Model\Ddi\DdiInterface
     */
    public function getOutgoingDdi();

    /**
     * Add ddi
     *
     * @param \Ivoz\Provider\Domain\Model\Ddi\DdiInterface $ddi
     *
     * @return RetailAccountTrait
     */
    public function addDdi(\Ivoz\Provider\Domain\Model\Ddi\DdiInterface $ddi);

    /**
     * Remove ddi
     *
     * @param \Ivoz\Provider\Domain\Model\Ddi\DdiInterface $ddi
     */
    public function removeDdi(\Ivoz\Provider\Domain\Model\Ddi\DdiInterface $ddi);

    /**
     * Replace ddis
     *
     * @param \Ivoz\Provider\Domain\Model\Ddi\DdiInterface[] $ddis
     * @return self
     */
    public function replaceDdis(Collection $ddis);

    /**
     * Get ddis
     *
     * @return \Ivoz\Provider\Domain\Model\Ddi\DdiInterface[]
     */
    public function getDdis(\Doctrine\Common\Collections\Criteria $criteria = null);
}
