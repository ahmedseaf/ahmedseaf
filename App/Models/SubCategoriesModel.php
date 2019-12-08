<?php

namespace App\Models;

use System\Model;

class SubCategoriesModel extends Model
{

    protected $table = 'sub_category';


    public function create()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $this->data('name', $this->request->post('name'))
            ->data('title', $this->request->post('title'))
            ->data('description', $this->request->post('description'))
            ->data('category_id', $this->request->post('category_id'))
            ->insert($this->table);
    }



    public function update($id)
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $this->data('name', $this->request->post('name'))
            ->data('title', $this->request->post('title'))
            ->data('description', $this->request->post('description'))
            ->data('category_id', $this->request->post('category_id'))
            ->where('id=?', $id)
            ->update($this->table);
    }




    private function uploadImage() {

        $image = $this->request->file('image');
        if ( ! $image->exists()) {
            return '' ;
        }

        return $image->moveTo($this->app->file->toPublic('images'));
    }



    public function all()
    {
        return $this->select('s.*', 'c.name AS `category`')->from('sub_category s')
            ->join('LEFT JOIN categories c ON c.id=s.category_id')
            ->fetchAll();


    }






    /****************************************************
     *                                                  *
     *              For Min Sub Category                *
     *                                                  *
     *                                                  *
     ****************************************************/












}