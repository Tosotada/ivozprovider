<?php

namespace Ivoz\Ast\Domain\Model\Voicemail;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface VoicemailInterface extends LoggableEntityInterface
{
    /**
     * @return array
     */
    public function getChangeSet();

    /**
     * @deprecated
     * Set context
     *
     * @param string $context
     *
     * @return self
     */
    public function setContext($context);

    /**
     * Get context
     *
     * @return string
     */
    public function getContext();

    /**
     * @deprecated
     * Set mailbox
     *
     * @param string $mailbox
     *
     * @return self
     */
    public function setMailbox($mailbox);

    /**
     * Get mailbox
     *
     * @return string
     */
    public function getMailbox();

    /**
     * @deprecated
     * Set password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword($password = null);

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword();

    /**
     * @deprecated
     * Set fullname
     *
     * @param string $fullname
     *
     * @return self
     */
    public function setFullname($fullname = null);

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname();

    /**
     * @deprecated
     * Set alias
     *
     * @param string $alias
     *
     * @return self
     */
    public function setAlias($alias = null);

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias();

    /**
     * @deprecated
     * Set email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email = null);

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    /**
     * @deprecated
     * Set pager
     *
     * @param string $pager
     *
     * @return self
     */
    public function setPager($pager = null);

    /**
     * Get pager
     *
     * @return string
     */
    public function getPager();

    /**
     * @deprecated
     * Set attach
     *
     * @param string $attach
     *
     * @return self
     */
    public function setAttach($attach = null);

    /**
     * Get attach
     *
     * @return string
     */
    public function getAttach();

    /**
     * @deprecated
     * Set attachfmt
     *
     * @param string $attachfmt
     *
     * @return self
     */
    public function setAttachfmt($attachfmt = null);

    /**
     * Get attachfmt
     *
     * @return string
     */
    public function getAttachfmt();

    /**
     * @deprecated
     * Set serveremail
     *
     * @param string $serveremail
     *
     * @return self
     */
    public function setServeremail($serveremail = null);

    /**
     * Get serveremail
     *
     * @return string
     */
    public function getServeremail();

    /**
     * @deprecated
     * Set language
     *
     * @param string $language
     *
     * @return self
     */
    public function setLanguage($language = null);

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage();

    /**
     * @deprecated
     * Set tz
     *
     * @param string $tz
     *
     * @return self
     */
    public function setTz($tz = null);

    /**
     * Get tz
     *
     * @return string
     */
    public function getTz();

    /**
     * @deprecated
     * Set deleteVoicemail
     *
     * @param string $deleteVoicemail
     *
     * @return self
     */
    public function setDeleteVoicemail($deleteVoicemail = null);

    /**
     * Get deleteVoicemail
     *
     * @return string
     */
    public function getDeleteVoicemail();

    /**
     * @deprecated
     * Set saycid
     *
     * @param string $saycid
     *
     * @return self
     */
    public function setSaycid($saycid = null);

    /**
     * Get saycid
     *
     * @return string
     */
    public function getSaycid();

    /**
     * @deprecated
     * Set sendVoicemail
     *
     * @param string $sendVoicemail
     *
     * @return self
     */
    public function setSendVoicemail($sendVoicemail = null);

    /**
     * Get sendVoicemail
     *
     * @return string
     */
    public function getSendVoicemail();

    /**
     * @deprecated
     * Set review
     *
     * @param string $review
     *
     * @return self
     */
    public function setReview($review = null);

    /**
     * Get review
     *
     * @return string
     */
    public function getReview();

    /**
     * @deprecated
     * Set tempgreetwarn
     *
     * @param string $tempgreetwarn
     *
     * @return self
     */
    public function setTempgreetwarn($tempgreetwarn = null);

    /**
     * Get tempgreetwarn
     *
     * @return string
     */
    public function getTempgreetwarn();

    /**
     * @deprecated
     * Set operator
     *
     * @param string $operator
     *
     * @return self
     */
    public function setOperator($operator = null);

    /**
     * Get operator
     *
     * @return string
     */
    public function getOperator();

    /**
     * @deprecated
     * Set envelope
     *
     * @param string $envelope
     *
     * @return self
     */
    public function setEnvelope($envelope = null);

    /**
     * Get envelope
     *
     * @return string
     */
    public function getEnvelope();

    /**
     * @deprecated
     * Set sayduration
     *
     * @param integer $sayduration
     *
     * @return self
     */
    public function setSayduration($sayduration = null);

    /**
     * Get sayduration
     *
     * @return integer
     */
    public function getSayduration();

    /**
     * @deprecated
     * Set forcename
     *
     * @param string $forcename
     *
     * @return self
     */
    public function setForcename($forcename = null);

    /**
     * Get forcename
     *
     * @return string
     */
    public function getForcename();

    /**
     * @deprecated
     * Set forcegreetings
     *
     * @param string $forcegreetings
     *
     * @return self
     */
    public function setForcegreetings($forcegreetings = null);

    /**
     * Get forcegreetings
     *
     * @return string
     */
    public function getForcegreetings();

    /**
     * @deprecated
     * Set callback
     *
     * @param string $callback
     *
     * @return self
     */
    public function setCallback($callback = null);

    /**
     * Get callback
     *
     * @return string
     */
    public function getCallback();

    /**
     * @deprecated
     * Set dialout
     *
     * @param string $dialout
     *
     * @return self
     */
    public function setDialout($dialout = null);

    /**
     * Get dialout
     *
     * @return string
     */
    public function getDialout();

    /**
     * @deprecated
     * Set exitcontext
     *
     * @param string $exitcontext
     *
     * @return self
     */
    public function setExitcontext($exitcontext = null);

    /**
     * Get exitcontext
     *
     * @return string
     */
    public function getExitcontext();

    /**
     * @deprecated
     * Set maxmsg
     *
     * @param integer $maxmsg
     *
     * @return self
     */
    public function setMaxmsg($maxmsg = null);

    /**
     * Get maxmsg
     *
     * @return integer
     */
    public function getMaxmsg();

    /**
     * @deprecated
     * Set volgain
     *
     * @param string $volgain
     *
     * @return self
     */
    public function setVolgain($volgain = null);

    /**
     * Get volgain
     *
     * @return string
     */
    public function getVolgain();

    /**
     * @deprecated
     * Set imapuser
     *
     * @param string $imapuser
     *
     * @return self
     */
    public function setImapuser($imapuser = null);

    /**
     * Get imapuser
     *
     * @return string
     */
    public function getImapuser();

    /**
     * @deprecated
     * Set imappassword
     *
     * @param string $imappassword
     *
     * @return self
     */
    public function setImappassword($imappassword = null);

    /**
     * Get imappassword
     *
     * @return string
     */
    public function getImappassword();

    /**
     * @deprecated
     * Set imapserver
     *
     * @param string $imapserver
     *
     * @return self
     */
    public function setImapserver($imapserver = null);

    /**
     * Get imapserver
     *
     * @return string
     */
    public function getImapserver();

    /**
     * @deprecated
     * Set imapport
     *
     * @param string $imapport
     *
     * @return self
     */
    public function setImapport($imapport = null);

    /**
     * Get imapport
     *
     * @return string
     */
    public function getImapport();

    /**
     * @deprecated
     * Set imapflags
     *
     * @param string $imapflags
     *
     * @return self
     */
    public function setImapflags($imapflags = null);

    /**
     * Get imapflags
     *
     * @return string
     */
    public function getImapflags();

    /**
     * @deprecated
     * Set stamp
     *
     * @param \DateTime $stamp
     *
     * @return self
     */
    public function setStamp($stamp = null);

    /**
     * Get stamp
     *
     * @return \DateTime
     */
    public function getStamp();

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
}
