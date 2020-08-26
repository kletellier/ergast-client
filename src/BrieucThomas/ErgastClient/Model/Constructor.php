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
class Constructor
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
     * @Type("string")
     */
    private $nationality;
    /**
     * @Type("string")
     */
    private $url;

    public function __construct($data)
    {
        $this->id = $data->constructorId;
        $this->name = $data->name;
        $this->url = $data->url;
        $this->nationality = $data->nationality;
    }

    /**
     * Returns the constructor slug.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Returns the constructor name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the constructor nationality.
     *
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * Returns the constructor Wikipedia page url.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
