<?php

namespace WatchLater\Services;

use WatchLater\Modules\WatchLists\WatchList;
use WatchLater\Modules\Users\User;
use WatchLater\Modules\Links\Link;

class PublicLinkService
{

    /**
     * Generate a new sharing link for a list
     */
    public static function generate($watchlist, $public)
    {
        $list = WatchList::find($watchlist);

        if (!$list) {

            return response()->json(
                [
                'data' => [
                    'status_code' => '404',
                    'message' => 'List not found'
                ]
                ], 404
            );
        }

        $link = Link::where('watchlist_id', $watchlist)->where('public', true)->first();

        //dd($link);

        if ($link) {

            return response()->json(
                [
                'data' => [
                    'status_code' => '403',
                    'message' => 'A public link for this list already exists',
                    'url' => $link->url
                ]
                ], 403
            );

        }

        $publiclink = Link::create(
            [
            'public' => $public ?? false,
            'url' => config('app.url') . '/api' . '/' . 'share/' . str_random(25),//$list->id,
            'watchlist_id' => $list->id
            ]
        );

        return $publiclink;

    }

}
