<?php

namespace App\Entity;

use App\Repository\ScrapedPropertyModelRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Table(name="soldProperty")
 * @ORM\Entity(repositoryClass=ScrapedPropertyModelRepository::class)
 * @ApiResource
 */
class ScrapedPropertyModel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="doctrine.uuid_generator")
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $street;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $housenumber;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $housenumberAdd;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $municipality;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $typeOfProperty;

    /**
     * @ORM\Column(type="integer")
     */
    private $askPrice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amountOfRooms;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $livingArea;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $plotSize;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateSold;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getHousenumber(): ?int
    {
        return $this->housenumber;
    }

    public function setHousenumber(?int $housenumber): self
    {
        $this->housenumber = $housenumber;

        return $this;
    }

    public function getHousenumberAdd(): ?string
    {
        return $this->housenumberAdd;
    }

    public function setHousenumberAdd(?string $housenumberAdd): self
    {
        $this->housenumberAdd = $housenumberAdd;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getMunicipality(): ?string
    {
        return $this->municipality;
    }

    public function setMunicipality(?string $municipality): self
    {
        $this->municipality = $municipality;

        return $this;
    }

    public function getTypeOfProperty(): ?string
    {
        return $this->typeOfProperty;
    }

    public function setTypeOfProperty(?string $typeOfProperty): self
    {
        $this->typeOfProperty = $typeOfProperty;

        return $this;
    }

    public function getAskPrice(): ?int
    {
        return $this->askPrice;
    }

    public function setAskPrice(int $askPrice): self
    {
        $this->askPrice = $askPrice;

        return $this;
    }

    public function getAmountOfRooms(): ?int
    {
        return $this->amountOfRooms;
    }

    public function setAmountOfRooms(?int $amountOfRooms): self
    {
        $this->amountOfRooms = $amountOfRooms;

        return $this;
    }

    public function getLivingArea(): ?int
    {
        return $this->livingArea;
    }

    public function setLivingArea(?int $livingArea): self
    {
        $this->livingArea = $livingArea;

        return $this;
    }

    public function getPlotSize(): ?int
    {
        return $this->plotSize;
    }

    public function setPlotSize(?int $plotSize): self
    {
        $this->plotSize = $plotSize;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateSold(): ?DateTimeInterface
    {
        return $this->dateSold;
    }

    public function setDateSold(DateTimeInterface $dateSold): self
    {
        $this->dateSold = $dateSold;

        return $this;
    }
}
