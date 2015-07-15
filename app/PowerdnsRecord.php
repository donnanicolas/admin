<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerdnsRecord extends Model
{
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
}
