<?php

/*
 * (c) Brieuc Thomas <tbrieuc@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrieucThomas\ErgastClient\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Type;
use phpDocumentor\Reflection\Types\Array_;

/**
 * @author Brieuc Thomas <tbrieuc@gmail.com>
 */
class Race
{
     /**
     * @Type("int")
     */
    private $season;
     /**
     * @Type("int")
     */
    private $round;
     /**
     * @Type("string")
     */
    private $name;
      /**
     * @Type("BrieucThomas\ErgastClient\Model\Circuit")
     */
    private $circuit;
     /**
     * @Type("datetime<Y-m-d|>")
     */
    private $date;
    /**
     * @Type("datetime<H:i:sT|>")
     */
    private $time;
    /**
     * @Type("string")
     */
    private $url;
       /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Qualifying>")
     */
    private $qualifying;
       /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Result>")
     */
    private $results;
       /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Lap>")
     */
    private $laps;
       /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\PitStop>")
     */
    private $pitStops;

    public function __construct($data)
    {
        $this->season = $data->season;
        $this->round = $data->round;
        $this->url = $data->url;
        $this->name = $data->raceName;
        $this->circuit = new \BrieucThomas\ErgastClient\Model\Circuit($data->Circuit);
        $this->date =  \DateTime::createFromFormat("Y-m-d|",$data->date);
        
        if(isset($data->time))
        {
            $this->time = \DateTime::createFromFormat("H:i:sT",$data->time);
        }
        
        $this->qualifying = new ArrayCollection();
        $this->results = new ArrayCollection();
        $this->laps = new ArrayCollection();
        $this->pitStops = new ArrayCollection();

        // fill optional ArrayCollection
        if(isset($data->PitStops))
        {
            $this->pitStops = $this->fillPitStopsCollection($data->PitStops);
        }
        if(isset($data->QualifyingResults))
        {             
            $this->qualifying = $this->fillQualifyingCollection($data->QualifyingResults);
        }
        if(isset($data->Laps))
        {             
            $this->laps = $this->fillLapsCollection($data->Laps);
        }
        if(isset($data->Results))
        {             
            $this->results = $this->fillResultsCollection($data->Results);
        }
    }

    private function fillResultsCollection($data) : ArrayCollection
    {
        $ret = new ArrayCollection();
        foreach($data as $result)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\Result($result);
        }
        return $ret;
    }

    private function fillLapsCollection($data) : ArrayCollection
    {
        $ret = new ArrayCollection();
        foreach($data as $lap)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\Lap($lap);
        }
        return $ret;
    }

    private function fillPitStopsCollection($data) : ArrayCollection
    {
        $ret = new ArrayCollection();
        foreach($data as $pitstop)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\PitStop($pitstop);
        }
        return $ret;
    }

    private function fillQualifyingCollection($data) : ArrayCollection
    {
        $ret = new ArrayCollection();
        foreach($data as $qualifying)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\Qualifying($qualifying);
        }
        return $ret;
    }

    /**
     * Returns the season year on 4 digits.
     *
     * @return int
     */
    public function getSeason(): int
    {
        return $this->season;
    }

    public function getRound(): int
    {
        return $this->round;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCircuit(): Circuit
    {
        return $this->circuit;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return \DateTime|null
     */
    public function getTime()
    {
        return $this->time;
    }

    public function getStartDate(): \DateTime
    {
        $startDate = clone $this->date;
        $time = $this->getTime();

        if ($time instanceof \DateTime) {
            $startDate->setTime($time->format('H'), $time->format('i'), $time->format('s'));
        }

        return $startDate;
    }

    /**
     * Returns the race Wikipedia page url.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    public function getQualifying(): ArrayCollection
    {
        return $this->qualifying;
    }

    public function getResults(): ArrayCollection
    {
        return $this->results;
    }

    public function getLaps(): ArrayCollection
    {
        return $this->laps;
    }

    public function getPitStops(): ArrayCollection
    {
        return $this->pitStops;
    }
}
