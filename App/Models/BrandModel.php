<?php

namespace App\Models;

use System\Model;

/**
 * @property mixed request
 */
class BrandModel extends Model
{

    protected $table = 'brand';

    public function create()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $imageHeader = $this->uploadImageHeader();
        if($imageHeader) {
            $this->data('image_header', $imageHeader);
        }

        $this->data('name', $this->request->post('name'))
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

        $imageHeader = $this->uploadImageHeader();
        if($imageHeader) {
            $this->data('image_header', $imageHeader);
        }
        $this->data('name', $this->request->post('name'))
            ->data('title', $this->request->post('title'))
            ->data('description', $this->request->post('description'))
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

    private function uploadImageHeader() {

        $image = $this->request->file('image_header');
        if ( ! $image->exists()) {
            return '' ;
        }

        return $image->moveTo($this->app->file->toPublic('images'));
    }







}