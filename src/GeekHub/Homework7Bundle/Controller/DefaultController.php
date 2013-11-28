<?php

namespace GeekHub\Homework7Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function visitAction($name)
    {
        /**
         * @var \GeekHub\Homework7Bundle\Counter\VisitEngine $visitEngine ;
         */
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
        $idOfRequestedSite = $this->getDoctrine()->getRepository("GeekHubHomework7Bundle:Site")->findOneByName(
            $visitEngine->getRequestedSite()
        )->getId();
        $visitEngine->setAllVisitsOfRequestedSite(
            $this->getDoctrine()->getRepository("GeekHubHomework7Bundle:Visit")->findBySite($idOfRequestedSite)
        );

        $stat = $this->container->get('statistics');
        $count = $stat->simpleStatistic();
        return new Response("All visit of <b>{$visitEngine->getRequestedSite()}</b>  : {$count}");
    }

    public function mainPageAction()
    {
        $sites = $this->getDoctrine()->getRepository("GeekHubHomework7Bundle:Site")->findAll();

        return $this->render('GeekHubHomework7Bundle:Default:index.html.twig', array('sites' => $sites));

    }
}
