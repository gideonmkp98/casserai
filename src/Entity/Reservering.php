<?php

namespace App\Entity;

use App\Repository\ReserveringRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReserveringRepository::class)
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Kamer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $kamer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $checkinDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $checkoutDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $betaalid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $betaalMethode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamer(): ?Kamer
    {
        return $this->kamer;
    }

    public function setKamer(?Kamer $kamer): self
    {
        $this->kamer = $kamer;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCheckinDate(): ?\DateTimeInterface
    {
        return $this->checkinDate;
    }

    public function setCheckinDate(\DateTimeInterface $checkinDate): self
    {
        $this->checkinDate = $checkinDate;

        return $this;
    }

    public function getCheckoutDate(): ?\DateTimeInterface
    {
        return $this->checkoutDate;
    }

    public function setCheckoutDate(\DateTimeInterface $checkoutDate): self
    {
        $this->checkoutDate = $checkoutDate;

        return $this;
    }

    public function getBetaalid(): ?string
    {
        return $this->betaalid;
    }

    public function setBetaalid(?string $betaalid): self
    {
        $this->betaalid = $betaalid;

        return $this;
    }

    public function getBetaalMethode(): ?string
    {
        return $this->betaalMethode;
    }

    public function setBetaalMethode(?string $betaalMethode): self
    {
        $this->betaalMethode = $betaalMethode;

        return $this;
    }
}
