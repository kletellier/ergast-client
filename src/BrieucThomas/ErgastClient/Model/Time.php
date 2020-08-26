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
 * @author Brieuc Thomas <brieuc.thomas@orange.com>
 */
class Time
{
    /**
     * @Type("string")
     */
    private $value;
    /**
     * @Type("int")
     */
    private $millis;

    public function __construct($data)
    {
        $this->value = $this->time;        
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getMillis(): int
    {
        return $this->millis;
    }
}
