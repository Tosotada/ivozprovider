<?php

namespace Ivoz\Provider\Domain\Model\BillableCall;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface BillableCallInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @deprecated
     * Set callid
     *
     * @param string $callid
     *
     * @return self
     */
    public function setCallid($callid = null);

    /**
     * Get callid
     *
     * @return string
     */
    public function getCallid();

    /**
     * @deprecated
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return self
     */
    public function setStartTime($startTime = null);

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime();

    /**
     * @deprecated
     * Set duration
     *
     * @param float $duration
     *
     * @return self
     */
    public function setDuration($duration);

    /**
     * Get duration
     *
     * @return float
     */
    public function getDuration();

    /**
     * @deprecated
     * Set caller
     *
     * @param string $caller
     *
     * @return self
     */
    public function setCaller($caller = null);

    /**
     * Get caller
     *
     * @return string
     */
    public function getCaller();

    /**
     * @deprecated
     * Set callee
     *
     * @param string $callee
     *
     * @return self
     */
    public function setCallee($callee = null);

    /**
     * Get callee
     *
     * @return string
     */
    public function getCallee();

    /**
     * @deprecated
     * Set cost
     *
     * @param string $cost
     *
     * @return self
     */
    public function setCost($cost = null);

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost();

    /**
     * @deprecated
     * Set price
     *
     * @param string $price
     *
     * @return self
     */
    public function setPrice($price = null);

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice();

    /**
     * @deprecated
     * Set priceDetails
     *
     * @param array $priceDetails
     *
     * @return self
     */
    public function setPriceDetails($priceDetails = null);

    /**
     * Get priceDetails
     *
     * @return array
     */
    public function getPriceDetails();

    /**
     * @deprecated
     * Set carrierName
     *
     * @param string $carrierName
     *
     * @return self
     */
    public function setCarrierName($carrierName = null);

    /**
     * Get carrierName
     *
     * @return string
     */
    public function getCarrierName();

    /**
     * @deprecated
     * Set destinationName
     *
     * @param string $destinationName
     *
     * @return self
     */
    public function setDestinationName($destinationName = null);

    /**
     * Get destinationName
     *
     * @return string
     */
    public function getDestinationName();

    /**
     * @deprecated
     * Set ratingPlanName
     *
     * @param string $ratingPlanName
     *
     * @return self
     */
    public function setRatingPlanName($ratingPlanName = null);

    /**
     * Get ratingPlanName
     *
     * @return string
     */
    public function getRatingPlanName();

    /**
     * @deprecated
     * Set endpointType
     *
     * @param string $endpointType
     *
     * @return self
     */
    public function setEndpointType($endpointType = null);

    /**
     * Get endpointType
     *
     * @return string
     */
    public function getEndpointType();

    /**
     * @deprecated
     * Set endpointId
     *
     * @param integer $endpointId
     *
     * @return self
     */
    public function setEndpointId($endpointId = null);

    /**
     * Get endpointId
     *
     * @return integer
     */
    public function getEndpointId();

    /**
     * Set brand
     *
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand);

    /**
     * Get brand
     *
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();

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
     * Set carrier
     *
     * @param \Ivoz\Provider\Domain\Model\Carrier\CarrierInterface $carrier
     *
     * @return self
     */
    public function setCarrier(\Ivoz\Provider\Domain\Model\Carrier\CarrierInterface $carrier = null);

    /**
     * Get carrier
     *
     * @return \Ivoz\Provider\Domain\Model\Carrier\CarrierInterface
     */
    public function getCarrier();

    /**
     * Set destination
     *
     * @param \Ivoz\Provider\Domain\Model\Destination\DestinationInterface $destination
     *
     * @return self
     */
    public function setDestination(\Ivoz\Provider\Domain\Model\Destination\DestinationInterface $destination = null);

    /**
     * Get destination
     *
     * @return \Ivoz\Provider\Domain\Model\Destination\DestinationInterface
     */
    public function getDestination();

    /**
     * Set ratingPlanGroup
     *
     * @param \Ivoz\Provider\Domain\Model\RatingPlanGroup\RatingPlanGroupInterface $ratingPlanGroup
     *
     * @return self
     */
    public function setRatingPlanGroup(\Ivoz\Provider\Domain\Model\RatingPlanGroup\RatingPlanGroupInterface $ratingPlanGroup = null);

    /**
     * Get ratingPlanGroup
     *
     * @return \Ivoz\Provider\Domain\Model\RatingPlanGroup\RatingPlanGroupInterface
     */
    public function getRatingPlanGroup();

    /**
     * Set invoice
     *
     * @param \Ivoz\Provider\Domain\Model\Invoice\InvoiceInterface $invoice
     *
     * @return self
     */
    public function setInvoice(\Ivoz\Provider\Domain\Model\Invoice\InvoiceInterface $invoice = null);

    /**
     * Get invoice
     *
     * @return \Ivoz\Provider\Domain\Model\Invoice\InvoiceInterface
     */
    public function getInvoice();

    /**
     * Set trunksCdr
     *
     * @param \Ivoz\Kam\Domain\Model\TrunksCdr\TrunksCdrInterface $trunksCdr
     *
     * @return self
     */
    public function setTrunksCdr(\Ivoz\Kam\Domain\Model\TrunksCdr\TrunksCdrInterface $trunksCdr = null);

    /**
     * Get trunksCdr
     *
     * @return \Ivoz\Kam\Domain\Model\TrunksCdr\TrunksCdrInterface
     */
    public function getTrunksCdr();
}
