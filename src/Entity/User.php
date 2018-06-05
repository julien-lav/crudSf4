<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @ORM\Column(type="string", unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

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

    public function getDateOfBirth(): ?\DateTime 
    {
       return $this->dateOfBirth;
    }


    public function setDateOfBirth(?\DateTime $dateOfBirth ): self
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


    /** SECURITY **/

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }


     public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        // guarantees that a user always has at least one role for security
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * {@inheritdoc}
     */
    public function getSalt(): ?string
    {
        // See "Do you need to use a Salt?" at https://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one

        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }

    /** @see \Serializable::serialize() */
    public function serialize(): string
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
          // add $this->salt too if you don't use Bcrypt or Argon2i

        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        // add $this->salt too if you don't use Bcrypt or Argon2i

        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }

}

   