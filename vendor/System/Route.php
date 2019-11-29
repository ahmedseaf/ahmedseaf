<?php


namespace System;


class Route
{

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


    public function add($url, $action, $requestMethod = 'GET')
    {
        $route = [
            'url'       => $url,
            'pattern'   => $this->generatePattern($url),
            'action'    => $this->getAction($action),
            'method'    => strtoupper($requestMethod),
        ];
        $this->routes[] = $route;
    }


    public function notFound($url)

    {
        $this->notFound = $url;
    }


    public function routes() {
        return $this->routes;
    }


    public function getProperRoute()
    {


        foreach ($this->routes as $route) {

            if ($this->isMatching($route['pattern']) AND $this->isMatchingRequestMethod($route['method']))
            {

                $arguments = $this->getArgumentsFrom($route['pattern']);

                list($controller, $method) = explode('@', $route['action']);

                $this->current = $route;

                return [$controller, $method, $arguments];
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

        $pattern .= str_replace([':text', ':id'], ['([a-zA-Z0-9-]+)', '(\d+)'] , $url);

        $pattern .= '$#';

        return $pattern;
    }




    private function getAction($action)
    {
        $action = str_replace('/', '\\', $action);

        return strpos($action, '@') !== false ? $action : $action . '@index';
    }



    public function currentRouteUrl() {
        return $this->current['url'];
    }

    /**
     * Call the given callback before calling the main controller
     *
     * @var callable $callable
     * @return $this
     */
    public function callFirst(callable $callable)
    {
        $this->calls['first'][] = $callable;

        return $this;
    }

    /**
     * Determine if there are any callbacks that will be called before
     * calling the main controller
     *
     * @return bool
     */
    public function hasCallsFirst()
    {
        return ! empty($this->calls['first']);
    }

    /**
     * Call All callbacks that will be called before
     * calling the main controller
     *
     * @return bool
     */
    public function callFirstCalls()
    {
        foreach ($this->calls['first'] AS $callback) {
            call_user_func($callback, $this->app);
        }
    }







}