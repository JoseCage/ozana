<?php

namespace Ozana\Units\Authentication\Routes;

use Ozana\Support\Http\Routing\Router;

/**
 * Web routes classS
 *
 * @category Web
 *
 * @package Ozana
 *
 * @author José Cage <jose.cage@linkasoftwares.com>
 *
 */
class Web extends Router
{
    /**
    * Web routes
    */
    protected function routes()
    {
        $this->homeRoutes();
        $this->authRoutes();
        $this->userWatchListRoutes();
        $this->userMovieListRoutes();
    }

    protected function homeRoutes()
    {
        $this->router->get('me', '\Ozana\Support\Http\Controllers\HomeController@homeAdmin')->name('admin');

        $this->router->get('/', function () {
            return view('welcome');
        });

        /*$this->router->get('/render', function(){
            $user = \LinkaCRM\Modules\Users\User::first();
            return (new \LinkaCRM\Mail\UserRegistered($user))->render();
        });*/

        $this->router->get('/render', function(){
            $user = \Ozana\Modules\Users\User::first();
            return (new \Ozana\Mail\WelcomeUser($user))->render();
        });

    }

    /**
     * User WatchList routes
     *
     * @return void
     */
    protected function userWatchListRoutes()
    {
        $this->router->group(['prefix' => 'me/watchlists', 'middleware' => 'auth', 'namespace' => '\Ozana\Support\Http\Controllers'], function($watchlist){
            $watchlist->get('/', 'WatchListController@myList')->name('watchlists');
            $watchlist->post('/', 'WatchListController@addToList')->name('watchlists.add');
        });
    }

    protected function userMovieListRoutes()
    {
        $this->router->group(['prefix' => 'me/lists', 'middleware' => 'auth', 'namespace' => '\Ozana\Support\Http\Controllers'], function($watchlist){
            $watchlist->get('/', 'MovieListController@index')->name('movielists');
            $watchlist->post('/', 'MovieListController@addToMovieList')->name('movielists.add');
        });
    }

    protected function authRoutes()
    {

        $this->router->group(['prefix' => 'auth', 'namespace' => '\Ozana\Units\Authentication\Http\Controllers'], function(){
            // Social Auth
            $this->router->get('/social/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
            $this->router->get('/social/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');
            // // Normal Auth
            $this->router->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
            $this->router->post('login', 'Auth\LoginController@login');
            $this->router->get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
            $this->router->post('register', 'Auth\RegisterController@register');
            $this->router->post('logout', 'Auth\LoginController@logout')->name('logout');
            // $this->router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
            // $this->router->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
            // $this->router->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
            // $this->router->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        });
    }
}
