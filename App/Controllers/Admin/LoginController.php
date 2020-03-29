<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 01:31 م
 */

namespace App\Controllers\Admin;



use System\Controller;

/**
 * @property mixed cookie
 * @property mixed session
 * @property mixed request
 * @property mixed load
 * @property mixed html
 * @property mixed view
 * @property mixed Layout
 * @property mixed mailer
 * @property mixed validator
 * @property mixed webLayout*@property mixed url
 * @property mixed url
 */

class LoginController extends Controller
{



    public function index()
    {

        $loginModel = $this->load->model('Login');
        if ($loginModel->isLogged()) {
            return $this->url->redirectTo('/');
        }
        $title = $this->html->setTitle('Login');
        $view   = $this->view->render('admin/users/last-login');
        return $this->webLayout->render($view, $title);
    }



    public function checkIfAdmin()
    {
        if(isset($_POST['submitUser']) AND ($_POST['submitUser'] == 'Login'))
        {
            //TODO :: Delete Comment
          //  $checkUser      = rtrim('ahmed_seaf');
            $checkUser      = '1';
           // $checkPassword  = rtrim('ahmed2020@yahoo');
            $checkPassword  = '1';
            if(($_POST['checkName'] == $checkUser) AND ($_POST['checkPassword'] == $checkPassword) ){
                $title = $this->html->setTitle('Login-Admin');
                $view   = $this->view->render('admin/users/admin-login');
                return $this->webLayout->render($view, $title);
            }
        }
    }

    public function adminLogin()
    {
        if ($this->isValidLogin()) {
            $loginModel = $this->load->model('Login');
            $loginUserModel = $loginModel->user();

            // Save User In Session
            $this->session->set('loginUser', $loginUserModel->code);


            return $this->url->redirectTo('/');

        } else {
            return $this->url->redirectTo('/');
        }
    }


    public function newRegister()
    {
        $title = $this->html->setTitle('Register-Admin');
        $view   = $this->view->render('admin/users/new-register');
        return $this->webLayout->render($view, $title);
    }

    public function postRegister()
    {
        $errors =[];
        if(isset($_POST['submitRegister']) AND ($_POST['submitRegister'] == 'Register')) {
            if($this->isValidRegister()) {
                $this->load->model('Login')->newUser();
            }
            else{
                $errors[] = $this->validator->flattenMessages();
            }

        } else{
            return $this->url->redirectTo('/');
        }
        return $this->url->redirectTo('/');
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


//    public function login()
//    {
//        if ($this->isValidLogin()) {
//            $loginModel = $this->load->model('Login');
//            $loginUserModel = $loginModel->user();
//
//            if($this->request->post('remember')) {
//                // Set Remember Me In Cookie
//                $this->cookie->set('loginUser', $loginUserModel->code);
//            } else{
//                // Set Remember Me In Session
//                $this->session->set('loginUser', $loginUserModel->code);
//
//            }
//
//            $json = [];
//            $json['success'] = 'Welcome back ' . $loginUserModel->firstname . ' ' . $loginUserModel->lastname ;
//            $json['redirect'] = $this->url->link('/');
//            return $this->json($json);
//        } else {
//            $json = [] ;
//            $json['errors'] = implode('<br>' , $this->errors);
//            return $this->json($json);
//        }
//    }
//
//
//    public function forget()
//    {
//
//        $json = [];
//        if (isset($_POST['email_forget'])) {
//
//
//            date_default_timezone_set('Egypt');
//            $usersData = $this->load->model('Login')->allEmails($_POST['email_forget']);
//            $user = $this->ToArray($usersData);
//            $now = date('Y-m-d H:i:s');
//            $expireToken = $user['expire_token'];
//            if(! $user) {
//                $json['notEmail'] = 'This Email Not Valid Please Register To New Account';
//
//            }else {
//               // User Is Valid We Well To Check For Token Is Valid
//
//
//                if($expireToken > $now) {
//                    $json['tokenWait'] = 'Please Check For Inbox Or Jink Mail Or Whiting One Hour ';
//                }else{
//                    // Send Email
//                    $this->load->model('Login')->updateToken($user['email']);
//                    $usersData = $this->load->model('Login')->allEmails($user['email']);
//                    $user = $this->ToArray($usersData);
//                    $newToken = $user['token'] ;
//                    $userName = $user['user_name'];
//
//                    $this->mailer->isSMTP();
//                    $this->mailer->Host ='smtp.gmail.com';
//                    $this->mailer->Port = 587;
//                    $this->mailer->SMTPAuth = true;
//                    $this->mailer->SMTPSecure = 'tls';
//                    $this->mailer->Username = 'ahmed.seaf@gmail.com';
//                    $this->mailer->Password = 'Eskander015381883';
//
//                    $this->mailer->setFrom('ahmed.seaf@gmail.com', 'ahmed Seaf');
//                    $this->mailer->addAddress($_POST['email_forget']);
//                    $this->mailer->addReplyTo('ahmed.seaf@gmail.com', 'Information');
//                    $this->mailer->isHTML(true);
//                    $this->mailer->Subject = 'From Ahmed Seaf PHP';
//                    $this->mailer->Body = '<h1 align=center> Reset Your Password From www.mvc.com </h1>';
//                    $this->mailer->Body .= '<div><a href="http://mvc.com/reserpassword?username='.$userName.'&token='.$newToken.'">http://mvc.com/reserpassword?username='.$userName.'&token=?'.$newToken.'</a></div>';
//                    //$this->mailer->AltBody = 'Ahmed Seaf Content Center';
//
//                    if(! $this->mailer->send()) {
//                        $json['errorEmail'] = "error For Send Message";
//                    }else {
//                        $json['successEmail'] = "Send Message Successfully Please Check Your Inbox Or Jink Mail";
//                        $json['redirect'] = $this->url->link('/');
//                    }
//                }
//                return $this->json($json);
//            }
//
//
//        }
//        return $this->json($json);
//    }
//
//    public function reserpassword()
//    {
//        date_default_timezone_set('Egypt');
//        $getToken = $_GET['token'];
//        $getUserName = $_GET['username'];
//        $usersData = $this->load->model('Login')->getUserName($getUserName);
//        $user = $this->ToArray($usersData);
//        $dbUserName = $user['user_name'];
//        $dbToken = $user['token'];
//        $dbExpireToken = $user['expire_token'];
//
//        $now = date('Y-m-d H:i:s');
//        if($dbExpireToken > $now) {
//            if ($getToken == $dbToken AND $getUserName == $dbUserName ) {
//                // reset Password Page
//                $title = $this->html->setTitle('Reset Password');
//                $data['id'] = $user['code'];
//                $view = $this->view->render('admin/users/resetPassword', $data);
//                return $this->Layout->render($view, $title);
//            }
//            else {
//                // hacking Token Return Redirect To Home Page
//                return $this->url->redirectTo('/');
//            }
//        }
//        else {
//
//            $title = $this->html->setTitle('Login');
//            $view = $this->view->render('admin/users/token');
//            return $this->Layout->render($view, $title);
//        }
//
//
//    }
//
//    public function newpassword()
//    {
//        $json = [];
//        if ($this->isValidResetPassword()) {
//            $this->load->model('Login')->updatePassword($_POST['user_id']);
//            $json['success'] = "Update Password Successfully";
//            $json['redirect'] = $this->url->link('/login');
//        } else {
//
//            $json['errors'] = $this->validator->flattenMessages();
//
//
//        }
//        return $this->json($json);
//
//    }
//
//    public function register()
//    {
//        $json = [];
//        if(isset($_POST['agree'])) {
//            if ($this->isValidRegister()) {
//                $this->load->model('Login')->newUser();
//                $json['success'] = "Create New Account Successfully Please Check Your Email To Activation";
//                $json['redirectTo'] = $this->url->link('/');
//            } else {
//                $json['errors'] = $this->validator->flattenMessages();
//            }
//        } else {
//            $json['agree'] = "Please Check Agree Button";
//        }
//
//        return $this->json($json);
//
//
//    }
//
//
//
//
//    private function isValidRegister(){
//        $this->validator->required('user_name', 'First Name  Name Is Required');
//        $this->validator->unique('user_name', ['users', 'user_name'], 'User Name already Exist');
//        $this->validator->required('email')->email('email');
//        $this->validator->unique('email', ['users', 'email'], 'Email already Exist');
//        $this->validator->required('password')->minLen('password', 3)->match('password', 'c_password', 'Confirm Password Should Match Password');
//
//        return $this->validator->passes();
//
//    }
//
//
//    private function isValidResetPassword()
//    {
//        $this->validator->required('password')->minLen('password', 3)->match('password', 'c_password', 'Confirm Password Should Match Password');
//        return $this->validator->passes();
//    }
//
//


}