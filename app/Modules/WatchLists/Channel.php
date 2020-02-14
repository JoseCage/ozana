<?php

namespace WatchLater\Modules\WatchLists;

use Illuminate\Database\Eloquent\Model;

use WatchLater\Traits\UuidTrait as Uuids;

class Channel extends Model
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
        'uuid', 'name', 'icon'
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

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
