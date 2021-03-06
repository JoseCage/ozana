<?php

namespace Ozana\Modules\WatchLists;

use Illuminate\Database\Eloquent\Model;

use Ozana\Traits\UuidTrait as Uuids;
use Ozana\Modules\Users\User;
use Ozana\Modules\Links\Link;

class WatchList extends Model
{
    use Uuids;

    protected $table = 'watchlists';

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
        'name', 'decription', 'user_id'
    ];

    protected $with = [
        'movies'
    ];

    protected $casts = [
        'public' => 'boolean'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'uid'
    ];

    protected $dates = [];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function movieslists()
    {
        return $this->hasMany(MovieWatchList::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->orderBy('release_date', 'asc');
    }

    public function links()
    {
        return $this->hasMany(Link::class, 'watchlist_id');
    }

}
