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
