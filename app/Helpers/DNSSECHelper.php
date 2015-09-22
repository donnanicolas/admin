<?php

namespace App\Helpers;

use Log;

class DNSSECHelper {
    public static function rectifyZone($domain)
    {
        $op = array();
        exec("pdnssec rectify-all-zones", $op);
        Log::error('pdnssec');
        Log::error($op);
    }
}
