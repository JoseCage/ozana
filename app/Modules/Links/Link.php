<?php

namespace Ozana\Modules\Links;

use Illuminate\Database\Eloquent\Model;

use Ozana\Traits\UuidTrait as Uuids;
use Ozana\Modules\WatchLists\WatchList;

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
    protected $fillable = [
        'url', 'watchlist_id'
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

    public function watchlist()
    {
        return $this->belongsTo(WatchList::class);
    }

}
