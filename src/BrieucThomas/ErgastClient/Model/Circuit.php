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
class Circuit
{
    /**
     * @Type("string")
     */
    private $id;
    /**
     * @Type("string")
     */
    private $name;
    /**
     * @Type("BrieucThomas\ErgastClient\Model\Location")
     */
    private $location;
    /**
     * @Type("string")
     */
    private $url;

    public function __construct($data)
    {
        $this->id = $data->circuitId;
        $this->name = $data->circuitName;
        $this->url = $data->url;
        $this->location = new \BrieucThomas\ErgastClient\Model\Location($data->Location);
    }

    /**
     * Returns the circuit slug.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Returns the circuit name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the circuit location.
     *
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * Returns the circuit Wikipedia page url.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
