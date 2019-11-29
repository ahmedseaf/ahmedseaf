<?php

namespace App\Controllers;

use System\Controller;


class AccessController extends Controller
{

    public function index()
    {

        $loginModel = $this->load->model('Login');

        $ignorePages = ['/admin/login', '/admin/login/submit'];

        $currentRoute = $this->route->currentRouteUrl();

         if ( ($isNotLogged = ! $loginModel->isLogged() ) AND ! in_array($currentRoute , $ignorePages)) {

         return $this->url->redirectTo('/admin/login');

        }


        if($isNotLogged) {
            return false;
        }

        $user = $loginModel->user();

        $usersGroupsModel = $this->load->model('UsersGroups');
        // pre($user);
        $usersGroups = $usersGroupsModel->get($user->users_group_id);
        //pred($usersGroups);

        //echo $currentRoute ; die;
        if (! in_array($currentRoute , $usersGroups->pages)) {
            return $this->url->redirectTo('/');
        }
    }











}