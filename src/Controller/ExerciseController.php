<?php

namespace App\Controller;

use App\Entity\Exercise;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ExerciseController
 * @package App\Controller
 */
class ExerciseController extends Controller
{
    /**
     * @Route("/", name="exercise_index")
     */
    public function list()
    {
        return $this->render('exercise/index.html.twig');
    }

    /**
     * @Route("/exercise", name="exercise_add", methods={"POST"})
     */
    public function addExercise(Request $request, EntityManagerInterface $em)
    {
        $request = $this->transformJsonBody($request);

        $exercise = new Exercise();
        $exercise->setName($request->get('name'));

        $em->persist($exercise);
        $em->flush();

        return $this->json($exercise);
    }

    protected function transformJsonBody(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }
        if ($data === null) {
            return $request;
        }
        $request->request->replace($data);
        return $request;
    }
}
