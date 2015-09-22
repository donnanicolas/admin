<?php

namespace App\Helpers;

class DNSSECHelper {
    public static function rectifyZone($domain)
    {
        $op = array();
        exec("pdnssec rectify-all-zones", $op);
        Log::error('pdnssec');
        Log::error($op);
    }
}
