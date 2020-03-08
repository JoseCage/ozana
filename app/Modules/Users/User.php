<?php

namespace Ozana\Modules\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Ozana\Traits\UuidTrait;
use Ozana\Modules\Events\Event;
use Ozana\Modules\WatchLists\WatchList;
use Ozana\Modules\WatchLists\MovieWatchList;

/**
* User class
*/
class User extends Authenticatable
{
    use Notifiable, UuidTrait;

    /**
     * Disable auto-incrementing the primary key field for this model.
     *
     * @var bool $incrementing
    */
    public $incrementing = false;
    /**
     * Override the primary key type.
     *
     * @var string keyType
    */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username',
        'phone', 'avatar', 'provider_id', 'provider',
        'access_token', 'password', 'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function watchlists()
    {
        return $this->hasMany(WatchList::class);
    }

}
