<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=kamer::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $kamer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imagefile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamer(): ?kamer
    {
        return $this->kamer;
    }

    public function setKamer(kamer $kamer): self
    {
        $this->kamer = $kamer;

        return $this;
    }

    public function getImagefile(): ?string
    {
        return $this->imagefile;
    }

    public function setImagefile(string $imagefile): self
    {
        $this->imagefile = $imagefile;

        return $this;
    }
}
