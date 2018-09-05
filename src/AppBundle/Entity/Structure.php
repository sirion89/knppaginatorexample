<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Ospedale
 * @ORM\Entity()
 * @ORM\Table(name="structure")
 * @ORM\HasLifecycleCallbacks
 * @package AppBundle\Entity
 */
class Structure {
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
	private $name;
	
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
	 * @var ArrayCollection
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="structure")
	 */
	private $users;
	
	
	/**
	 * Ospedale constructor.
	 */
	public function __construct() {
		$this->trashed      = false;
		$this->users        = new ArrayCollection();
		$this->creationDate = new \DateTime();
	}
	
	public function __toString() {
		return (string) $this->getName();
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
     * Set name.
     *
     * @param string $name
     *
     * @return Structure
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set creationDate.
     *
     * @param \DateTime|null $creationDate
     *
     * @return Structure
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
     * @return Structure
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
     * Add user.
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Structure
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user.
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        return $this->users->removeElement($user);
    }

    /**
     * Get users.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
