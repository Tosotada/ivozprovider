<?php

namespace Ivoz\Kam\Domain\Model\Rtpengine;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface RtpengineInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    public function setMediaRelaySet(\Ivoz\Provider\Domain\Model\MediaRelaySet\MediaRelaySetInterface $mediaRelaySet = null);

    /**
     * @deprecated
     * Set setid
     *
     * @param integer $setid
     *
     * @return self
     */
    public function setSetid($setid);

    /**
     * Get setid
     *
     * @return integer
     */
    public function getSetid();

    /**
     * @deprecated
     * Set url
     *
     * @param string $url
     *
     * @return self
     */
    public function setUrl($url);

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl();

    /**
     * @deprecated
     * Set weight
     *
     * @param integer $weight
     *
     * @return self
     */
    public function setWeight($weight);

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight();

    /**
     * @deprecated
     * Set disabled
     *
     * @param boolean $disabled
     *
     * @return self
     */
    public function setDisabled($disabled);

    /**
     * Get disabled
     *
     * @return boolean
     */
    public function getDisabled();

    /**
     * @deprecated
     * Set stamp
     *
     * @param \DateTime $stamp
     *
     * @return self
     */
    public function setStamp($stamp);

    /**
     * Get stamp
     *
     * @return \DateTime
     */
    public function getStamp();

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
     * Get mediaRelaySet
     *
     * @return \Ivoz\Provider\Domain\Model\MediaRelaySet\MediaRelaySetInterface
     */
    public function getMediaRelaySet();
}
