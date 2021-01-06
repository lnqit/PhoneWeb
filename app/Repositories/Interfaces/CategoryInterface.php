<?php

namespace App\Repositories\Interfaces;
//goi model
use App\Models\Category;
//tao interface
interface CategoryInterface{
    //khai bao cac phuong thuc ma controller se goi
    public function getAll();
    public function addNew(Category $Category_model);
    public function update(Category $Category_model);
    public function delete(Category $Category_model);
    public function getById($id);
}

?>