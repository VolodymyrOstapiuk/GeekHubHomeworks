<?php

namespace GeekHub\EventDispetcherSampleBundle\Service;


use GeekHub\EventDispetcherSampleBundle\Event\MySampleEvent;

class MySample1
{
    public function onHandle(MySampleEvent $event)
    {
        $name = $event->getMyName();
        $nameStr = $name . ' ' . $name;
        echo $nameStr;
    }
}