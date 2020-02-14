<?php

namespace WatchLater\Modules\Links;

use Illuminate\Database\Eloquent\Model;

use WatchLater\Traits\UuidTrait as Uuids;

class Link extends Model
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
    protected $fillable = [];

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
