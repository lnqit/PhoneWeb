<?php

namespace App\Repositories\Interfaces;
//goi model
use\App\Models\Product;
use\App\Models\Category;
use\App\Models\Brand;
use\App\Models\City;
use\App\Models\Color;
use\App\Models\Post;
use\App\Models\Tag;
use\App\Models\Seoable;
use\App\Models\Comment;
//tao interface
interface ProductInterface{
    //khai bao cac phuong thuc ma controller se goi
    public function getAll();
    public function addNew(Product $Product_model);
    public function update(Product $Product_model);
    public function delete(Product $Product_model);
    public function getById($id);
}

?>