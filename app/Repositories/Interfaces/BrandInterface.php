<?php

namespace App\Repositories\Interfaces;
//goi model
use App\Models\Brand;
//tao interface
interface BrandInterface{
    //khai bao cac phuong thuc ma controller se goi
    public function getAll();
    public function addNew(Brand $Brand_model);
    public function update(Brand $Brand_model);
    public function delete(Brand $Brand_model);
    public function getById($id);
}

?>