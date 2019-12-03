<?php

namespace System;

use Closure;
use Exception;
use Whoops\Handler\PrettyPageHandler;

class Application
{

    private $container = [];


    private static $instance;


    private function __construct(File $file)
    {
        $this->share('file', $file) ;
        $this->loadHelpers();
        // For Errors Handlers
        $whoops = new \Whoops\Run;
        $whoops->prependHandler(new PrettyPageHandler);
        $whoops->register();
        // Get Config Database File
        $this->share('config', $this->file->getTheFile('config.php'));

    }





    public static function getInstance($file = null)
    {
        if (is_null(static::$instance))
        {
            static::$instance = new static($file);
        }

        return static::$instance;
    }



    public function run()
    {
        $this->session->start();

        $this->request->prepareUrl();

        $routes = ['index.php'];

        foreach ($routes AS $route) {
            $this->file->getTheFile('routes/' . $route);
        }

        $output = $this->route->getProperRoute();





        $this->response->setOutput($output);

        $this->response->send();


    }



    public function share($key, $value)
    {
        if($value instanceof Closure){
            $value = call_user_func($value, $this);
        }
        $this->container[$key] = $value;
    }



    private function coreClasses()
    {
        return [
          'request'     => 'System\\Http\\Request',
          'response'    => 'System\\Http\\Response',
          'session'     => 'System\\Session',
          'route'       => 'System\\Route',
          'cookie'      => 'System\\Cookie',
          'load'        => 'System\\Loader',
          'html'        => 'System\\Html',
          'db'          => 'System\\Database',
          'view'        => 'System\\View\\ViewFactory',
          'url'         => 'System\\Url',
          'validator'   => 'System\\Validation',

        ];
    }



    public function __get($key)
    {
        return $this->get($key);
    }





    public function load($class)
    {
        if(strpos($class, 'App') === 0)
        {
            $file = $class . '.php';
        }
        else
        {
            // get file from vendor
            $file = 'vendor/' . $class . '.php';
        }

        if($this->file->exists($file))
        {
            $this->file->getTheFile($file);
        }

    }




    public function get($key)
    {
        if (! $this->isSharing($key))
        {
            if ($this->isCoreAlias($key))
            {
                $this->share($key, $this->creatNewCoreObject($key));
            }
            else
            {
                throw new Exception("$key  Not Found In Application Container");
                //die($key . ' Not Found In Application Container');
            }

        }
        return $this->container[$key];
    }




    public function isSharing($key)
    {
        return isset($this->container[$key]);
    }



    private function isCoreAlias($alias)
    {
        $coreClasses = $this->coreClasses();

        return isset($coreClasses[$alias]);
    }



    private function creatNewCoreObject($alias)
    {
        $coreClasses = $this->coreClasses();

        $object = $coreClasses[$alias];

        return new $object($this);
    }



    private function loadHelpers()
    {
        $this->file->getTheFile('vendor/System/helpers.php');
    }


}
