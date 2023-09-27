<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Supporter;
use Faker\Factory;

class SupporterFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
       
    }


    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $supporter = new Supporter();
            $supporter->setNom($this->faker->lastName());
            $supporter->setPrenom($this->faker->firstName());
            $supporter->setAdresse($this->faker->secondaryAddress()); 
            $supporter -> setVille($this->faker->city()); 
            $supporter -> setCodePostal($this->faker->departmentNumber()); 
            $supporter -> setTelFix('0606060606-'. $i);
            $supporter -> setTelMobile('0606060606-'. $i);
            $supporter->setMel(strtolower($supporter->getPrenom()).'.'.strtolower($supporter->getNom()).'@'.$this->faker->freeEmailDomain()); 
            $manager->persist($supporter);
        }

        $manager->flush();
    }
}
