<?php

namespace App\Models;

use System\Model;

/**
 * @property mixed request
 */
class SettingModel extends Model
{
//logo	fave_icon site_name	site_description keyword facebook twitter google youtube instgram linkedIn
    protected $table = 'setting';

    public function create()
    {
        $imageLogo = $this->uploadImageLogo();
        if($imageLogo) {
            $this->data('logo', $imageLogo);
        }

        $imageFave = $this->uploadImageFave();
        if($imageFave) {
            $this->data('fave_icon', $imageFave);
        }


        $imageHeaders = $this->uploadHeaders();
        if($imageHeaders) {
            $this->data('image_header', $imageHeaders);
        }



        //site_name	site_description	keyword	facebook	twitter	google	youtube	instgram

        $this->data('site_name', $this->request->post('site_name'))
            ->data('site_description', $this->request->post('site_description'))
            ->data('keyword', $this->request->post('keyword'))
            ->data('facebook', $this->request->post('facebook'))
            ->data('twitter', $this->request->post('twitter'))
            ->data('google', $this->request->post('google'))
            ->data('youtube', $this->request->post('youtube'))
            ->data('instgram', $this->request->post('instgram'))
            ->data('linkedIn', $this->request->post('linkedIn'))
            ->insert($this->table);
    }




    public function update($id)
    {
        $imageLogo = $this->uploadImageLogo();
        if($imageLogo) {
            $this->data('logo', $imageLogo);
        }

        $imageFave = $this->uploadImageFave();
        if($imageFave) {
            $this->data('fave_icon', $imageFave);
        }

        $imageHeaders = $this->uploadHeaders();
        if($imageHeaders) {
            $this->data('image_header', $imageHeaders);
        }

        $this->data('site_name', $this->request->post('site_name'))
            ->data('site_description', $this->request->post('site_description'))
            ->data('keyword', $this->request->post('keyword'))
            ->data('facebook', $this->request->post('facebook'))
            ->data('twitter', $this->request->post('twitter'))
            ->data('google', $this->request->post('google'))
            ->data('youtube', $this->request->post('youtube'))
            ->data('instgram', $this->request->post('instgram'))
            ->data('linkedIn', $this->request->post('linkedIn'))
            ->where('id=?', $id)
            ->update($this->table);
    }





    private function uploadImageLogo() {

        $image = $this->request->file('image_logo');
        if ( ! $image->exists()) {
            return '' ;
        }

        return $image->moveTo($this->app->file->toPublic('images'));
    }

    private function uploadImageFave() {

        $image = $this->request->file('image_fave');
        if ( ! $image->exists()) {
            return '' ;
        }

        return $image->moveTo($this->app->file->toPublic('images'));
    }


    private function uploadHeaders() {

        $image = $this->request->file('image_header');
        if ( ! $image->exists()) {
            return '' ;
        }

        return $image->moveTo($this->app->file->toPublic('images'));
    }






}