<?php

namespace App\Models;

use System\Model;

/**
 * @property mixed request
 */
class ContactUsModel extends Model
{

    protected $table = 'contactus';

    public function create()
    {

        $this->data('customerName', $this->request->post('name'))
             ->data('email', $this->request->post('email'))
             ->data('message', $this->request->post('message'))
             ->data('messageType', $this->request->post('subject'))
             ->data('messageDate', date('Y/m/d H:i:s'))
             ->insert($this->table);
    }


    public function viewContactUs($id)
    {
        return $this->where('id=?',$id)->fetchAll($this->table);
    }

//	id	address	mobile1	mobile2	phone1	phone2	fax	email	web


    public function viewAboutList()
    {
        return $this->select()->fetchAll('aboutUs');
    }

    public function viewAboutById($id)
    {
        return $this->where('id=?', $id)->fetchAll('aboutUs');
    }


    public function createAbout()
    {
        $this->data('address'   , $this->request->post('address'))
            ->data('mobile1'    , $this->request->post('mobile1'))
            ->data('mobile2'    , $this->request->post('mobile2'))
            ->data('phone1'     , $this->request->post('phone1'))
            ->data('phone2'     , $this->request->post('phone2'))
            ->data('fax'        , $this->request->post('fax'))
            ->data('email'      , $this->request->post('email'))
            ->data('web'        , $this->request->post('web'))
            ->insert('aboutUs');
    }

    public function updateAbout()
    {
        $this->data('address'   , $this->request->post('address'))
            ->data('mobile1'    , $this->request->post('mobile1'))
            ->data('mobile2'    , $this->request->post('mobile2'))
            ->data('phone1'     , $this->request->post('phone1'))
            ->data('phone2'     , $this->request->post('phone2'))
            ->data('fax'        , $this->request->post('fax'))
            ->data('email'      , $this->request->post('email'))
            ->data('web'        , $this->request->post('web'))
            ->where('id=?', 1)
            ->update('aboutUs');
    }

    public function createOurCompany()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $this->data('name'   , $this->request->post('name'))
            ->insert('ourCompany');
    }

    public function updateOurCompany($id)
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $this->data('name'   , $this->request->post('name'))
            ->where('id=?', $id)
            ->update('ourCompany');
    }



    private function uploadImage() {

        $image = $this->request->file('image');
        if ( ! $image->exists()) {
            return '' ;
        }

        return $image->moveTo($this->app->file->toPublic('images'));
    }

}