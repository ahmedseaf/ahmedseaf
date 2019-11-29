<?php

namespace App\Models;

use System\Model;

class UsersGroupsModel extends Model
{

    protected $table = 'users_groups';

    public function create()
    {
        $usersGroupId = $this->data('name', $this->request->post('name'))
                    //->data('status', $this->request->post('status'))
                    ->insert($this->table)->lastId();

        $pages = array_filter($this->request->post('permission'));

        foreach ($pages As $page) {
            $this->data('users_group_id', $usersGroupId)
                ->data('pages', $page)
                ->insert('users_groups_permissions');
        }
    }



    public function update($id)
    {
         $this->data('name', $this->request->post('name'))
             //->data('status', $this->request->post('status'))
             ->where('id=?', $id)
                ->update($this->table);


        // Remove All Permissions For the current users group before
        // Adding the new Permissions
        $this->where('users_group_id = ?', $id)->delete('users_groups_permissions');

        $pages = array_filter($this->request->post('permission'));

        foreach ($pages As $page) {
            $this->data('users_group_id', $id)
                ->data('pages', $page)
                ->insert('users_groups_permissions');
        }

    }




    /***
     * Get Users Group
     * @return mixed
     */
    public function get($id){
        $usersGroup = parent::get($id);
        if($usersGroup) {
            $pages = $this->select('pages')->where('users_group_id = ?' , $usersGroup->id)->fetchAll('users_groups_permissions');
            $usersGroup->pages = [];
             if($pages) {
                 foreach ($pages AS $page) {
                     $usersGroup->pages[] = $page->pages;
                 }
             }
        }
        return $usersGroup;
    }

}