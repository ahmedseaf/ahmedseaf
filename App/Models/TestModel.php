<?php

namespace App\Models;

use System\Model;

class TestModel extends Model
{

    protected $table = 'image';


    public function action()
    {
        $myPath = $_SERVER['DOCUMENT_ROOT']. '/public/images/test/';
        $getOutput = '';

        if(isset($_POST['action'])) {
            if ($_POST['action'] == "loadFiles") {
                $getFiles = $this->all();
                foreach ($getFiles as $getFile) {
                 $getOutput .=
                    '<div id="imgView" class="imgView">
                    <img style="width: 150px; height: 150px; display: block;" src="'.assets('images/test/'.$getFile->name).'">
                    <button id="deleteFile" data-deleteFile="'.url('test/delete/' . $getFile->id).'" style="color: #962929; font-size: 35px;
                     text-align: center; top: 30px;
                    font-weight: bold;" type="button"
                    class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    
                        <div class="custom-control custom-radio" style="float: right;">
                            <input class="custom-control-input imageActive" checked data-radioId="'.$getFile->name.'" type="radio" id="'.$getFile->name.'"
                            name="customRadio" >
                            <label for="'.$getFile->name.'" class="custom-control-label"></label>
                        </div>
                    
                    </div>' ;
                }
                echo $getOutput;
            }

            if($_POST["action"] == "file_upload") {
                foreach ($_FILES['uploadFile']['name'] AS $filePath => $value) {
                    //$newName = $_FILES['uploadFile']['name'][$filePath];

                    $get_file_name = explode('.', $_FILES['uploadFile']['name'][$filePath]);

                    $newName = sha1(rand(1,10000)) . '.' . $get_file_name[1];
                    //pre($newName);
                    $this->data('name', $newName)->insert($this->table);
                    $destination = $myPath.$newName;
                    move_uploaded_file($_FILES['uploadFile']['tmp_name'][$filePath],$destination);

                }
            } // End Post File Upload


        }

//
    }


    public function searchItem()
    {
        $output = '';
        if(isset($_POST['query'])) {
             $query = $_POST['query'];
             $result = $this->query("SELECT name FROM countries WHERE name LIKE '%$query%'")
                      ->fetchAll();

             foreach ($result AS  $value)
             {
                 $output .=  '<a href="#" class="list-group-item list-group-item-action border-1">'.$value->name.'</a>';
             }

        }
        echo $output;
    }



    public function radioImage()
    {
        foreach ($_GET as $key => $value ) {
            //foreach ($allImages as $image ) {
             $radioForm = str_replace('_','.', $key);
             //pre($radioForm);
            $imageData = $this->select('name')->where('name=?',$radioForm)->fetchAll($this->table);
            foreach ($imageData AS $imageIndex => $imageName) {
                foreach ($imageName As $name) {
                    if($radioForm == $name) {
                        $enabled = 'enabled';
                        $status = $name;
                        $this->data('status', 'disabled')
                            ->update($this->table);

                        $this->data('status', $enabled)
                            ->where('name=?', $status)
                            ->update($this->table);
                    }
                }
            }
        }
    }













}