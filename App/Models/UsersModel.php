<?php

namespace App\Models;

use System\Model;

class UsersModel extends Model
{

    protected $table = 'users';


    public function all()
    {
        return $this->select('u.*', 'ug.name AS `group`')->from('users u')
            ->join('LEFT JOIN users_groups ug ON u.users_group_id=ug.id')
            ->fetchAll();


    }

    public function create()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }
        $this->data('firstname', $this->request->post('first_name'))
             ->data('lastname', $this->request->post('last_name'))
             ->data('email', $this->request->post('email'))
             ->data('password', password_hash($this->request->post('password'), PASSWORD_DEFAULT))
             ->data('birthday', $this->request->post('birthday'))
             ->data('users_group_id', $this->request->post('users_group_id'))
             ->data('gender', $this->request->post('gender'))
             ->data('ip', $this->request->server('REMOTE_ADDR'))
             ->data('status', $this->request->post('status'))
             ->data('created', $now = time())
             ->data('code', sha1($now. mt_rand(1, 1000)))
            ->insert($this->table);
    }


   private function uploadImage() {

        $image = $this->request->file('image');
        if ( ! $image->exists()) {
            return '' ;
        }

        return $image->moveTo($this->app->file->toPublic('images'));
   }












    public function update($id)
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $password =  $this->request->post('password');
        if($password) {
            $this->data('password', password_hash($password, PASSWORD_DEFAULT));
        }


        $this->data('firstname', $this->request->post('first_name'))
            ->data('lastname', $this->request->post('last_name'))
            ->data('email', $this->request->post('email'))
            ->data('users_group_id', $this->request->post('users_group_id'))
            ->data('gender', $this->request->post('gender'))
            ->data('status', $this->request->post('status'))
            ->where('id=?', $id)
            ->update($this->table);
    }



}