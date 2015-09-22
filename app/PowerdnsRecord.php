<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerdnsRecord extends Model
{

    public static $Types = [
        'A' => 'A',
        'AAAA' => 'AAAA',
        'CNAME' => 'CNAME',
        'HINFO' => 'HINFO',
        'MX' => 'MX',
        'NAPTR' => 'NAPTR',
        'NS' => 'NS',
        'PTR' => 'PTR',
        'SPF' => 'SPF',
        'SRV' => 'SRV',
        'SOA' => 'SOA',
        'SSHFP' => 'SSHFP',
        'TXT' => 'TXT',
        'RP' => 'RP',
    ];

    /**
     * The connection for this model
     *
     * @var string
     */
    protected $connection = 'powerdns';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'records';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Set the attributes that can be mass filled
     *
     * @var array
     */
     public $fillable = [
        'domain_id',
        'content',
        'type',
        'name',
        'ttl',
        'prio',
        'changeDate',
        'disabled',
        'ordername'
     ];

     public function domain()
     {
         return $this->belongsTo('\App\PowerdnsDomain', 'domain_id');
     }

}
