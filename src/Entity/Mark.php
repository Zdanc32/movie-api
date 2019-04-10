<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarkRepository")
 */
class Mark
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Movie", inversedBy="mark_value")
     */
    private $movie;

    /**
     * @ORM\Column(type="integer")
     */
    private $mark_value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function getMarkValue(): ?int
    {
        return $this->mark_value;
    }
    
    public function setMarkValue(int $mark_value): self
    {
        $this->mark_value = $mark_value;

        return $this;
    }
}
