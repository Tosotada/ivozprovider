<?php

namespace DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Ivoz\Provider\Domain\Model\NotificationTemplateContent\NotificationTemplateContent;
use Ivoz\Provider\Domain\Model\NotificationTemplateContent\NotificationTemplateContentInterface;

class ProviderNotificationTemplateContent extends Fixture implements DependentFixtureInterface
{
    use \DataFixtures\FixtureHelperTrait;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->disableLifecycleEvents($manager);
        $manager->getClassMetadata(NotificationTemplateContent::class)->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        /** @var NotificationTemplateContentInterface $item1 */
        $item1 = $this->createEntityInstanceWithPublicMethods(NotificationTemplateContent::class);
        $item1->setFromName("IvozProvider Notification");
        $item1->setFromAddress("no-reply@ivozprovider.com");
        $item1->setSubject("test subject");
        $item1->setBody("test body");
        $item1->setNotificationTemplate($this->getReference('_reference_ProviderNotificationTemplate1'));
        $item1->setLanguage($this->getReference('_reference_ProviderLanguage1'));
        $this->addReference('_reference_ProviderNotificationTemplateContent1', $item1);
        $this->sanitizeEntityValues($item1);
        $manager->persist($item1);

    
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ProviderLanguage::class,
            ProviderNotificationTemplate::class
        );
    }
}
