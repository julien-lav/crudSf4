<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deliveryPostalCode;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $invoicePostalCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */ 
    private $deliveryAdress;

    /**
     * @ORM\Column(type="string", nullable=true)
     */ 
    private $invoiceAdress;

    /**
     * @ORM\Column(type="string", nullable=true)
     */ 
    private $deliveryCity;

    /**
     * @ORM\Column(type="string", nullable=true)
     */ 
    private $invoiceCity;

    /**
     * @ORM\Column(type="string", nullable=true)
     */ 
    private $deliveryCountry;

    /**
     * @ORM\Column(type="string", nullable=true)
     */ 
    private $invoiceCountry;


    public function getId()
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstname;
    }

    public function setFirstName(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function setLastName(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDeliveryPostalCode(): ?int
    {
        return $this->deliveryPostalCode;
    }

    public function setDeliveryPostalCode(?int $deliveryPostalCode): self
    {
        $this->deliveryPostalCode = $deliveryPostalCode;

        return $this;
    }

    public function getInvoicePostalCode(): ?int
    {
        return $this->invoicePostalCode;
    }

    public function setInvoicePostalCode(?int $invoicePostalCode): self
    {
        $this->invoicePostalCode = $invoicePostalCode;

        return $this;
    }

    public function getDeliveryAdress(): ?string
    {
        return $this->deliveryAdress;
    }

    public function setDeliveryAdress(?string $deliveryAdress): self
    {
        $this->deliveryAdress = $deliveryAdress;

        return $this;
    }

    public function getInvoiceAdress(): ?string
    {
        return $this->invoiceAdress;
    }

    public function setInvoiceAdress(?string $invoiceAdress): self
    {
        $this->invoiceAdress = $invoiceAdress;

        return $this;
    }

    public function getDeliveryCity(): ?string
    {
        return $this->deliveryCity;
    }

    public function setDeliveryCity(?string $deliveryCity): self
    {
        $this->deliveryCity = $deliveryCity;

        return $this;
    }

    public function getInvoiceCity(): ?string
    {
        return $this->invoiceCity;
    }

    public function setInvoiceCity(?string $invoiceCity): self
    {
        $this->invoiceCity = $invoiceCity;

        return $this;
    }

    public function getDeliveryCountry(): ?string
    {
        return $this->deliveryCountry;
    }

    public function setDeliveryCountry(?string $deliveryCountry): self
    {
        $this->deliveryCountry = $deliveryCountry;

        return $this;
    }

    public function getInvoiceCountry(): ?string
    {
        return $this->invoiceCountry;
    }

    public function setInvoiceCountry(?string $invoiceCountry): self
    {
        $this->invoiceCountry = $invoiceCountry;

        return $this;
    }

    public function getDateOfBirth() //: ?date 
    {
       return $this->dateOfBirth;
    }


    public function setDateOfBirth($dateOfBirth) //?date  :  self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}

   