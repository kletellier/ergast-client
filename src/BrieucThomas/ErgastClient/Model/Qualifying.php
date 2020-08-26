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
class Qualifying
{

      /**
     * @Type("BrieucThomas\ErgastClient\Model\Driver")
     */
    private $driver;
      /**
     * @Type("BrieucThomas\ErgastClient\Model\Constructor")
     */
    private $constructor;
    /**
     * @Type("int")
     */
    private $number;
    /**
     * @Type("int")
     */
    private $position;
    /**
     * @Type("string")
     */
    private $q1;
    /**
     * @Type("string")
     */
    private $q2;
    /**
     * @Type("string")
     */
    private $q3;

    public function __construct($data)
    {
        $this->driver = new \BrieucThomas\ErgastClient\Model\Driver($data->Driver);
        $this->constructor = new \BrieucThomas\ErgastClient\Model\Constructor($data->Constructor);
        $this->number = $data->number;
        $this->position = $data->position;
        if(isset($data->Q1)){$this->q1 = $data->Q1;}
        if(isset($data->Q2)){$this->q2 = $data->Q2;}
        if(isset($data->Q3)){$this->q3 = $data->Q3;}
        
    }

    public function getDriver(): Driver
    {
        return $this->driver;
    }

    public function getConstructor(): Constructor
    {
        return $this->constructor;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getQ1()
    {
        return $this->q1;
    }

    public function getQ2()
    {
        return $this->q2;
    }

    public function getQ3()
    {
        return $this->q3;
    }
}
