<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostfixAlias extends Model
{
    /**
     * The connection for this model
     *
     * @var string
     */
    protected $connection = 'postfix';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alias';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
