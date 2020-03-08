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
        $this->userLinksRoutes();
        $this->publicWatchListRoutes();
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
        $this->router->group(['prefix' => 'movies', 'middleware' => 'cors', 'namespace' => '\WatchLater\Support\Http\Controllers\Api'], function($movietype){
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
        $this->router->group(['prefix' => 'me/watchlists', 'middleware' => 'cors', 'namespace' => '\WatchLater\Support\Http\Controllers\Api'], function($watchlist){
            $watchlist->get('/', 'WatchListController@myList')->name('user.watchlists');
            $watchlist->get('/{watchlist}', 'WatchListController@watchList')->name('user.watchlists.find');
            $watchlist->post('/', 'WatchListController@addToList')->name('user.watchlists.add');
        });
    }

    /**
     * User WatchList routes
     *
     * @return void
     */
    protected function publicWatchListRoutes()
    {
        $this->router->group([/*'prefix' => 'links', 'middleware' => 'auth.jwt'*/ 'namespace' => '\WatchLater\Support\Http\Controllers\Api'], function($watchlist){
            $watchlist->get('/watchlists', 'WatchListController@publicWatchLists')->name('watchlists');
            //$watchlist->get('/share/{link}', 'LinkController@redirectToList')->name('watchlists.redirect');
            $watchlist->get('/watchlists/{watchlist}', 'WatchListController@publicWatchList')->name('watchlists.find');
        });
    }

    /**
     * User WatchList links routes
     *
     * @return void
     */
    protected function userLinksRoutes()
    {
        $this->router->group(['prefix' => 'me/links'/*, 'middleware' => 'auth.jwt'*/, 'namespace' => '\WatchLater\Support\Http\Controllers\Api'], function($link){
            $link->get('/', 'LinkController@index')->name('links');
            $link->post('/share/{watchlist}', 'LinkController@generateLink')->name('links.add');
        });
    }

}
