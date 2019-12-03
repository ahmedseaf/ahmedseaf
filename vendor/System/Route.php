<?php


namespace System;


use Exception;

class Route
{
    /***
     * Next Flag For Middleware
     *
     * @const string
     */
    const NEXT = '__NEXT__';

    /****
     * prefix url
     * @var string
     */
    private $prefix;

    /****
     * group middleware
     * @var array
     */
    private $groupMiddleware = [];

    /****
     * group base controller
     * @var string
     */
    private $baseController;

    private $app;

    private $routes = [];

    private $notFound;

    private $current = [];

    /**
     * Calls Container
     *
     * @var array
     */
    private $calls = [];


    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /****
     * Add routes to group
     * @param array $groupOptions
     * @param callable $callback
     *
     * @return $this
     */
    public function group(array $groupOptions, callable $callback)
    {
        $prefix     = array_get($groupOptions , 'prefix');
        $controller = array_get($groupOptions , 'controller');
        $middleware = (array) array_get($groupOptions , 'middleware');

        if (($this->prefix AND $prefix != $this->prefix) OR
            ($prefix AND strpos($this->app->request->url(), $prefix) !== 0)) {
            //die($prefix);
            return $this;
        }
        //echo $this->app->request->url(); die;
        if ($prefix) {
            $this->prefix = $prefix;
        }

        $this->baseController   = $controller;
        $this->groupMiddleware  = $middleware;

        call_user_func($callback, $this);

        return $this;
    }

    public function package($url, $controller)
    {
        $this->add("$url", $controller );
        $this->add("$url/add", "$controller@add",             'POST');
        $this->add("$url/submit", "$controller@submit",       'POST');
        $this->add("$url/edit/:id", "$controller@edit",       'POST');
        $this->add("$url/save/:id", "$controller@save",       'POST');
        $this->add("$url/delete/:id", "$controller@delete",   'POST');

        return $this;

    }

    public function add($url, $action, $requestMethod = 'GET', array $middleware = [])
    {
        if ($this->prefix) {
            if ($this->prefix != '/') {
                $url = rtrim($this->prefix . $url, '/');
            }
            if (! $url) $url = '/';
        }


        if ($this->baseController) {
            $action = $this->baseController . '/' . $action;
           // echo $this->app->request->url();
        }

        if ($this->groupMiddleware) {
            $middleware = array_merge($this->groupMiddleware, $middleware);
        }
        $route = [
            'url' => $url,
            'pattern' => $this->generatePattern($url),
            'action' => $this->getAction($action),
            'method' => strtoupper($requestMethod),
            'middleware' => $middleware,
        ];
        $this->routes[] = $route;
    }


    public function notFound($url)

    {
        $this->notFound = $url;
    }


    public function routes()
    {
        return $this->routes;
    }


    public function getProperRoute()
    {
        $middlewareInterface = 'App\\Middleware\\MiddlewareInterface';
        foreach ($this->routes as $route) {

            if ($this->isMatching($route['pattern']) AND $this->isMatchingRequestMethod($route['method'])) {
                $this->current = $route;

                // route found
                // wen need to see if the current route has any middleware
                $output = '';
                if ($route['middleware']) {
                    // now we will be loop through the middleware
                    foreach ($route['middleware'] AS $middleware) {
                        // we need to check first if the middleware class
                        // implements the middleware
                        // $middleware value = Admin\Auth
                        // $middleware class = App\Middleware\Admin\Auth
                        $middlewareClass = 'App\\Middleware\\' . $middleware;
                        // check if class implement
                        if (!in_array($middlewareInterface, class_implements($middlewareClass))) {
                            throw new Exception(sprintf('%s must implement %s', $middleware, $middlewareInterface));
                        }
                        $middlewareObject = new $middlewareClass;
                        // we need to get the output of the handle method to check it
                        $output = $middlewareObject->handle($this->app, static::NEXT);
                        if ($output) {
                            if ($output === static::NEXT) {
                                $output = '';
                            } else {
                                break;
                            }
                        }
                    }
                }

                // if there is an output value,
                // then we are not going to execute the route controller
                // otherwise we are going to execute our route controller
                if ($output == '') {
                    $arguments = $this->getArgumentsFrom($route['pattern']);
                    list($controller, $method) = explode('@', $route['action']);
                    $output = (string)$this->app->load->action($controller, $method, $arguments);
                }

                return $output;
            }
        }
        //TODO mack the Redirect To 404

        echo 'This Page Not Found';
        //return $this->app->url->redirectTo($this->notFound);
    }


    private function isMatching($pattern)
    {

        return preg_match($pattern, $this->app->request->url());
    }


    private function isMatchingRequestMethod($routeMethod)
    {
        return $routeMethod == $this->app->request->method();
    }


    private function getArgumentsFrom($pattern)
    {
        preg_match($pattern, $this->app->request->url(), $matches);
        array_shift($matches);
        return $matches;

    }


    private function generatePattern($url)
    {
        $pattern = '#^';

        $pattern .= str_replace([':text', ':id' , ':any'],
            ['([\p{Arabic}a-zA-Z0-9-_]+)', '(\d+)' , '(.*)'], $url);

        $pattern .= '$#u';

        return $pattern;
    }


    private function getAction($action)
    {
        $action = str_replace('/', '\\', $action);

        return strpos($action, '@') !== false ? $action : $action . '@index';
    }


    public function currentRouteUrl()
    {
        return $this->current['url'];
    }

//    /**
//     * Call the given callback before calling the main controller
//     *
//     * @var callable $callable
//     * @return $this
//     */
//    public function callFirst(callable $callable)
//    {
//        $this->calls['first'][] = $callable;
//
//        return $this;
//    }
//
//    /**
//     * Determine if there are any callbacks that will be called before
//     * calling the main controller
//     *
//     * @return bool
//     */
//    public function hasCallsFirst()
//    {
//        return ! empty($this->calls['first']);
//    }
//
//    /**
//     * Call All callbacks that will be called before
//     * calling the main controller
//     *
//     * @return bool
//     */
//    public function callFirstCalls()
//    {
//        foreach ($this->calls['first'] AS $callback) {
//            call_user_func($callback, $this->app);
//        }
//    }
//


}