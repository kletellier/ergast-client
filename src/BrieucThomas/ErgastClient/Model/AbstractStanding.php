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
abstract class AbstractStanding
{
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
    private $wins;
    
    public function __construct()
    {
        
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getPositionText(): string
    {
        return $this->positionText;
    }

    public function getPoints(): float
    {
        return $this->points;
    }

    public function getWins(): int
    {
        return $this->wins;
    }
}
