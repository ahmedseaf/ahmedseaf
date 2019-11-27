<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;

use System\Controller;

class LoginController extends Controller
{
    public function index()
    {

        $loginModel = $this->load->model('Login');
        //TODO:: chick if user Login

        if ($loginModel->isLogged()) {
            return $this->url->redirectTo('/admin');

        }
        $data['errors'] = $this->errors;
        return $this->view->render('admin/users/login', $data);
    }


    public function submit() {
        if ($this->isValid()) {
            $loginModel = $this->load->model('Login');
            $loginUserModel = $loginModel->user();

            if($this->request->post('remember')) {
                // Set Remember Me In Cookie
                $this->cookie->set('loginUser', $loginUserModel->code);
            } else{
                // Set Remember Me In Session
                $this->session->set('loginUser', $loginUserModel->code);

            }

            $json = [];
            $json['success'] = 'Welcome back ' . $loginUserModel->firstname . ' ' . $loginUserModel->lastname ;
            $json['redirect'] = $this->url->link('/admin');
            return $this->json($json);
        } else {
            $json = [] ;
            $json['errors'] = implode('<br>' , $this->errors);
            return $this->json($json);
        }
    }

    public function isValid() {
        $email = $this->request->post('email');
        $password = $this->request->post('password');

        if(! $email) {
            $this->errors[] = 'Please Insert Email Address';
        } elseif ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Please Insert Valid Email';
        }
        if (! $password) {
            $this->errors[] ='Please Insert Password';
        }

        if ( ! $this->errors) {
            $loginModel = $this->load->model('Login');
            if (! $loginModel->isValidLogin($email, $password)) {
                $this->errors[] = 'Invalid Login Data';
            }
        }

        return empty($this->errors);

    }





}