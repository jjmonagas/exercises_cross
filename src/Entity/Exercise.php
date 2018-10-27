<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ApiResource
 * @ApiFilter(OrderFilter::class, properties={"name"}, arguments={"orderParameterName"="order"})
 * @ORM\Entity(repositoryClass="App\Repository\ExerciseRepository")
 */
class Exercise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepetitionMaximum", mappedBy="exercise", orphanRemoval=true)
     */
    private $repetitionMaximums;


    public function __construct()
    {
        $this->repetitionMaximums = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|RepetitionMaximum[]
     */
    public function getRepetitionMaximums(): Collection
    {
        return $this->repetitionMaximums;
    }

    public function addRepetitionMaximum(RepetitionMaximum $repetitionMaximum): self
    {
        if (!$this->repetitionMaximums->contains($repetitionMaximum)) {
            $this->repetitionMaximums[] = $repetitionMaximum;
            $repetitionMaximum->setExercise($this);
        }

        return $this;
    }

    public function removeRepetitionMaximum(RepetitionMaximum $repetitionMaximum): self
    {
        if ($this->repetitionMaximums->contains($repetitionMaximum)) {
            $this->repetitionMaximums->removeElement($repetitionMaximum);
            // set the owning side to null (unless already changed)
            if ($repetitionMaximum->getExercise() === $this) {
                $repetitionMaximum->setExercise(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
