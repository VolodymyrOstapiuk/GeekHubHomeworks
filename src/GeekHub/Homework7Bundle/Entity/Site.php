<?php

namespace GeekHub\Homework7Bundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Site
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    /**
     * @ORM\OneToMany(targetEntity="Visit", mappedBy="site")
     *
     */
    protected $visits;
    /**
     * @ORM\Column(type="string")
     */
    protected $timezone;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visits = new ArrayCollection();
    }

    /**
     * @param string $name
     * @return Site
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return Site
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Add visits
     *
     * @param \GeekHub\Homework7Bundle\Entity\Visit $visits
     * @return Site
     */
    public function addVisit(Visit $visits)
    {
        $this->visits[] = $visits;

        return $this;
    }

    /**
     * Remove visits
     *
     * @param Visit $visits
     */
    public function removeVisit(Visit $visits)
    {
        $this->visits->removeElement($visits);
    }

    /**
     * Get visits
     *
     * @return Collection
     */
    public function getVisits()
    {
        return $this->visits;
    }
}