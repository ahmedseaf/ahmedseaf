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
ob_start();
//        $this->db->data([
//            'firstname' => 'Ahmed',
//            'lastname' => 'Seaf',
//            'email' => 'ahmed_seaf200@yahoo.com',
//            'password' => password_hash(123456, PASSWORD_DEFAULT),
//            'status' => 'enabled',
//            'created' => time(),
//        ])->insert('users');

        //pre($this->db->where('id', 1)->fetch('users'));

        pre($_COOKIE);
        $loginModel = $this->load->model('Login');
//        if ($loginModel->isLogged()) {
//            return $this->url->redirectTo('/admin');
//        }
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

            return $this->url->redirectTo('/admin');
        } else {
            return $this->index();
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