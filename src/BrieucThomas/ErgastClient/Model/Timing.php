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
class Timing
{
    /**
     * @Type("string")
     */
    private $driverId;
    /**
     * @Type("int")
     */
    private $lap;
    /**
     * @Type("int")
     */
    private $position;
    /**
     * @Type("string")
     */
    private $time;

    public function __construct($data,$lap)
    {
        $this->driverId = $data->driverId;
        $this->position = $data->position;
        $this->time = $data->time;
        $this->lap = $lap;
    }

    /**
     * Returns the driver slug.
     *
     * @return string
     */
    public function getDriverId(): string
    {
        return $this->driverId;
    }

    public function getLap(): int
    {
        return $this->lap;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getTime(): string
    {
        return $this->time;
    }
}
