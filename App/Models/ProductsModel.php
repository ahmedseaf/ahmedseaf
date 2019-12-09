<?php

namespace App\Models;

use System\Model;

class ProductsModel extends Model
{

    protected $table = 'products';

    public function create()
    {
        $this->data('name', $this->request->post('name'))
             ->data('status', $this->request->post('status'))
             ->insert($this->table);
    }



    public function update($id)
    {
        $this->data('name', $this->request->post('name'))
             ->data('status', $this->request->post('status'))
             ->where('id=?', $id)
                ->update($this->table);
    }















}