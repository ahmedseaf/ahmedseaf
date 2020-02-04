<?php

namespace App\Models;

use System\Model;

/**
 * @property mixed request
 */
class MainPageModel extends Model
{

    protected $table = 'mainPage';




    public function create()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }
        $this->data('title', $this->request->post('title'))
             ->data('created',  date("Y/m/d H:i:s"))
             ->data('hint', $this->request->post('slideHint'))
             ->data('link', $this->request->post('slideLink'))
             ->insert($this->table);
    }


   private function uploadImage() {

        $image = $this->request->file('image');
        if ( ! $image->exists()) {
            return '' ;
        }

        return $image->moveTo($this->app->file->toPublic('images'));
   }



   public function selectBySlideName($hint)
   {
       return $this->query("SELECT * FROM mainPage WHERE hint=?",$hint)->fetchAll();
   }


    public function selectBySlideNameNavbar($hint , $limit)
    {
        return $this->query("SELECT * FROM mainPage WHERE hint=? ORDER BY RAND() LIMIT $limit",$hint)->fetchAll();
    }



}