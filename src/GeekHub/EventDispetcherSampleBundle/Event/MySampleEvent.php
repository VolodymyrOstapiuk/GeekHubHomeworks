<?php


namespace GeekHub\EventDispetcherSampleBundle\Event;


use Symfony\Component\EventDispatcher\Event;

class MySampleEvent extends Event
{
    private $myName;

    /**
     * @param mixed $myName
     */
    public function setMyName($myName)
    {
        $this->myName = $myName;
    }

    /**
     * @return mixed
     */
    public function getMyName()
    {
        return $this->myName;
    }

    private $surname;

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

}