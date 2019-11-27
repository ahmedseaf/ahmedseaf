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








}