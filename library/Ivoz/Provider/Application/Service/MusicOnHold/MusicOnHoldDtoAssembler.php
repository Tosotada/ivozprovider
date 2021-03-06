<?php

namespace Ivoz\Provider\Application\Service\MusicOnHold;

use Ivoz\Core\Application\Service\Assembler\CustomDtoAssemblerInterface;
use Ivoz\Core\Application\Service\StoragePathResolverCollection;
use Ivoz\Core\Domain\Model\EntityInterface;
use Ivoz\Provider\Domain\Model\Brand\BrandDto;
use Assert\Assertion;
use Ivoz\Provider\Domain\Model\MusicOnHold\MusicOnHoldInterface;

class MusicOnHoldDtoAssembler implements CustomDtoAssemblerInterface
{
    /**
     * @var StoragePathResolverCollection
     */
    protected $storagePathResolver;

    public function __construct(
        StoragePathResolverCollection $storagePathResolver
    ) {
        $this->storagePathResolver = $storagePathResolver;
    }

    /**
     * @param MusicOnHoldInterface $entity
     * @param integer $depth
     * @return BrandDTO
     */
    public function toDto(EntityInterface $entity, $depth = 0)
    {
        Assertion::isInstanceOf($entity, MusicOnHoldInterface::class);

        /** @var BrandDTO $dto */
        $dto = $entity->toDto($depth);
        $id = $entity->getId();

        if (!$id) {
            return $dto;
        }

        /* OriginalFile */
        if ($entity->getOriginalFile()->getFileSize()) {
            $pathResolver = $this
                ->storagePathResolver
                ->getPathResolver('OriginalFile');

            $pathResolver->setOriginalFileName(
                $entity->getOriginalFile()->getBaseName()
            );
            $dto->setOriginalFilePath(
                $pathResolver->getFilePath($entity)
            );
        }

        /* EncodedFile */
        if ($entity->getEncodedFile()->getFileSize()) {
            $pathResolver = $this
                ->storagePathResolver
                ->getPathResolver('EncodedFile');

            $pathResolver->setOriginalFileName(
                $entity->getEncodedFile()->getBaseName()
            );
            $dto->setEncodedFilePath(
                $pathResolver->getFilePath($entity)
            );
        }

        return $dto;
    }
}
