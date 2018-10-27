<?php
namespace App\DataFixtures;

use App\Entity\Exercise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ExercisesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $exercises = ['Bar Muscle-Up', 'Burpee', 'Hand Stand Push-Up', 'Snatch', 'Clean & Jerk', 'Pistol', 'Muscle-up', 'Thurster', 'Pistol'];
        foreach ($exercises as $exerciseName) {
            $newExCross = new Exercise();
            $newExCross->setName($exerciseName);
            $manager->persist($newExCross);
        }
        $manager->flush();
    }


}