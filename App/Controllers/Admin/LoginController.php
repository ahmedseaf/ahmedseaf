<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;



use System\Controller;
//require '../PHPMailer/PHPMailerAutoload.php';
class LoginController extends Controller
{

    public function index()
    {

        $loginModel = $this->load->model('Login');

        if ($loginModel->isLogged()) {
            return $this->url->redirectTo('/');

        }
        $data['errors'] = $this->errors;
        $title = $this->html->setTitle('Login');
        $view = $this->view->render('admin/users/register', $data);
        return $this->Layout->render($view, $title);
    }





    public function login()
    {
        if ($this->isValidLogin()) {
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
            $json['redirect'] = $this->url->link('/');
            return $this->json($json);
        } else {
            $json = [] ;
            $json['errors'] = implode('<br>' , $this->errors);
            return $this->json($json);
        }
    }


    public function forget()
    {
       $this->mailer->SMTPDebug =3;
        if (isset($_POST['forget'])) {
            pre($_POST);
        }

    }



    public function register()
    {
        $json = [];
        if(isset($_POST['agree'])) {
            if ($this->isValidRegister()) {
                $this->load->model('Login')->newUser();
                $json['success'] = "Create New Account Successfully Please Check Your Email To Activation";
                $json['redirectTo'] = $this->url->link('/');
            } else {
                $json['errors'] = $this->validator->flattenMessages();
            }
        } else {
            $json['agree'] = "Please Check Agree Button";
        }

        return $this->json($json);


    }




    public function isValidLogin() {
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


    private function isValidRegister(){
        $this->validator->required('user_name', 'First Name  Name Is Required');
        $this->validator->unique('user_name', ['users', 'user_name'], 'User Name already Exist');
        $this->validator->required('email')->email('email');
        $this->validator->unique('email', ['users', 'email'], 'Email already Exist');
        $this->validator->required('password')->minLen('password', 3)->match('password', 'c_password', 'Confirm Password Should Match Password');
        return $this->validator->passes();
    }



}