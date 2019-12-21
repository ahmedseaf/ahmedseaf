<?php


namespace System;



abstract class Controller
{
    protected $app;

    protected $errors = [];



    public function __construct(Application $app)
    {
        $this->app = $app;
    }




    public function __get($key)
    {

        return $this->app->get($key);

    }




    public function json($data)
    {
        return json_encode($data);
    }

    public function ToArray($data)
    {
        return $this->stdClassToArray($data);
    }

    private function stdClassToArray($data)
    {
        $array = json_decode(json_encode($data), true);
        return  array_shift($array);


    }

}