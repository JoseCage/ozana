<?php

namespace WatchLater\Modules\WatchLists;

use Illuminate\Database\Eloquent\Model;

use WatchLater\Traits\UuidTrait as Uuids;

class Movie extends Model
{
    use Uuids;

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
        'title', 'image', 'release_date', 'movie_type_id'
    ];

    protected $with = [
        'movietype'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'uid',
        'movie_type_id'
    ];

    protected $dates = [];

    public function watchlists()
    {
        return $this->belongsToMany(WatchList::class);
    }

    public function movietype()
    {
        return $this->belongsTo(MovieType::class, 'movie_type_id');
    }

}
