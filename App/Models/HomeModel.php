<?php

namespace App\Models;

use System\Model;

/**
 * @property mixed request
 *
 *
 */
class HomeModel extends Model
{

    public function loadSliders($hint,$limit)
    {
        return $this->query("SELECT * FROM mainPage WHERE hint=? ORDER BY id DESC LIMIT $limit", $hint)->fetchAll();
    }


    public function bestOffer($limit)
    {
        return $this->select('p.*', 'i.name AS `Image`, i.status AS `Status`')
            ->from('products p')
            ->join('LEFT JOIN product_image i ON p.id=i.product_id')
            ->where('p.discount !=? AND i.Status=? ORDER BY discount DESC LIMIT '. $limit,0,'enabled')
            ->fetchAll();
    }


    public function newProducts($limit)
    {
        return $this->select('p.*', 'i.name AS `Image`, i.status AS `Status`')
            ->from('products p')
            ->join('LEFT JOIN product_image i ON p.id=i.product_id')
            ->where('i.Status=? ORDER BY updated_at DESC LIMIT '. $limit,'enabled')
            ->fetchAll();
    }



    public function allProducts($productId  )
    {
        return $this->select('p.*', 'i.name AS `Image`, i.status AS `Status`')
            ->from('products p')
            ->join('LEFT JOIN product_image i ON p.id=i.product_id')
            ->where('p.id=? AND i.Status=?', $productId,'enabled')
            ->fetchAll();
    }


    public function getAllCategory()
    {
        return $this->query('SELECT * FROM categories')->fetchAll();
    }

    public function getAllSubCategory($id)
    {
        return $this->query('SELECT * FROM sub_category WHERE category_id=?', $id)->fetchAll();
    }


    public function getAllMainSubCategory($id)
    {
        return $this->query('SELECT * FROM min_sub_category WHERE sub_category_id=?',$id)->fetchAll();
    }




}