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
 * @author Brieuc Thomas <brieuc.thomas@orange.com>
 */
class Standings
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
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\DriverStanding>")
     */
    private $driverStandings;
    /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\ConstructorStanding>")
     */
    private $constructorStandings;

    public function getSeason(): int
    {
        return $this->season;
    }

    public function getRound(): int
    {
        return $this->round;
    }

    public function getDriverStandings(): ArrayCollection
    {
        return $this->driverStandings;
    }

    public function getConstructorStandings(): ArrayCollection
    {
        return $this->constructorStandings;
    }
}
