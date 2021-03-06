<?php

namespace App\Models;

use System\Model;

/**
 * @property mixed request
 */
class OurCompanyModel extends Model
{

    protected $table = 'ourCompany';

    public function create()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $this->data('name', $this->request->post('name'))
            
            ->insert($this->table);
    }




    public function update($id)
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }
        
        $this->data('name', $this->request->post('name'))
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








}