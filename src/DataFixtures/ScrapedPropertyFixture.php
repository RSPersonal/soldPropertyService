<?php

namespace App\DataFixtures;

use App\Entity\ScrapedPropertyModel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTimeInterface;


class ScrapedPropertyFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $propertyModel = new ScrapedPropertyModel();
        $propertyModel->setStreet('Teststraat');
        $propertyModel->setHousenumber(50);
        $propertyModel->setHousenumberAdd('A');
        $propertyModel->setCity('Teststad');
        $propertyModel->setMunicipality('Testen');
        $propertyModel->setAmountOfRooms(3);
        $propertyModel->setAskPrice(350000);
        $dateSold = new \DateTime('now');
        $propertyModel->setDateSold($dateSold);
        $propertyModel->setLivingArea(90);
        $propertyModel->setPlotSize(110);
        $propertyModel->setZipcode('8021TS');
        $propertyModel->setStatus(true);
        $manager->persist($propertyModel);

        $manager->flush();
    }
}
