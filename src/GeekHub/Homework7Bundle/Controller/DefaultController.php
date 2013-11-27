<?php

namespace GeekHub\Homework7Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/site/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        $visitEngine = $this->container->get('visitEngine');
        $visitEngine->setRequest($this->getRequest());
        $visitEngine->setSite(
            $this->getDoctrine()->getRepository("GeekHubHomework7Bundle:Site")->findOneByName(
                $visitEngine->getRequestedSite()
            )
        );
        $visitEngine->makeVisitData();
        $manager = $this->getDoctrine()->getEntityManager();
        $manager->persist($visitEngine->getVisitData());
        $manager->flush();

        $visitEngine->setAllVisits($this->getDoctrine()->getRepository("GeekHubHomework7Bundle:Visit")->findAll());
        $stat = $this->container->get('statistics');
        $count = $stat->simpleStatistic();

        return array('name' => $count);
    }
}
