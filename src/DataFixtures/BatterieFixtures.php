<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ModelBatterie;
use Faker\Factory;

class BatterieFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
       
    }


    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $modelBatt = new ModelBatterie();
            $modelBatt->setCapacite($this->faker->randomNumber(5, true)); 
            $modelBatt->setFabricant('Mercedes'. $i);
            $manager->persist($modelBatt);
        }

        $manager->flush();
    }
}
