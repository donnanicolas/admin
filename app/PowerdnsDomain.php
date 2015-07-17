<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerdnsDomain extends Model
{

    public static $Types = [
        'MASTER' => 'MASTER',
        'SLAVE' => 'SLAVE',
        'NATIVE' => 'NATIVE'
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
    protected $table = 'domains';

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
        'name',
        'type',
        'master'
     ];

     public function records()
     {
         return $this->hasMany('\App\PowerdnsRecord', 'domain_id');
     }

     public function zones()
     {
         return $this->hasMany('\App\PowerdnsZone', 'domain_id');
     }
}
