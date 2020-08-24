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
