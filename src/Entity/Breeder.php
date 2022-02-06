<?php

namespace App\Entity;

use App\Repository\BreederRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BreederRepository::class)]
class Breeder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $original_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $shortcut;

    #[ORM\OneToMany(mappedBy: 'breeder_id', targetEntity: Plant::class)]
    private $plants;

    public function __construct()
    {
        $this->plants = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getOriginalName(): ?string
    {
        return $this->original_name;
    }

    public function setOriginalName(?string $original_name): self
    {
        $this->original_name = $original_name;

        return $this;
    }

    public function getShortcut(): ?string
    {
        return $this->shortcut;
    }

    public function setShortcut(?string $shortcut): self
    {
        $this->shortcut = $shortcut;

        return $this;
    }

    /**
     * @return Collection|Plant[]
     */
    public function getPlants(): Collection
    {
        return $this->plants;
    }

    public function addPlant(Plant $plant): self
    {
        if (!$this->plants->contains($plant)) {
            $this->plants[] = $plant;
            $plant->setBreederId($this);
        }

        return $this;
    }

    public function removePlant(Plant $plant): self
    {
        if ($this->plants->removeElement($plant)) {
            // set the owning side to null (unless already changed)
            if ($plant->getBreederId() === $this) {
                $plant->setBreederId(null);
            }
        }

        return $this;
    }
}
