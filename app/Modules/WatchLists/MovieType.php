<?php

namespace Ozana\Modules\WatchLists;

use Illuminate\Database\Eloquent\Model;

use Ozana\Traits\UuidTrait as Uuids;

class MovieType extends Model
{
    use Uuids;

    protected $table = 'movie_types';
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
        'name', 'display_name', 'icon', 'description'
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

}
