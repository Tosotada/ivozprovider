<?php

namespace Ivoz\Provider\Domain\Model\CallForwardSetting;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface CallForwardSettingInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * {@inheritDoc}
     *
     * @throws \Assert\AssertionFailedException
     */
    public function setNumberValue($numberValue = null);

    public function toArrayPortal();

    /**
     * Get the numberValue in E.164 format when routing to 'number'
     *
     * @return string
     */
    public function getNumberValueE164();

    /**
     * Alias for getTargetType
     *
     * @todo rename tagetType field to routeType
     */
    public function getRouteType();

    /**
     * @deprecated
     * Set callTypeFilter
     *
     * @param string $callTypeFilter
     *
     * @return self
     */
    public function setCallTypeFilter($callTypeFilter);

    /**
     * Get callTypeFilter
     *
     * @return string
     */
    public function getCallTypeFilter();

    /**
     * @deprecated
     * Set callForwardType
     *
     * @param string $callForwardType
     *
     * @return self
     */
    public function setCallForwardType($callForwardType);

    /**
     * Get callForwardType
     *
     * @return string
     */
    public function getCallForwardType();

    /**
     * @deprecated
     * Set targetType
     *
     * @param string $targetType
     *
     * @return self
     */
    public function setTargetType($targetType);

    /**
     * Get targetType
     *
     * @return string
     */
    public function getTargetType();

    /**
     * Get numberValue
     *
     * @return string
     */
    public function getNumberValue();

    /**
     * @deprecated
     * Set noAnswerTimeout
     *
     * @param integer $noAnswerTimeout
     *
     * @return self
     */
    public function setNoAnswerTimeout($noAnswerTimeout);

    /**
     * Get noAnswerTimeout
     *
     * @return integer
     */
    public function getNoAnswerTimeout();

    /**
     * @deprecated
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return self
     */
    public function setEnabled($enabled);

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled();

    /**
     * Set user
     *
     * @param \Ivoz\Provider\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    public function setUser(\Ivoz\Provider\Domain\Model\User\UserInterface $user = null);

    /**
     * Get user
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface
     */
    public function getUser();

    /**
     * Set extension
     *
     * @param \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return self
     */
    public function setExtension(\Ivoz\Provider\Domain\Model\Extension\ExtensionInterface $extension = null);

    /**
     * Get extension
     *
     * @return \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface
     */
    public function getExtension();

    /**
     * Set voiceMailUser
     *
     * @param \Ivoz\Provider\Domain\Model\User\UserInterface $voiceMailUser
     *
     * @return self
     */
    public function setVoiceMailUser(\Ivoz\Provider\Domain\Model\User\UserInterface $voiceMailUser = null);

    /**
     * Get voiceMailUser
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface
     */
    public function getVoiceMailUser();

    /**
     * Set numberCountry
     *
     * @param \Ivoz\Provider\Domain\Model\Country\CountryInterface $numberCountry
     *
     * @return self
     */
    public function setNumberCountry(\Ivoz\Provider\Domain\Model\Country\CountryInterface $numberCountry = null);

    /**
     * Get numberCountry
     *
     * @return \Ivoz\Provider\Domain\Model\Country\CountryInterface
     */
    public function getNumberCountry();

    /**
     * Set residentialDevice
     *
     * @param \Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface $residentialDevice
     *
     * @return self
     */
    public function setResidentialDevice(\Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface $residentialDevice = null);

    /**
     * Get residentialDevice
     *
     * @return \Ivoz\Provider\Domain\Model\ResidentialDevice\ResidentialDeviceInterface
     */
    public function getResidentialDevice();

    /**
     * @param string $prefix
     * @return null|string
     */
    public function getTarget(string $prefix = '');
}
