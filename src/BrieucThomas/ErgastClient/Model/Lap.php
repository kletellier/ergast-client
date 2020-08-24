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
class Lap
{
     /**
     * @Type("int")
     */
    private $number;
     /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Timing>")
     */
    private $timing;

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getTiming(): ArrayCollection
    {
        return $this->timing;
    }
}
