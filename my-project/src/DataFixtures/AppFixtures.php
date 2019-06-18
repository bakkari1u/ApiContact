<?php


namespace App\DataFixtures;

use App\Entity\Departement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {
            $dep = new Departement();
            $dep->setLibelle("dep".$i);
            $dep->setEmailResponsable1("mohamed.bakkari.pro@gmail.com");
            $dep->setEmailResponsable2("mohamed.bakkari.pro@gmail.com");
            $manager->persist($dep);
        }

        $manager->flush();
    }
}
