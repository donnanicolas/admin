<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostfixDomain extends Model
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
    protected $table = 'domain';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The primary key column
     *
     * @var string
     */
    protected $primaryKey = 'domain';

    /**
     * Set the attributes that can be mass filled
     *
     * @var array
     */
     public $fillable = [
        'domain',
        'description',
        'mailboxes',
        'aliases'
     ];

    /**
     * The attributes that should be casted to native types.
     * @TODO Fix this
     *
     * @var array
     */
    // protected $casts = [
    //     'active' => 'boolean',
    // ];

    /**
     * Get the mailboxes of a domain
     * We need a different name since the table already has a mailboxes value
     */
    public function mailboxesRel()
    {
        return $this->hasMany('App\PostfixMailbox', 'domain', 'domain');
    }
}
