<?php

namespace GeekHub\Homework7Bundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use GeekHub\Homework7Bundle\Entity\Site;

class LoadSiteData extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $site = new Site();
        $site->setName("example.com");
        $site->setTimezone("GMT+7");
        $manager->persist($site);

        $site = new Site();
        $site->setName("test.com");
        $site->setTimezone("GMT+2");
        $manager->persist($site);

        $site = new Site();
        $site->setName("is-simple.org");
        $site->setTimezone("GMT-7");
        $manager->persist($site);

        $site = new Site();
        $site->setName("man.info");
        $site->setTimezone("GMT-5");
        $manager->persist($site);
        $manager->flush();
    }
} 