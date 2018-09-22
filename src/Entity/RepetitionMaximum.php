<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RepetitionMaximumRepository")
 */
class RepetitionMaximum
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $reps;

    /**
     * @ORM\Column(type="datetime")
     */
    private $rmDate;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $rmTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Exercise", inversedBy="repetitionMaximums")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exercise;

    public function getId()
    {
        return $this->id;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getReps(): ?int
    {
        return $this->reps;
    }

    public function setReps(int $reps): self
    {
        $this->reps = $reps;

        return $this;
    }

    public function getRmDate(): ?\DateTimeInterface
    {
        return $this->rmDate;
    }

    public function setRmDate(\DateTimeInterface $rmDate): self
    {
        $this->rmDate = $rmDate;

        return $this;
    }

    public function getRmTime(): ?\DateTimeInterface
    {
        return $this->rmTime;
    }

    public function setRmTime(?\DateTimeInterface $rmTime): self
    {
        $this->rmTime = $rmTime;

        return $this;
    }

    public function getExercise(): ?Exercise
    {
        return $this->exercise;
    }

    public function setExercise(?Exercise $exercise): self
    {
        $this->exercise = $exercise;

        return $this;
    }
}
