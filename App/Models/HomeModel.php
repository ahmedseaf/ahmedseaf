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

    public function getProductByMainCategoryId($id)
    {
        return $this->select('p.*', 'c.name  AS `category`',
            'i.name AS `Image`, i.status AS `Status`',
            's.name AS `subCategory`', 'm.name  AS `minCategory`', 'm.id AS `main_sub_id`')
            ->from('products p')
            ->join('LEFT JOIN categories c ON p.category_id=c.id')
            ->join('LEFT JOIN sub_category s ON p.sub_category_id=s.id')
            ->join('LEFT JOIN min_sub_category m ON p.min_sub_category_id=m.id')
            ->join('LEFT JOIN product_image i ON p.id=i.product_id')
            ->where('min_sub_category_id=? AND i.Status=?',$id,'enabled')
            ->fetchAll();
    }

    public function getProductById($id)
    {
        return $this->select('p.*', 'b.name AS `brand`', 'b.id AS `brandId`', 'c.name  AS `category`',
            'i.name AS `Image`, i.status AS `Status`',
            's.name AS `subCategory`', 'm.name  AS `minCategory`', 'm.id AS `main_sub_id`')
            ->from('products p')
            ->join('LEFT JOIN brand b ON p.brand=b.id')
            ->join('LEFT JOIN categories c ON p.category_id=c.id')
            ->join('LEFT JOIN sub_category s ON p.sub_category_id=s.id')
            ->join('LEFT JOIN min_sub_category m ON p.min_sub_category_id=m.id')
            ->join('LEFT JOIN product_image i ON p.id=i.product_id')
            ->where('p.id=? AND i.Status=?',$id,'enabled')
            ->fetchAll();
    }

    public function userProduct($id)
    {
        return $this->query("SELECT * FROM user_product WHERE product_id=?", $id)->fetchAll();
    }

    public function getSeeBeforeProduct($id)
    {
        return $this->select('p.*', 'i.name AS `Image`, i.status AS `Status`',
                            'u.product_id')
            ->from('products p')
            ->join('LEFT JOIN user_product u ON p.id=u.product_id')
            ->join('LEFT JOIN product_image i ON p.id=i.product_id')
            ->where('u.ip=? AND i.Status=? LIMIT 20',$id,'enabled')
            ->fetchAll();
    }

    public function getLikeProduct($productName)
    {
        $secondWords = substr($productName, 0, 9);
        return $this->select("p.*", "i.name AS `Image`, i.status AS `Status`",
            "u.product_id")
            ->from("products p")
            ->join("LEFT JOIN user_product u ON p.id=u.product_id")
            ->join("LEFT JOIN product_image i ON p.id=i.product_id")
            ->where("p.name LIKE '%$secondWords%' AND i.Status=? LIMIT 30","enabled")
            ->fetchAll();
    }

    public function likeBrand($productBrand)
    {
        return $this->select('p.*',
            'i.name AS `Image`, i.status AS `Status`')
            ->from('products p')

            ->join('LEFT JOIN product_image i ON p.id=i.product_id')
            ->where('p.brand=? AND i.Status=?',$productBrand,'enabled')
            ->fetchAll();
    }

    public function getAllProductByBrandId($brandId)
    {
        return $this->select('p.*', 'c.name  AS `category`',
            'i.name AS `Image`, i.status AS `Status`',
            'b.id AS `brandId`, b.name AS `brandName`, b.image AS `brandImage`')
            ->from('products p')
            ->join('LEFT JOIN categories c ON p.category_id=c.id')
            ->join('LEFT JOIN brand b ON p.brand=b.id')
            ->join('LEFT JOIN product_image i ON p.id=i.product_id')
            ->where('b.id=? AND i.Status=?',$brandId,'enabled')
            ->fetchAll();
    }

    public function getBrandById($brandId)
    {
        return $this->query("SELECT * FROM brand WHERE id=?", $brandId)->fetchAll();
    }

    public function getFaveProduct($limit)
    {
        return $this->select("p.*", "i.name AS `Image`, i.status AS `Status`")
            ->from("products p")
            ->join("LEFT JOIN product_image i ON p.id=i.product_id")
            ->where("p.fave=? AND i.Status=? LIMIT $limit","on","enabled")
            ->fetchAll();
    }

    public function getProductByCategory($categoryId, $limit)
    {
        return $this->select("p.*", "i.name AS `Image`, i.status AS `Status`")
            ->from("products p")
            ->join("LEFT JOIN product_image i ON p.id=i.product_id")
            ->where("p.category_id=? AND i.Status=? LIMIT $limit",$categoryId,"enabled")
            ->fetchAll();
    }




}