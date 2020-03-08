<?php

namespace Ozana\Units\Authentication\Routes;

use Ozana\Support\Http\Routing\Router;

/**
 * Web routes class
 *
 * @category Web
 *
 * @package Ozana
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
        $this->authRoutes();
        $this->channelsRoutes();
        $this->userWatchListRoutes();
        $this->movieRoutes();
        $this->movieTypeRoutes();
        $this->userLinksRoutes();
        $this->publicWatchListRoutes();
    }
    
    /**
     * User Authentication routes
     */
    protected function authRoutes()
    {
        $this->router->group(['prefix' => 'auth', 'namespace' => 'Auth'], function($auth){
            $auth->post('login', 'AuthenticateController@login')->name('login');
            $auth->post('register', 'AuthenticateController@register')->name('register');
        });
    }

    protected function channelsRoutes()
    {
        $this->router->group(['prefix' => 'channels', 'namespace' => '\Ozana\Support\Http\Controllers\Api'], function($channel){
            $channel->get('/', 'ChannelController@index')->name('channels');
            $channel->post('/', 'ChannelController@addChannel')->name('channels.add');
        });
    }

    protected function movieTypeRoutes()
    {
        $this->router->group(['prefix' => 'movietypes', 'namespace' => '\Ozana\Support\Http\Controllers\Api'], function($movietype){
            $movietype->get('/', 'MovieTypeController@index')->name('movietypes');
        });
    }

    protected function movieRoutes()
    {
        $this->router->group(['prefix' => 'movies', 'middleware' => 'cors', 'namespace' => '\Ozana\Support\Http\Controllers\Api'], function($movietype){
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
        $this->router->group(['prefix' => 'me/watchlists', 'middleware' => 'cors', 'namespace' => '\Ozana\Support\Http\Controllers\Api'], function($watchlist){
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
        $this->router->group([/*'prefix' => 'links', 'middleware' => 'auth.jwt'*/ 'namespace' => '\Ozana\Support\Http\Controllers\Api'], function($watchlist){
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
        $this->router->group(['prefix' => 'me/links'/*, 'middleware' => 'auth.jwt'*/, 'namespace' => '\Ozana\Support\Http\Controllers\Api'], function($link){
            $link->get('/', 'LinkController@index')->name('links');
            $link->post('/share/{watchlist}', 'LinkController@generateLink')->name('links.add');
        });
    }

}
