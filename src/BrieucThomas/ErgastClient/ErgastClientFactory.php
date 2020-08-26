<?php

/*
 * (c) Brieuc Thomas <tbrieuc@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrieucThomas\ErgastClient;

use GuzzleHttp\Client as HttpClient;

/**
 * The ergast client factory.
 *
 * @author Brieuc Thomas <tbrieuc@gmail.com>
 */
class ErgastClientFactory
{
    public static function createErgastClient(): ErgastClient
    {
        $httpClient = new HttpClient();

        return new ErgastClient($httpClient);
    }
}
