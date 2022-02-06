<?php

namespace App\Entity;

use App\Repository\PlantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantRepository::class)]
class Plant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $original_name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image_path;

    #[ORM\ManyToOne(targetEntity: Breeder::class, inversedBy: 'plants')]
    private $breeder_id;

    #[ORM\ManyToOne(targetEntity: Group::class, inversedBy: 'plants')]
    private $group_id;

    #[ORM\Column(type: 'boolean')]
    private $chimera;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->image_path;
    }

    public function setImagePath(?string $image_path): self
    {
        $this->image_path = $image_path;

        return $this;
    }

    public function getBreederId(): ?Breeder
    {
        return $this->breeder_id;
    }

    public function setBreederId(?Breeder $breeder_id): self
    {
        $this->breeder_id = $breeder_id;

        return $this;
    }

    public function getGroupId(): ?Group
    {
        return $this->group_id;
    }

    public function setGroupId(?Group $group_id): self
    {
        $this->group_id = $group_id;

        return $this;
    }

    public function getChimera(): ?bool
    {
        return $this->chimera;
    }

    public function setChimera(bool $chimera): self
    {
        $this->chimera = $chimera;

        return $this;
    }
}
