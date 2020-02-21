<?php

namespace WatchLater\Modules\WatchLists;

use Illuminate\Database\Eloquent\Model;

use WatchLater\Traits\UuidTrait as Uuids;

class MovieWatchList extends Model
{
    use Uuids;

    protected $table = 'movie_watch_list';
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
        'watch_date', 'movie_id', 'channel_id',
        'watch_list_id', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'uid',
        'user_id'
    ];

    // protected $with = [
    //     'watchlist', 'movies'
    // ];

    protected $dates = [];

    // public function movies()
    // {
    //     return $this->hasMany(Movie::class, 'id', 'movie_id');
    // }

    // public function watchlist()
    // {
    //     return $this->belongsTo(WatchList::class, 'id');
    // }

}
