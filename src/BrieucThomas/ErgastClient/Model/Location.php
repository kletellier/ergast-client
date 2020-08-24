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
class Location
{
    /**
     * @Type("string")
     */
    private $locality;
    /**
     * @Type("string")
     */
    private $country;
    /**
     * @Type("float")
     */
    private $latitude;
    /**
     * @Type("float")
     */
    private $longitude;
    /**
     * @Type("float")
     */
    private $altitude;

    public function getLocality(): string
    {
        return $this->locality;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Returns the latitude of the location's position.
     *
     * @return float|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Returns the longitude of the location's position.
     *
     * @return float|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Returns the altitude of the location's position.
     *
     * @return float|null
     */
    public function getAltitude()
    {
        return $this->altitude;
    }
}
