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



    public function getSubCategory()
    {
        // '. isset($_POST["categoryID"]) == $dataSelect->id ? "selected" : false .'
        $dataSelectBox = $this->where('category_id=?',$_POST['categoryID'])
            ->fetchAll('sub_category');

        $output = '';

        foreach ($dataSelectBox AS $dataSelect){

            $output .= '<option value="'.$dataSelect->id.'">'.$dataSelect->name.'</option>';
        }


        echo $output;

    }



    public function getMinCategory()
    {
        $dataSelectBox = $this->where('sub_category_id=?',$_POST['categorySubID'])
            ->fetchAll('min_sub_category');

        $output = '';

        foreach ($dataSelectBox AS $dataSelect){

            $output .= '<option value="'.$dataSelect->id.'">'.$dataSelect->name.'</option>';
        }


        echo $output;

    }








}