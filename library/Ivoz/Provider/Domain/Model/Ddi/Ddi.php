<?php

namespace Ivoz\Provider\Domain\Model\Ddi;

use Ivoz\Provider\Domain\Traits\RoutableTrait;
use Assert\Assertion;

/**
 * Ddi
 */
class Ddi extends DdiAbstract implements DdiInterface
{
    use DdiTrait;
    use RoutableTrait;

    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet()
    {
        return parent::getChangeSet();
    }

    /**
     * Get id
     * @codeCoverageIgnore
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Return string representation of this entity
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            "%s [ddi%d]",
            $this->getDdie164(),
            $this->getId()
        );
    }

    protected function sanitizeValues()
    {
        $country = $this->getCountry();

        $this->setDdie164(
            $country->getCountryCode()
            . $this->getDdi()
        );

        // If billInboundCalls is set, carrier must have externallyRated to 1
        if ($this->getBillInboundCalls()
            && !$this->getDdiProvider()->getExternallyRated()
        ) {
            throw new \DomainException(
                'Inbound Calls cannot be billed as PeeringContract is not externally rated',
                90000
            );
        }
    }

    /**
     * {@inheritDoc}
     */
    public function setDdi($ddi)
    {
        Assertion::regex($ddi, '/^[0-9]+$/');
        return parent::setDdi($ddi);
    }

    /**
     * @return string Domain
     */
    public function getDomain()
    {
        $company = $this->getCompany();
        if (!$company) {
            return null;
        }

        $brand = $company->getBrand();
        if (!$brand) {
            return null;
        }

        return $brand->getDomain();
    }

    public function getLanguageCode()
    {
        $language = $this->getLanguage();
        if (!$language) {
            $company = $this->getCompany();

            return $company->getLanguageCode();
        }

        return $language->getIden();
    }

    public function setRouteType($routeType = null)
    {
        parent::setRouteType($routeType);

        $nullableFields = array(
            'user'          => 'user',
            'ivr'           => 'ivr',
            'huntGroup'     => 'huntGroup',
            'fax'           => 'fax',
            'friend'        => 'friendValue',
            'conferenceRoom' => 'conferenceRoom',
            'queue'         => 'queue',
        );

        foreach ($nullableFields as $type => $fieldName) {
            if ($routeType == $type) {
                continue;
            }

            $setter = 'set' . ucfirst($fieldName);
            $this->{$setter}(null);
        }

        return $this;
    }

    public function getDdie164()
    {
        return
            $this->getCountry()->getCountryCode() .
            $this->getDdi();
    }
}
