<?php

namespace DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Ivoz\Provider\Domain\Model\Ivr\Ivr;

class ProviderIvr extends Fixture implements DependentFixtureInterface
{
    use \DataFixtures\FixtureHelperTrait;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->disableLifecycleEvents($manager);
        $manager->getClassMetadata(Ivr::class)->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
    
        $item1 = $this->createEntityInstanceWithPublicMethods(Ivr::class);
        $item1->setName("testIvrCustom");
        $item1->setTimeout(6);
        $item1->setMaxDigits(0);
        $item1->setAllowExtensions(false);
        $item1->setNoInputRouteType("number");
        $item1->setNoInputNumberValue("946002020");
        $item1->setErrorRouteType("voicemail");
        $item1->setErrorVoiceMailUser($this->getReference('_reference_ProviderUser1'));
        $item1->setCompany($this->getReference('_reference_ProviderCompany1'));
        $item1->setWelcomeLocution($this->getReference('_reference_ProviderLocution1'));
        $item1->setSuccessLocution($this->getReference('_reference_ProviderLocution1'));
        $item1->setNoInputNumberCountry($this->getReference('_reference_ProviderCountry70'));
        $item1->setErrorNumberCountry($this->getReference('_reference_ProviderCountry70'));
        $this->addReference('_reference_ProviderIvr1', $item1);
        $this->sanitizeEntityValues($item1);
        $manager->persist($item1);

        $item2 = $this->createEntityInstanceWithPublicMethods(Ivr::class);
        $item2->setName("testIvrCustom2");
        $item2->setTimeout(6);
        $item2->setMaxDigits(0);
        $item2->setAllowExtensions(false);
        $item2->setNoInputRouteType("extension");
        $item2->setNoInputExtension(
            $this->getReference('_reference_ProviderExtension1')
        );
        $item2->setErrorRouteType("voicemail");
        $item2->setErrorVoiceMailUser($this->getReference('_reference_ProviderUser1'));
        $item2->setCompany($this->getReference('_reference_ProviderCompany1'));
        $item2->setWelcomeLocution($this->getReference('_reference_ProviderLocution1'));
        $item2->setSuccessLocution($this->getReference('_reference_ProviderLocution1'));
        $item2->setNoInputNumberCountry($this->getReference('_reference_ProviderCountry70'));
        $item2->setErrorNumberCountry($this->getReference('_reference_ProviderCountry70'));
        $this->addReference('_reference_ProviderIvr2', $item2);
        $this->sanitizeEntityValues($item2);
        $manager->persist($item2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ProviderCompany::class,
            ProviderUser::class,
            ProviderExtension::class,
            ProviderLocution::class,
            ProviderCountry::class
        );
    }
}
