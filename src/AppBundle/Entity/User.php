<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Registrato
 * @ORM\Entity()
 * @ORM\Table(name="user")
 * @package AppBundle\Entity
 */
class User {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @var string
	 * @ORM\Column(type="string", length=255)
	 */
	private $firstName;
	
	/**
	 * @var string
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $lastName;
	
	/**
	 * @var string
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $address;
	
	/**
	 * @ORM\Column(type="datetime",nullable=true)
	 * @var \DateTime
	 */
	private $creationDate;
	
	/**
	 * @var boolean
	 * @ORM\Column(type="boolean")
	 */
	private $trashed;
	
	/**
	 * @var Structure
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Structure", inversedBy="users")
	 * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
	 */
	private $structure;
	
	public function __construct() {
		$this->trashed = false;
	}
	
	public function getFullName() {
		return $this->__toString();
	}
	
	public function __toString() {
		return $this->getFirstName() . " " . $this->getLastName();
	}

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string|null $lastName
     *
     * @return User
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set address.
     *
     * @param string|null $address
     *
     * @return User
     */
    public function setAddress($address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set creationDate.
     *
     * @param \DateTime|null $creationDate
     *
     * @return User
     */
    public function setCreationDate($creationDate = null)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate.
     *
     * @return \DateTime|null
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set trashed.
     *
     * @param bool $trashed
     *
     * @return User
     */
    public function setTrashed($trashed)
    {
        $this->trashed = $trashed;

        return $this;
    }

    /**
     * Get trashed.
     *
     * @return bool
     */
    public function getTrashed()
    {
        return $this->trashed;
    }

    /**
     * Set structure.
     *
     * @param \AppBundle\Entity\Structure|null $structure
     *
     * @return User
     */
    public function setStructure(\AppBundle\Entity\Structure $structure = null)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get structure.
     *
     * @return \AppBundle\Entity\Structure|null
     */
    public function getStructure()
    {
        return $this->structure;
    }
}
