<?php

namespace GeekHub\Homework7Bundle\Counter;

use GeekHub\Homework7Bundle\Entity\Visit;
use Symfony\Component\Config\Definition\Exception\Exception;

class VisitEngine
{
    /**
     * @var \Symfony\Component\HttpFoundation\Request $request
     */
    private $request;
    private $siteEntity;
    private $visit;
    private $allVisits;

    public function __construct()
    {
        $this->visit = new Visit();
    }

    public function makeVisitData()
    {
        /**
         * @var \GeekHub\Homework7Bundle\Entity\Site $site
         */
        $site = $this->siteEntity;
        if (!$site) {
            throw new Exception('Not correct siteName requested');
        }

        $this->visit->setIp($this->request->getClientIp());
        $this->visit->setDateOfVisit(new \DateTime('now'));
        $this->visit->setSite($site);

    }

    public function getVisitData()
    {
        return $this->visit;
    }

    public function setRequest($request)
    {
        $this->request = $request;
    }

    public function setSite($siteEntity)
    {
        $this->siteEntity = $siteEntity;
    }

    public function getRequestedSite()
    {
        $pathOfVisit = $this->request->getPathInfo();
        $siteRequested = str_replace('/site/', '', $pathOfVisit);
        return $siteRequested;
    }

    public function setAllVisits($visits)
    {
        $this->allVisits = $visits;
    }

    public function getAllVisits()
    {
        return $this->allVisits;
    }

}