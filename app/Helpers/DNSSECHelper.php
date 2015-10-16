<?php

namespace App\Helpers;

use Log;

class DNSSECHelper {
    //Rectifies DNSSEC
    public static function rectifyZone($domain)
    {
        exec("pdnssec rectify-all-zones", $op);
        Log::info($op);
    }
}
