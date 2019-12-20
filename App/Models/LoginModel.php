<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/11/2019
 * Time: 02:47 م
 */
namespace App\Models;

use System\Model;

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





}