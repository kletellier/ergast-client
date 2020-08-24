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
class FastestLap
{
    /**
     * @Type("int")
     */
    private $rank;
    /**
     * @Type("int")
     */
    private $lap;
    /**
     * @Type("string")
     */
    private $time;
    /**
     * @Type("BrieucThomas\ErgastClient\Model\Speed")
     */
    private $averageSpeed;

    public function getRank(): int
    {
        return $this->rank;
    }

    public function getLap(): int
    {
        return $this->lap;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getAverageSpeed(): Speed
    {
        return $this->averageSpeed;
    }
}
