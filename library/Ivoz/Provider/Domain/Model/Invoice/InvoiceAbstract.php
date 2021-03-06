<?php

namespace Ivoz\Provider\Domain\Model\Invoice;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;
use Ivoz\Core\Domain\Model\EntityInterface;

/**
 * InvoiceAbstract
 * @codeCoverageIgnore
 */
abstract class InvoiceAbstract
{
    /**
     * @var string
     */
    protected $number;

    /**
     * @var \DateTime
     */
    protected $inDate;

    /**
     * @var \DateTime
     */
    protected $outDate;

    /**
     * @var string
     */
    protected $total;

    /**
     * @var string
     */
    protected $taxRate;

    /**
     * @var string
     */
    protected $totalWithTax;

    /**
     * comment: enum:waiting|processing|created|error
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $statusMsg;

    /**
     * @var Pdf
     */
    protected $pdf;

    /**
     * @var \Ivoz\Provider\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface
     */
    protected $invoiceTemplate;

    /**
     * @var \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Provider\Domain\Model\InvoiceNumberSequence\InvoiceNumberSequenceInterface
     */
    protected $numberSequence;

    /**
     * @var \Ivoz\Provider\Domain\Model\InvoiceScheduler\InvoiceSchedulerInterface
     */
    protected $scheduler;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct(Pdf $pdf)
    {
        $this->setPdf($pdf);
    }

    abstract public function getId();

    public function __toString()
    {
        return sprintf(
            "%s#%s",
            "Invoice",
            $this->getId()
        );
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @param null $id
     * @return InvoiceDto
     */
    public static function createDto($id = null)
    {
        return new InvoiceDto($id);
    }

    /**
     * @internal use EntityTools instead
     * @param EntityInterface|null $entity
     * @param int $depth
     * @return InvoiceDto|null
     */
    public static function entityToDto(EntityInterface $entity = null, $depth = 0)
    {
        if (!$entity) {
            return null;
        }

        Assertion::isInstanceOf($entity, InvoiceInterface::class);

        if ($depth < 1) {
            return static::createDto($entity->getId());
        }

        if ($entity instanceof \Doctrine\ORM\Proxy\Proxy && !$entity->__isInitialized()) {
            return static::createDto($entity->getId());
        }

        return $entity->toDto($depth-1);
    }

    /**
     * Factory method
     * @internal use EntityTools instead
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto InvoiceDto
         */
        Assertion::isInstanceOf($dto, InvoiceDto::class);

        $pdf = new Pdf(
            $dto->getPdfFileSize(),
            $dto->getPdfMimeType(),
            $dto->getPdfBaseName()
        );

        $self = new static(
            $pdf
        );

        $self
            ->setNumber($dto->getNumber())
            ->setInDate($dto->getInDate())
            ->setOutDate($dto->getOutDate())
            ->setTotal($dto->getTotal())
            ->setTaxRate($dto->getTaxRate())
            ->setTotalWithTax($dto->getTotalWithTax())
            ->setStatus($dto->getStatus())
            ->setStatusMsg($dto->getStatusMsg())
            ->setInvoiceTemplate($dto->getInvoiceTemplate())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany())
            ->setNumberSequence($dto->getNumberSequence())
            ->setScheduler($dto->getScheduler())
        ;

        $self->sanitizeValues();
        $self->initChangelog();

        return $self;
    }

    /**
     * @internal use EntityTools instead
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto InvoiceDto
         */
        Assertion::isInstanceOf($dto, InvoiceDto::class);

        $pdf = new Pdf(
            $dto->getPdfFileSize(),
            $dto->getPdfMimeType(),
            $dto->getPdfBaseName()
        );

        $this
            ->setNumber($dto->getNumber())
            ->setInDate($dto->getInDate())
            ->setOutDate($dto->getOutDate())
            ->setTotal($dto->getTotal())
            ->setTaxRate($dto->getTaxRate())
            ->setTotalWithTax($dto->getTotalWithTax())
            ->setStatus($dto->getStatus())
            ->setStatusMsg($dto->getStatusMsg())
            ->setPdf($pdf)
            ->setInvoiceTemplate($dto->getInvoiceTemplate())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany())
            ->setNumberSequence($dto->getNumberSequence())
            ->setScheduler($dto->getScheduler());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @internal use EntityTools instead
     * @param int $depth
     * @return InvoiceDto
     */
    public function toDto($depth = 0)
    {
        return self::createDto()
            ->setNumber(self::getNumber())
            ->setInDate(self::getInDate())
            ->setOutDate(self::getOutDate())
            ->setTotal(self::getTotal())
            ->setTaxRate(self::getTaxRate())
            ->setTotalWithTax(self::getTotalWithTax())
            ->setStatus(self::getStatus())
            ->setStatusMsg(self::getStatusMsg())
            ->setPdfFileSize(self::getPdf()->getFileSize())
            ->setPdfMimeType(self::getPdf()->getMimeType())
            ->setPdfBaseName(self::getPdf()->getBaseName())
            ->setInvoiceTemplate(\Ivoz\Provider\Domain\Model\InvoiceTemplate\InvoiceTemplate::entityToDto(self::getInvoiceTemplate(), $depth))
            ->setBrand(\Ivoz\Provider\Domain\Model\Brand\Brand::entityToDto(self::getBrand(), $depth))
            ->setCompany(\Ivoz\Provider\Domain\Model\Company\Company::entityToDto(self::getCompany(), $depth))
            ->setNumberSequence(\Ivoz\Provider\Domain\Model\InvoiceNumberSequence\InvoiceNumberSequence::entityToDto(self::getNumberSequence(), $depth))
            ->setScheduler(\Ivoz\Provider\Domain\Model\InvoiceScheduler\InvoiceScheduler::entityToDto(self::getScheduler(), $depth));
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'number' => self::getNumber(),
            'inDate' => self::getInDate(),
            'outDate' => self::getOutDate(),
            'total' => self::getTotal(),
            'taxRate' => self::getTaxRate(),
            'totalWithTax' => self::getTotalWithTax(),
            'status' => self::getStatus(),
            'statusMsg' => self::getStatusMsg(),
            'pdfFileSize' => self::getPdf()->getFileSize(),
            'pdfMimeType' => self::getPdf()->getMimeType(),
            'pdfBaseName' => self::getPdf()->getBaseName(),
            'invoiceTemplateId' => self::getInvoiceTemplate() ? self::getInvoiceTemplate()->getId() : null,
            'brandId' => self::getBrand() ? self::getBrand()->getId() : null,
            'companyId' => self::getCompany() ? self::getCompany()->getId() : null,
            'numberSequenceId' => self::getNumberSequence() ? self::getNumberSequence()->getId() : null,
            'schedulerId' => self::getScheduler() ? self::getScheduler()->getId() : null
        ];
    }
    // @codeCoverageIgnoreStart

    /**
     * @deprecated
     * Set number
     *
     * @param string $number
     *
     * @return self
     */
    public function setNumber($number = null)
    {
        if (!is_null($number)) {
            Assertion::maxLength($number, 30, 'number value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @deprecated
     * Set inDate
     *
     * @param \DateTime $inDate
     *
     * @return self
     */
    public function setInDate($inDate = null)
    {
        if (!is_null($inDate)) {
            $inDate = \Ivoz\Core\Domain\Model\Helper\DateTimeHelper::createOrFix(
                $inDate,
                null
            );
        }

        $this->inDate = $inDate;

        return $this;
    }

    /**
     * Get inDate
     *
     * @return \DateTime
     */
    public function getInDate()
    {
        return $this->inDate;
    }

    /**
     * @deprecated
     * Set outDate
     *
     * @param \DateTime $outDate
     *
     * @return self
     */
    public function setOutDate($outDate = null)
    {
        if (!is_null($outDate)) {
            $outDate = \Ivoz\Core\Domain\Model\Helper\DateTimeHelper::createOrFix(
                $outDate,
                null
            );
        }

        $this->outDate = $outDate;

        return $this;
    }

    /**
     * Get outDate
     *
     * @return \DateTime
     */
    public function getOutDate()
    {
        return $this->outDate;
    }

    /**
     * @deprecated
     * Set total
     *
     * @param string $total
     *
     * @return self
     */
    public function setTotal($total = null)
    {
        if (!is_null($total)) {
            if (!is_null($total)) {
                Assertion::numeric($total);
                $total = (float) $total;
            }
        }

        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @deprecated
     * Set taxRate
     *
     * @param string $taxRate
     *
     * @return self
     */
    public function setTaxRate($taxRate = null)
    {
        if (!is_null($taxRate)) {
            if (!is_null($taxRate)) {
                Assertion::numeric($taxRate);
                $taxRate = (float) $taxRate;
            }
        }

        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * Get taxRate
     *
     * @return string
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * @deprecated
     * Set totalWithTax
     *
     * @param string $totalWithTax
     *
     * @return self
     */
    public function setTotalWithTax($totalWithTax = null)
    {
        if (!is_null($totalWithTax)) {
            if (!is_null($totalWithTax)) {
                Assertion::numeric($totalWithTax);
                $totalWithTax = (float) $totalWithTax;
            }
        }

        $this->totalWithTax = $totalWithTax;

        return $this;
    }

    /**
     * Get totalWithTax
     *
     * @return string
     */
    public function getTotalWithTax()
    {
        return $this->totalWithTax;
    }

    /**
     * @deprecated
     * Set status
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status = null)
    {
        if (!is_null($status)) {
            Assertion::maxLength($status, 25, 'status value "%s" is too long, it should have no more than %d characters, but has %d characters.');
            Assertion::choice($status, array (
              0 => 'waiting',
              1 => 'processing',
              2 => 'created',
              3 => 'error',
            ), 'statusvalue "%s" is not an element of the valid values: %s');
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @deprecated
     * Set statusMsg
     *
     * @param string $statusMsg
     *
     * @return self
     */
    public function setStatusMsg($statusMsg = null)
    {
        if (!is_null($statusMsg)) {
            Assertion::maxLength($statusMsg, 140, 'statusMsg value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->statusMsg = $statusMsg;

        return $this;
    }

    /**
     * Get statusMsg
     *
     * @return string
     */
    public function getStatusMsg()
    {
        return $this->statusMsg;
    }

    /**
     * Set invoiceTemplate
     *
     * @param \Ivoz\Provider\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface $invoiceTemplate
     *
     * @return self
     */
    public function setInvoiceTemplate(\Ivoz\Provider\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface $invoiceTemplate = null)
    {
        $this->invoiceTemplate = $invoiceTemplate;

        return $this;
    }

    /**
     * Get invoiceTemplate
     *
     * @return \Ivoz\Provider\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface
     */
    public function getInvoiceTemplate()
    {
        return $this->invoiceTemplate;
    }

    /**
     * Set brand
     *
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set numberSequence
     *
     * @param \Ivoz\Provider\Domain\Model\InvoiceNumberSequence\InvoiceNumberSequenceInterface $numberSequence
     *
     * @return self
     */
    public function setNumberSequence(\Ivoz\Provider\Domain\Model\InvoiceNumberSequence\InvoiceNumberSequenceInterface $numberSequence = null)
    {
        $this->numberSequence = $numberSequence;

        return $this;
    }

    /**
     * Get numberSequence
     *
     * @return \Ivoz\Provider\Domain\Model\InvoiceNumberSequence\InvoiceNumberSequenceInterface
     */
    public function getNumberSequence()
    {
        return $this->numberSequence;
    }

    /**
     * Set scheduler
     *
     * @param \Ivoz\Provider\Domain\Model\InvoiceScheduler\InvoiceSchedulerInterface $scheduler
     *
     * @return self
     */
    public function setScheduler(\Ivoz\Provider\Domain\Model\InvoiceScheduler\InvoiceSchedulerInterface $scheduler = null)
    {
        $this->scheduler = $scheduler;

        return $this;
    }

    /**
     * Get scheduler
     *
     * @return \Ivoz\Provider\Domain\Model\InvoiceScheduler\InvoiceSchedulerInterface
     */
    public function getScheduler()
    {
        return $this->scheduler;
    }

    /**
     * Set pdf
     *
     * @param \Ivoz\Provider\Domain\Model\Invoice\Pdf $pdf
     *
     * @return self
     */
    public function setPdf(Pdf $pdf)
    {
        $this->pdf = $pdf;
        return $this;
    }

    /**
     * Get pdf
     *
     * @return \Ivoz\Provider\Domain\Model\Invoice\Pdf
     */
    public function getPdf()
    {
        return $this->pdf;
    }
    // @codeCoverageIgnoreEnd
}
