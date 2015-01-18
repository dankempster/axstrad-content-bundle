<?php

namespace Axstrad\Bundle\ContentBundle\Tests\UseCases\AppBundle\DataFixtures\ORM;

use Axstrad\Bundle\ContentBundle\Entity\Content;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadContentData implements
    FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $content1 = new Content;
        $content1->setHeading('My Content');
        $content1->setCopy('<p>My content\'s copy.</p>');
        $content1->setReference('my-content');
        $manager->persist($content1);

        $content2 = new Content;
        $content2->setHeading('More Content');
        $content2->setCopy('<p>More copy.</p>');
        $content2->setReference('more-content');
        $manager->persist($content2);

        $manager->flush();
    }
}
