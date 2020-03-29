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

            $loginModel = $app->load->model('Login');

            $ignorePages = ['/user/login', '/user/login-user'];

            $currentRoute = $app->route->currentRouteUrl();

            if ( ($isNotLogged = ! $loginModel->isLogged() ) AND ! in_array($currentRoute , $ignorePages)) {

                return $app->url->redirectTo('/user/login');

            }


            if($isNotLogged) {
                return false;
            }

            $user = $loginModel->user();

            $usersGroupsModel = $app->load->model('UsersGroups');

            $usersGroups = $usersGroupsModel->get($user->users_group_id);


            //TODO:: active Redirect If Url Not In Array
//            if (! in_array($currentRoute , $usersGroups->pages)) {
//                return $app->url->redirectTo('/');
//            }
        }
        return $next;
    }



}