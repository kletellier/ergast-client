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
class Driver
{
    /**
     * @Type("string")
     */
    private $id;
    /**
     * @Type("string")
     */
    private $code;
    /**
     * @Type("int")
     */
    private $number;
    /**
     * @Type("string")
     */
    private $givenName;
    /**
     * @Type("string")
     */
    private $familyName;
    /**
     * @Type("string")
     */
    private $birthDate;
    /**
     * @Type("string")
     */
    private $nationality;
    /**
     * @Type("string")
     */
    private $url;

    /**
     * Returns the driver slug.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Returns the driver initials as three letter code.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the driver permanent number.
     *
     * Since the start of the 2014 Formula One season, drivers
     * have to choose an available starting number before entering
     * their first Grand Prix. Drivers carry this number throughout
     * their F1 career.
     *
     * @return int|null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Returns the driver first name.
     *
     * @return string
     */
    public function getGivenName(): string
    {
        return $this->givenName;
    }

    /**
     * Returns the driver last name.
     *
     * @return string
     */
    public function getFamilyName(): string
    {
        return $this->familyName;
    }

    /**
     * Returns the driver birth date.
     *
     * @return \DateTime|null
     */
    public function getBirthDate()
    {
        if (empty($this->birthDate)) {
            return null;
        }

        return \DateTime::createFromFormat('Y-m-d|', $this->birthDate);
    }

    /**
     * Returns the driver nationality.
     *
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * Returns the driver Wikipedia page url.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
