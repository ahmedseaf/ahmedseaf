<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 02/12/2019
 * Time: 04:40 م
 */

namespace App\Middleware\Admin;

use System\Application;
use App\Middleware\MiddlewareInterface;

class Auth implements MiddlewareInterface
{

    public function handle(Application $app, $next)
    {
        if(strpos($app->request->url(), '/admin') === 0 ) {
//            $app->route->callFirst(function ($app) {
//                $app->load->action('Access' , 'index');
//            });

            $loginModel = $app->load->model('Login');

            $ignorePages = ['/admin/login', '/admin/login/submit'];

            $currentRoute = $app->route->currentRouteUrl();

            if ( ($isNotLogged = ! $loginModel->isLogged() ) AND ! in_array($currentRoute , $ignorePages)) {

                return $app->url->redirectTo('/admin/login');

            }


            if($isNotLogged) {
                return false;
            }

            $user = $loginModel->user();

            $usersGroupsModel = $app->load->model('UsersGroups');
            // pre($user);
            $usersGroups = $usersGroupsModel->get($user->users_group_id);
            //pred($usersGroups);

            //echo $currentRoute ; die;
            if (! in_array($currentRoute , $usersGroups->pages)) {
                return $app->url->redirectTo('/');
            }
        }
        return $next;
    }



}