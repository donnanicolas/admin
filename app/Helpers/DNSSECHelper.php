<?php

namespace App\Helpers;

class DNSSECHelper {
    public static function rectifyZone($domain)
    {
        exec("pdnssec rectify-zone $domain");
    }
}
