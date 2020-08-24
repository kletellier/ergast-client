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

    public function getDriver(): Driver
    {
        return $this->driver;
    }

    public function getConstructors(): ArrayCollection
    {
        return $this->constructors;
    }
}
