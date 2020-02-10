<?php

namespace App\Models;

use System\Model;

class CategoriesModel extends Model
{

    protected $table = 'Categories';

    public function create()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }
        $this->data('name', $this->request->post('name'))
             ->data('status', $this->request->post('status'))
             ->data('title', $this->request->post('title'))
             ->data('description', $this->request->post('description'))
             ->insert($this->table);
    }



    public function update($id)
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $this->data('name', $this->request->post('name'))
             ->data('status', $this->request->post('status'))
            ->data('title', $this->request->post('title'))
            ->data('description', $this->request->post('description'))
             ->where('id=?', $id)
                ->update($this->table);
    }



    public function checkIfSubCategoryExists($id)
    {
        return $this->query("SELECT * FROM sub_category WHERE category_id=?", $id)->fetchAll();

    }



    private function uploadImage() {

        $image = $this->request->file('image');
        if ( ! $image->exists()) {
            return '' ;
        }

        return $image->moveTo($this->app->file->toPublic('images'));
    }









}