<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Usager;
use Faker\Factory;

class UsagerFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
       
    }


    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $usager = new Usager();
            $usager->setNom($this->faker->lastName());
            $usager->setPrenom($this->faker->firstName());
            $usager->setAdresse($this->faker->secondaryAddress()); 
            $usager -> setVille($this->faker->city()); 
            $usager -> setCodePostal($this->faker->departmentNumber()); 
            $usager -> setTelFix('0606060606-'. $i);
            $usager -> setTelMobile('0606060606-'. $i);
            $usager->setMel(strtolower($usager->getPrenom()).'.'.strtolower($usager->getNom()).'@'.$this->faker->freeEmailDomain()); 
            $manager->persist($usager);
        }

        $manager->flush();
    }
}
