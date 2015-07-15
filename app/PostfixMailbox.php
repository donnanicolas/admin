<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostfixMailbox extends Model
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
    protected $table = 'mailbox';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be casted to native types.
     *
     * @TODO Fix this 
     * @var array
     */
    // protected $casts = [
    //     'active' => 'boolean',
    // ];

    /**
     * Get the domain of the mailbox
     * We use a diferent name since the table already has domain attribute
     */
    public function domainRel()
    {
        return $this->belongsTo('App\PostfixDomain', 'domain', 'domain');
    }
}
