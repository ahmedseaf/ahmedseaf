<?php

namespace App\Controllers;

use System\Controller;


class AccessController extends Controller
{

    public function index()
    {

        $loginModel = $this->load->model('Login');

        $ignorePages = ['/admin/login', '/admin/login/submit'];

        $currentPage = $this->request->url();

         if ( ! $loginModel->isLogged() AND ! in_array($currentPage , $ignorePages)) {

         return $this->url->redirectTo('/admin/login');

        }

        $user = $loginModel->user();

        $usersGroupsModel = $this->load->model('UsersGroups');
        // pre($user);
        //$usersGroups = $usersGroupsModel->get($user->users_group_id);
        //pred($usersGroups);
//        if (! in_array($currentPage , $usersGroups->pages)) {
//            return $this->url->redirectTo('/');
//        }
    }











}