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

//    public function create()
//    {
//        $this->data('name', $this->request->post('name'))
//             ->data('status', $this->request->post('status'))
//             ->insert($this->table);
//    }
//
//
//
//    public function update($id)
//    {
//        $this->data('name', $this->request->post('name'))
//             ->data('status', $this->request->post('status'))
//             ->where('id=?', $id)
//                ->update($this->table);
//    }



}