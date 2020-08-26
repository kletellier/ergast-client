<?php

/*
 * (c) Brieuc Thomas <tbrieuc@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrieucThomas\ErgastClient\Model;

use JMS\Serializer\Annotation\Type;

/**
 * @author Brieuc Thomas <tbrieuc@gmail.com>
 */
class Result
{
    /**
     * @Type("BrieucThomas\ErgastClient\Model\Driver")
     */
    private $driver;
    /**
     * @Type("BrieucThomas\ErgastClient\Model\Constructor")
     */
    private $constructor;
     /**
     * @Type("int")
     */
    private $number;
     /**
     * @Type("int")
     */
    private $position;
     /**
     * @Type("string")
     */
    private $positionText;
     /**
     * @Type("float")
     */
    private $points;
     /**
     * @Type("int")
     */
    private $grid;
     /**
     * @Type("int")
     */
    private $laps;
    /**
     * @Type("BrieucThomas\ErgastClient\Model\FinishingStatus")
     */
    private $status;
     /**
     * @Type("BrieucThomas\ErgastClient\Model\Time")
     */
    private $time;
     /**
     * @Type("BrieucThomas\ErgastClient\Model\FastestLap")
     */
    private $fastestLap;

    public function __construct($data)
    {
        
        $this->driver = new \BrieucThomas\ErgastClient\Model\Driver($data->Driver);
        $this->constructor = new \BrieucThomas\ErgastClient\Model\Constructor($data->Constructor);
        $this->number = $data->number;
        $this->position = $data->position;
        $this->positionText = $data->positionText;
        $this->points = (float)$data->points;
        $this->grid = $data->grid;
        $this->laps = $data->laps;    
        if(isset($data->Time))
        {
            $this->time = new \BrieucThomas\ErgastClient\Model\Time($data->Time);   
        }
        if(isset($data->FastestLap))
        {
            $this->fastestLap = new \BrieucThomas\ErgastClient\Model\FastestLap($data->FastestLap);
        }      
        $status = new \stdClass();
        $status->status = $data->status;
        $status->statusId = -1;
        $status->count = 1;

        $this->status = new \BrieucThomas\ErgastClient\Model\FinishingStatus($status);
         
    }

    public function getDriver(): Driver
    {
        return $this->driver;
    }

    public function getConstructor(): Constructor
    {
        return $this->constructor;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getStatus(): FinishingStatus
    {
        return $this->status;
    }

    public function getPositionText(): string
    {
        return $this->positionText;
    }

    public function getPoints(): float
    {
        return $this->points;
    }

    public function getLaps(): int
    {
        return $this->laps;
    }

    public function getGrid(): int
    {
        return $this->grid;
    }

    public function getFastestLap()
    {
        return $this->fastestLap;
    }
}
