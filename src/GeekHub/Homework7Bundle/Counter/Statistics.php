<?php
namespace GeekHub\Homework7Bundle\Counter;

class Statistics
{
    /**
     * @var \GeekHub\Homework7Bundle\Counter\VisitEngine $visit
     */
    private $visit;

    public function __construct(VisitEngine $visit)
    {
        $this->visit = $visit;
    }

    public function simpleStatistic()
    {
        $visits = $this->visit->getAllVisits();
        $count = 0;
        foreach ($visits as $visit) {
            $count++;
        }
        return $count;
    }

    public function todayStatistic()
    {
        $visits = $this->getVisitData();
        $todayDate = (new \DateTime('now'));

    }


} 