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
