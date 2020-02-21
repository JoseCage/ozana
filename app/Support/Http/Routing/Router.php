<?php

namespace WatchLater\Support\Http\Routing;

/**
* Class Router
*/
abstract class Router
{
    /**
    * @var array
    */
    protected $options;

    /**
    * @var \Illuminate\Routing\Router
    */
    protected $router;

    /**
    * Router constructor
    */
    public function __construct($options = [])
    {
        $this->options = $options;

        $this->router = app('router');
    }

    /**
    *
    */
    public function register()
    {
        $this->router->group($this->options, function(){
            $this->routes();
        });
    }

    /**
    * @return mixed
    */
    abstract protected function routes();
}
