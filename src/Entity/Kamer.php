<?php

namespace App\Entity;

use App\Repository\KamerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KamerRepository::class)
 */
class Kamer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Soort::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $soort;

    /**
     * @ORM\Column(type="integer")
     */
    private $room_nr;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $bed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoort(): ?soort
    {
        return $this->soort;
    }

    public function setSoort(?soort $soort): self
    {
        $this->soort = $soort;

        return $this;
    }

    public function getRoomNr(): ?int
    {
        return $this->room_nr;
    }

    public function setRoomNr(int $room_nr): self
    {
        $this->room_nr = $room_nr;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBed(): ?int
    {
        return $this->bed;
    }

    public function setBed(int $bed): self
    {
        $this->bed = $bed;

        return $this;
    }
    public function __toString(): string
    {
        return (string) $this->id;
    }
}
