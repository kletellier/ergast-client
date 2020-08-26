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
class Speed
{
     /**
     * @Type("float")
     */
    private $value;
     /**
     * @Type("string")
     */
    private $units;

    public function __construct($data)
    {
        $this->units = $data->units;
        $this->value = (float)$data->speed;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getUnits(): string
    {
        return $this->units;
    }
}
