<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 06.12.13
 * Time: 23:22
 */

namespace GeekHub\EventDispetcherSampleBundle\Service;


use GeekHub\EventDispetcherSampleBundle\Event\MySampleEvent;

class MySample2
{
    public function onHandle(MySampleEvent $event)
    {
        $surname = $event->getSurname();
        $surnames = $surname . ' ' . $surname;
        echo $surnames;
    }
} 