<?php

namespace WatchLater\Units\Authentication\Routes;

use WatchLater\Support\Http\Routing\Router;

/**
 * Web routes class
 *
 * @category Web
 *
 * @package WatchLater
 *
 * @author José Cage <jose.cage@linkasoftwares.com>
 *
 */
class Api extends Router
{
    /**
    * Web routes
    */
    protected function routes()
    {
        //$this->authRoutes();
        $this->channelsRoutes();
        $this->userWatchListRoutes();
        $this->movieRoutes();
        $this->movieTypeRoutes();
    }

    protected function channelsRoutes()
    {
        $this->router->group(['prefix' => 'channels', 'namespace' => '\WatchLater\Support\Http\Controllers\Api'], function($channel){
            $channel->get('/', 'ChannelController@index')->name('channels');
            $channel->post('/', 'ChannelController@addChannel')->name('channels.add');
        });
    }

    protected function movieTypeRoutes()
    {
        $this->router->group(['prefix' => 'movietypes', 'namespace' => '\WatchLater\Support\Http\Controllers\Api'], function($movietype){
            $movietype->get('/', 'MovieTypeController@index')->name('movietypes');
        });
    }

    protected function movieRoutes()
    {
        $this->router->group(['prefix' => 'movies', 'namespace' => '\WatchLater\Support\Http\Controllers\Api'], function($movietype){
            $movietype->get('/', 'MovieController@index')->name('movies');
        });
    }

    /**
     * User WatchList routes
     *
     * @return void
     */
    protected function userWatchListRoutes()
    {
        $this->router->group(['prefix' => 'me/watchlists'/*, 'middleware' => 'auth.jwt'*/, 'namespace' => '\WatchLater\Support\Http\Controllers\Api'], function($watchlist){
            $watchlist->get('/', 'WatchListController@myList')->name('watchlists');
            $watchlist->get('/{watchlist}', 'WatchListController@watchList')->name('watchlists.find');
            $watchlist->post('/', 'WatchListController@addToList')->name('watchlists.add');
        });
    }

}
