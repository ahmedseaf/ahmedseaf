<?php

namespace App\Models;

use System\Model;

class NavbarModel extends Model
{

    public function getProductBySearch($search)
    {//id name title description    price   currency
        return $this->select(" p.*",
            "i.name AS `Image`, i.status AS `Status`")
            ->from("products p")
            ->join("LEFT JOIN product_image i ON p.id=i.product_id")
            ->where("i.Status=? AND  p.description LIKE '%$search%' ", "enabled")
            ->fetchAll();
    }


    public function checkSearch()
    {
        $search = $_POST['query'];
        $output = '';
        $result = $this->query("SELECT name FROM products WHERE name LIKE '%$search%'")->fetchAll();
        $pId = 0;
        foreach ($result AS  $value)
        {
            $output .= '<p class="searchData" id="searchData'.$pId.'">' .$value->name.'</p>';
            $pId += 1;
        }
        echo $output;
    }









}