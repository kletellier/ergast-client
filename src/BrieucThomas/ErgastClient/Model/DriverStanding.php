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
class DriverStanding extends AbstractStanding
{
     /**
     * @Type("BrieucThomas\ErgastClient\Model\Driver")
     */
    private $driver;
     /**
     * @Type("ArrayCollection<BrieucThomas\ErgastClient\Model\Constructor>")
     */
    private $constructors;

    function __construct($data) {
        parent::__construct($data); 

        $this->driver = new \BrieucThomas\ErgastClient\Model\Driver($data->Driver);
        $this->constructors = $this->fillConstructorsCollection($data);
    }

    private function fillConstructorsCollection($data) : ArrayCollection
    {
        $ret = new ArrayCollection();
        foreach($data->Constructors as $constructor)
        {
            $ret[] = new \BrieucThomas\ErgastClient\Model\Constructor($constructor);
        }
        return $ret;
    }

    public function getDriver(): Driver
    {
        return $this->driver;
    }

    public function getConstructors(): ArrayCollection
    {
        return $this->constructors;
    }
}
