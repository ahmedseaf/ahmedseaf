<?php

namespace App\Models;

use System\Model;

class ProductsModel extends Model
{

    protected $table = 'products';


    public function all()
    {
        return $this->select('p.*', 'b.name AS `brand`','c.name  AS `category`',
                           'i.name AS `Image`, i.status AS `Status`',
                            's.name AS `subCategory`', 'm.name  AS `minCategory`')
                    ->from('products p')
                    ->join('LEFT JOIN brand b ON p.brand=b.id')
                    ->join('LEFT JOIN categories c ON p.category_id=c.id')
                    ->join('LEFT JOIN sub_category s ON p.sub_category_id=s.id')
                    ->join('LEFT JOIN min_sub_category m ON p.min_sub_category_id=m.id')
                    ->join('LEFT JOIN product_image i ON p.id=i.product_id')
                    ->where('i.Status=?','enabled')
                    ->fetchAll();
    }


    public function create()
    { //    currency total price unit
        $lastProduct = $this->data('name', $this->request->post('name'))
                            ->data('country', $this->request->post('country'))
                            ->data('title', $this->request->post('title'))
                            ->data('description', $this->request->post('description'))
                            ->data('brand', $this->request->post('brand'))
                            ->data('discount', $this->request->post('discount'))
                            ->data('updated_at', time())
                            ->data('created_at', time())
                            ->data('currency', $this->request->post('currency'))
                            ->data('total', $this->request->post('total'))
                            ->data('price', $this->request->post('price'))
                            ->data('unit', $this->request->post('unit'))
                            ->data('category_id', $this->request->post('categories'))
                            ->data('sub_category_id', $this->request->post('sub_category'))
                            ->data('min_sub_category_id', $this->request->post('min_sub_category'))
                            ->insert($this->table)->lastId();

        $imagesTable = $this->load->model('Test')->all();

        foreach ($imagesTable AS $imageTable ) {
            $this->data('name', $imageTable->name)
                 ->data('status', $imageTable->status)
                 ->data('product_id', $lastProduct)
                ->insert('product_image');
        }

        if(isset($_POST['option'])) {
            $options = $_POST['option'];
            $description = $_POST['option_description'];
            $dataOptions = array_combine($options, $description);
            foreach ($dataOptions AS $key=>$value) {
                $this->data('name', $key)
                    ->data('description', $value)
                    ->data('product_id', $lastProduct)
                    ->insert('options');
            }
        }
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


    public function getImageById($id)
    {
        $getFiles = $this->query('SELECT * FROM product_image WHERE product_id=?', $id)->fetchAll();
        $getOutput ='';
        foreach ($getFiles as $getFile) {
            $productChecked =  $getFile->status == 'enabled' ? 'checked' : false;
            $getOutput .=
                '<div id="imgViewPro" class="imgViewPro">
                        <img style="width: 150px; height: 150px; display: block;"
                        src="'.assets('images/test/'.$getFile->name).'">
                        <button id="deleteFilePro" data-deleteFile="'.url('admin/product/deleteimg/' . $getFile->id).'" style="color: #962929; font-size: 35px;
                         text-align: center; top: 30px;
                        font-weight: bold;" type="button"
                        class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <div class="custom-control custom-radio" style="float: right;">
                            <input class="custom-control-input imageActivePro" data-radioId="'.$getFile->name.'" type="radio" id="'.$getFile->name.'"
                            
                             name="customRadioPro" > 
                            <label for="'.$getFile->name.'" class="custom-control-label"></label>
                        </div>
                    </div>' ;

        }

        echo $getOutput;

    }


    public function deleteImage($id)
    {
        return $this->where('id=?', $id)->delete('product_image');

    }


    public function moveImage($imagesTable, $id)
    {
        foreach ($imagesTable AS $imageTable ) {
            $this->data('name', $imageTable->name)
                ->data('status', $imageTable->status)
                ->data('product_id', $id)
                ->insert('image');
        }
    }


    public function uploadImage($id)
    {
        $myPath = $_SERVER['DOCUMENT_ROOT']. '/public/images/test/';
        if(isset($_FILES['uploadFilePro'])){
            foreach ($_FILES['uploadFilePro']['name'] AS $filePath => $value) {
                $get_file_name = explode('.', $_FILES['uploadFilePro']['name'][$filePath]);
                $newName = sha1(rand(1,10000)) . '.' . $get_file_name[1];
                $this->data('name', $newName)
                    ->data('product_id', $id)
                    ->data('created_at', time())
                    ->insert('product_image');
                $destination = $myPath.$newName;
                move_uploaded_file($_FILES['uploadFilePro']['tmp_name'][$filePath],$destination);
            }
       }
    }


    public function radioImage()
    {
        foreach ($_GET as $key => $value ) {
            $radioForm = str_replace('_','.', $key);
            $imageData = $this->select('name')->where('name=?',$radioForm)->fetchAll('product_image');
            foreach ($imageData AS $imageIndex => $imageName) {
                foreach ($imageName As $name) {
                    if($radioForm == $name) {
                        $enabled = 'enabled';
                        $status = $name;
                        //$this->query("UPDATE FROM product_image SET status=disabled WHERE product_id=?",$id)->fetchAll();
//                        $this->data('status', 'disabled')
//                            //->where('product_id=?',$id)
//                            ->update('product_image');
                        $this->data('status', $enabled)
                            ->where('name=?', $status)
                            ->update('product_image');
                    }
                }
            }
        }
    }


    public function getOptions($id)
    {
        return $this->query('SELECT * FROM options WHERE product_id=?', $id)->fetchAll();

    }







}