<?php

namespace App\Models;

use System\Model;

class MinSubCategoriesModel extends Model
{

    protected $table = 'min_sub_category';


    public function create()
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $this->data('name', $this->request->post('name'))
            ->data('title', $this->request->post('title'))
            ->data('description', $this->request->post('description'))
            ->data('category_id', $this->request->post('a_category'))
            ->data('sub_category_id', $this->request->post('sub_category_id'))
            ->insert($this->table);
    }


    public function all()
    {
        return $this->select('m.*', 's.name AS `subCategory`', 'c.name  AS `category`')
                    ->from('min_sub_category m')
                    ->join('LEFT JOIN sub_category s ON m.sub_category_id=s.id')
                    ->join('LEFT JOIN categories c ON m.category_id=c.id')
                    ->fetchAll();
    }



    public function getDataSelectBox()
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


    public function update($id)
    {
        $image = $this->uploadImage();
        if($image) {
            $this->data('image', $image);
        }

        $this->data('name', $this->request->post('name'))
            ->data('title', $this->request->post('title'))
            ->data('description', $this->request->post('description'))
            ->data('category_id', $this->request->post('a_category'))
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



    public function checkIfProductExists($id)
    {
        return $this->query("SELECT * FROM products WHERE min_sub_category_id=?", $id)->fetchAll();

    }





}