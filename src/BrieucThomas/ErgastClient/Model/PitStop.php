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
class PitStop
{
    /**
     * @Type("string")
     */
    private $driverId;
    /**
     * @Type("int")
     */
    private $stop;
    /**
     * @Type("int")
     */
    private $lap;
    /**
     * @Type("datetime<H:i:s>")
     */
    private $time;
   /**
     * @Type("double")
     */
    private $duration;

    public function __construct($data)
    {
        $this->driverId = $data->driverId;
        $this->stop = $data->stop;
        $this->lap = $data->lap;
        $this->time = \DateTime::createFromFormat("H:i:s",$data->time);
        $this->duration = (float)$data->duration;
    }

    public function getDriverId(): string
    {
        return $this->driverId;
    }

    public function getDuration(): float
    {
        return $this->duration;
    }

    public function getLap(): int
    {
        return $this->lap;
    }

    public function getStop(): int
    {
        return $this->stop;
    }

    public function getTime(): \DateTime
    {
        return $this->time;
    }
}
