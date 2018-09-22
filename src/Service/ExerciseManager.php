<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 12/7/18
 * Time: 1:05
 */
namespace App\Service;


use App\Repository\ExerciseRepository;

class ExerciseManager
{

    protected $exerciseRepository;

    /**
     * ExerciseManager constructor.
     */
    public function __construct(ExerciseRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function getAllExercises() {
        return $this->exerciseRepository->findAllDesc();
    }

}