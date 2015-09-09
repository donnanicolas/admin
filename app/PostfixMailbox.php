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
     * The primary key column
     *
     * @var string
     */
    protected $primaryKey = 'username';

    /**
     * The model's default attributes.
     *
     * @var array
     */
    protected $attributes = [
        'quota' => 0,
    ];

    /**
     * Unfortunatly laravel doesn't have a good way to change the timestamps column names
     * So will do this manually
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

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
        'description',
        'mailboxes',
        'aliases',
        'password',
        'active',
        'name'
     ];

    /**
     * The attributes that should be casted to native types.
     *
     * @TODO Fix this
     * @var array
     */
    // protected $casts = [
    //     'active' => 'boolean',
    // ];

    public function setPasswordAttribute($value)
    {
        //$this->attributes['password'] = \Hash::make($value);
        $this->attributes['password'] = crypt($value);
    }

    /**
     * Get the domain of the mailbox
     * We use a diferent name since the table already has domain attribute
     */
    public function domainRel()
    {
        return $this->belongsTo('App\PostfixDomain', 'domain', 'domain');
    }
}
