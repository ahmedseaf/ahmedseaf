<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 02/12/2019
 * Time: 04:40 م
 */

namespace App\Middleware;

use System\Application;

interface MiddlewareInterface
{
    public function handle(Application $app, $next);




}