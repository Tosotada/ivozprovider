<?php

namespace Agi\Action;
use \IvozProvider\Model\Features;

/**
 * @class ExternalRetailCallAction
 *
 * @brief Manage outgoing external calls generated by a retail account
 *
 */
class ExternalRetailCallAction extends ExternalCallAction
{
    protected $_number;

    public function setDestination($number)
    {
        $this->_number = $number;
        return $this;
    }

    public function process()
    {
        // Local variables
        $retail = $this->_caller;
        $number = $this->_number;

        // Get company from the caller
        $company = $retail->getCompany();

        // Check if dialed number has company's outbound prefix
        if (!$this->checkCompanyOutboundPrefix($number)) {

            $this->agi->error("Destination number %s without [company%d] outbound prefix",
                            $number, $company->getId());
            $this->agi->decline();
            return;
        }

        // Check if the diversion header contains a valid number
        if ($this->agi->getRedirecting('count')) {
            $diversionNum = $this->agi->getRedirecting('from-num');
            $e164diversionNum = $retail->preferredToE164($diversionNum);
            $ddi = $retail->getDDI($e164diversionNum);
            if (empty($ddi)) {
                // Not a Retail Account DDI. Remove it.
                $this->agi->error("Removing invalid diversion header from %s", $e164diversionNum);
                $this->agi->setRedirecting('count', 0);
            } else {
                $this->agi->verbose("Allowing valid diversion header from %s", $e164diversionNum);

                // FIXME, please kamuser, give me the numbers in E.164
                $this->agi->setRedirecting('from-num', $ddi->getDDIE164());
            }
        } else {
            // Allow identification from any Retail Account DDI
            $callerIdNum = $retail->preferredToE164($this->agi->getCallerIdNum());
            $ddi = $retail->getDDI($callerIdNum);
            if (!empty($ddi)) {
                $this->agi->notice("Retail account \e[0;36m%s [retail%d]\e[0;93m presented origin matches account DDI %s [ddi%d].",
                        $retail->getName(), $retail->getId(), $ddi->getDDIE164(), $ddi->getId());
                // FIXME, please kamuser, give me the numbers in E.164
                $this->agi->setCallerIdNum($ddi->getDDIE164());
            }
        }

        // Convert to E.164 format
        $e164number = $retail->preferredToE164($number);

        // Check if outgoing call can be tarificated
        if (!$this->checkTarificable($e164number)) {
            $this->agi->error("Destination %s can not be billed.", $e164number);
            // Play error notification over progress
            if ($company->hasFeature(Features::PROGRESS)) {
                $this->agi->progress("ivozprovider/notBillable");
            }
            $this->agi->decline();
            return;
        }

        // Update caller displayed number
        if (!isset($ddi)) {
            $ddi = $retail->getOutgoingDDI();
            if ($ddi) {
                $callerIdNum = $retail->preferredToE164($this->agi->getCallerIdNum());
                $this->agi->notice("Using fallback DDI %s [ddi%d] for retail \e[0;36m%s retail%d]\e[0;93m because %s does not match any DDI.",
                    $ddi->getDDIE164(), $ddi->getId(), $retail->getName(), $retail->getId(), $callerIdNum);
                $this->agi->setCallerIdNum($ddi->getDDIE164());
            } else {
                $this->agi->error("Retail Account %s [retail%d] has not OutgoingDDI configured", $retail->getName(), $retail->getId());
                $this->agi->decline();
                return;
            }
        }

        // Check if DDI has recordings enabled
        $this->checkDDIRecording($ddi);
        // Check if DDI belong to platform
        $this->checkDDIBounced($e164number);

        // Call the PSJIP endpoint
        $this->agi->setVariable("DIAL_DST", "PJSIP/" . $e164number . '@proxytrunks');
        $this->agi->setVariable("DIAL_OPTS", "");
        $this->agi->setVariable("DIAL_TIMEOUT", "");
        $this->agi->redirect('call-world', $e164number);
    }
}
