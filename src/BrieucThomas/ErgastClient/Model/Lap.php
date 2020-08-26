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

    public function __construct($data)
    {
        $this->number = $data->number;
        $this->timing = $this->fillTimingsCollection($data->Timings,$this->number); 
    }

    private function fillTimingsCollection($data,$lap) : ArrayCollection
    {
        $ret = new ArrayCollection();
        foreach($data as $timing)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\Timing($timing,$lap);
        }
        return $ret;
    } 

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getTiming(): ArrayCollection
    {
        return $this->timing;
    }
}
