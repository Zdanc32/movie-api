<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mark", mappedBy="movie")
     */
    private $mark_value;

    public function __construct()
    {
        $this->mark_value = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Mark[]
     */
    public function getMarkValue(): Collection
    {
        return $this->mark_value;
    }

    public function addMarkValue(Mark $markValue): self
    {
        if (!$this->mark_value->contains($markValue)) {
            $this->mark_value[] = $markValue;
            $markValue->setMovie($this);
        }

        return $this;
    }

    public function removeMarkValue(Mark $markValue): self
    {
        if ($this->mark_value->contains($markValue)) {
            $this->mark_value->removeElement($markValue);
            // set the owning side to null (unless already changed)
            if ($markValue->getMovie() === $this) {
                $markValue->setMovie(null);
            }
        }

        return $this;
    }
}
