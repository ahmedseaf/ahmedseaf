<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 02:47 م
 */
namespace App\Models;

use System\Model;

/**
 * @property mixed cookie
 * @property mixed session
 * @property mixed request
 * @method where(string $string, $email)
 * @method data(string $string, $post)
 */
class LoginModel extends Model
{

    protected $table = 'users' ;
    private $user;

    public function isValidLogin($email, $password) {
        $user = $this->where('email=?' , $email)->fetch($this->table);
        if (! $user ) {
            return false;
        }

        $this->user = $user;

        return password_verify($password, $user->password);
    }

    public function user(){
        return $this->user;
    }



    /**
     * Check User If Login
     */
    public function isLogged() {
        if($this->cookie->has('loginUser')) {
            $code = $this->cookie->get('loginUser');
            //$code = '';
        } elseif ($this->session->has('loginUser')) {
            $code = $this->session->get('loginUser');

        } else {
            $code= '';
        }
       // pre($this->cookie->all());
        $user = $this->where('code=?', $code)->fetch($this->table);
        if(! $user) {
            return false ;
        }
        $this->user = $user;
        return true ;
    }



    public function newUser()
    {
        $this->data('user_name', $this->request->post('user_name'))
            ->data('email', $this->request->post('email'))
            ->data('password', password_hash($this->request->post('password'), PASSWORD_DEFAULT))
            ->data('ip', $this->request->server('REMOTE_ADDR'))
            ->data('created', $now = time())
            ->data('code', sha1($now. mt_rand(1, 1000)))
            ->insert('users');
    }


    public function allUsers()
    {
        return $this->select()->fetchAll($this->table);
    }


    public function allEmails($email)
    {



        return $this->query("SELECT * FROM users WHERE email=?", $email)->fetchAll();
    }

    public function checkForExpireToken($email)
    {
        return $this->query("SELECT expire_token FROM users WHERE email=?",$email)->fetchAll();

    }

    public function updateToken($email)
    {
        $now = date('Y-m-d H:i:s');
        $token = sha1(mt_rand(1,100).$now);
        $expireDate = date('Y-m-d H:i:s', strtotime('+1 hours'));
        return $this->query("UPDATE users SET expire_token=? , token=? WHERE email=?", $expireDate,$token, $email);
    }


    public function getUserName($userName)
    {
        return $this->query("SELECT * FROM users WHERE user_name=?", $userName)->fetchAll();
    }

    public function updatePassword($code)
    {
         $this->data('password', password_hash($this->request->post('password'), PASSWORD_DEFAULT))
             ->where('code=?', $code)
             ->update('users');

    }




}