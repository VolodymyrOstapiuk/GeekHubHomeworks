<?php

namespace GeekHub\Homework7Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visit
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Visit
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
     * @ORM\ManyToOne(targetEntity="Site", inversedBy="visits")
     * @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     */
    protected $site;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateOfVisit;
    /**
     * @ORM\Column(type="string")
     */
    protected $ip;

    public function __construct()
    {
        $this->dateOfVisit = new \DateTime();
    }

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
     * @param string $ip
     * @return Visit
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set dateOfVisit
     *
     * @param \DateTime $dateOfVisit
     * @return Visit
     */
    public function setDateOfVisit($dateOfVisit)
    {
        $this->dateOfVisit = $dateOfVisit;

        return $this;
    }

    /**
     * Get dateOfVisit
     *
     * @return \DateTime
     */
    public function getDateOfVisit()
    {
        return $this->dateOfVisit;
    }

    /**
     * Set site
     *
     * @param Site $site
     * @return Visit
     */
    public function setSite(Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \GeekHub\Homework7Bundle\Entity\Site
     */
    public function getSite()
    {
        return $this->site;
    }
}