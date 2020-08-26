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

/**
 * @author Brieuc Thomas <tbrieuc@gmail.com>
 */
class Response
{
    /**
     * @Type("string")
     */
    private $series;
    /**
     * @Type("string")
     */
    private $url;
    /**
     * @Type("int")
     */
    private $limit;
    /**
     * @Type("int")
     */
    private $offset;
    /**
     * @Type("int")
     */
    private $total;
    /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Season>")
     */
    private $seasons;
    /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Race>")
     */
    private $races;
    /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Standings>")
     */
    private $standings;
    /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Circuit>")
     */
    private $circuits;
    /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Driver>")
     */
    private $drivers;
    /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Constructor>")
     */
    private $constructors;
    /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\FinishingStatus>")
     */
    private $finishingStatues;

    // inflate from JSON
    public function __construct($json)
    {
        try{
            $data = json_decode($json);
            $MRData = $data->MRData;

            // retrieve common data

            $this->series = $MRData->series;
            $this->url = $MRData->url;
            $this->limit = $MRData->limit;
            $this->offset = $MRData->offset;
            $this->total = $MRData->total;
            $this->drivers = new ArrayCollection();
            $this->seasons = new ArrayCollection();
            $this->constructors = new ArrayCollection();
            $this->finishingStatues = new ArrayCollection();
            $this->circuits = new ArrayCollection();
            $this->standings = new ArrayCollection();
            $this->races = new ArrayCollection();

            // retrieve all collections
            if(isset($MRData->DriverTable))
            {
                $this->drivers = $this->fillDriversCollection($MRData->DriverTable);
            }
            if(isset($MRData->ConstructorTable))
            {
                $this->constructors = $this->fillConstructorsCollection($MRData->ConstructorTable);
            }
            if(isset($MRData->CircuitTable))
            {
                $this->circuits = $this->fillCircuitsCollection($MRData->CircuitTable);
            }
            if(isset($MRData->StatusTable))
            {
                $this->finishingStatues = $this->fillStatusCollection($MRData->StatusTable);
            }
            if(isset($MRData->SeasonTable))
            {
                $this->seasons = $this->fillSeasonsCollection($MRData->SeasonTable);
            }
            if(isset($MRData->StandingsTable))
            {
                $this->standings = $this->fillStandingsCollection($MRData->StandingsTable);
            }
        }
        catch(\Exception $ex)
        {
            var_dump($ex->getMessage());
        }     
    }

    private function fillDriversCollection($data) : ArrayCollection
    {
        $ret = new ArrayCollection();
        foreach($data->Drivers as $driver)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\Driver($driver);
        }
        return $ret;
    }

    private function fillStandingsCollection($data) : ArrayCollection
    {  
        $ret = new ArrayCollection();
        foreach($data->StandingsLists as $standings)
        {           
            $ret[] = new \BrieucThomas\ErgastClient\Model\Standings($standings);
        }
        return $ret;
    }

    private function fillSeasonsCollection($data) : ArrayCollection
    {
        $ret = new ArrayCollection();
        foreach($data->Seasons as $season)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\Season($season);
        }
        return $ret;
    }

    private function fillConstructorsCollection($data) : ArrayCollection
    {
        $ret = new ArrayCollection();
        foreach($data->Constructors as $constructor)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\Constructor($constructor);
        }
        return $ret;
    }

    private function fillCircuitsCollection($data) : ArrayCollection
    {        
        $ret = new ArrayCollection();
        foreach($data->Circuits as $circuit)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\Circuit($circuit);
        }        
        return $ret;
    }

    private function fillStatusCollection($data) : ArrayCollection
    {        
        $ret = new ArrayCollection();
        foreach($data->Status as $status)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\FinishingStatus($status);
        }  
        return $ret;
    }
    

    public function getSeries(): string
    {
        return $this->series;
    }

    /**
     * Returns the request url.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getSeasons(): ArrayCollection
    {
        return $this->seasons;
    }

    public function getRaces(): ArrayCollection
    {
        return $this->races;
    }

    public function getStandings(): ArrayCollection
    {
        return $this->standings;
    }

    public function getCircuits(): ArrayCollection
    {
        return $this->circuits;
    }

    public function getDrivers(): ArrayCollection
    {
        return $this->drivers;
    }

    public function getConstructors(): ArrayCollection
    {
        return $this->constructors;
    }

    public function getFinishingStatues(): ArrayCollection
    {
        return $this->finishingStatues;
    }
}
