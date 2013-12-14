<?php

namespace GeekHub\EventDispetcherSampleBundle\Controller;

use GeekHub\EventDispetcherSampleBundle\Event\MySampleEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/dispatcher/{name}")
     * @Template()
     */
    public function indexAction()
    {
        $event = new MySampleEvent();
        $event->setMyName('Vova');
        $event->setSurname('Ost');
        $eventDispatcher = $this->get('event_dispatcher');
        $eventDispatcher->dispatch('my_sample_event', $event);
        return new Response();
    }
}
