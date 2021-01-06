<?php
namespace App\Repositories\Repo;
use App\Repositories\Interfaces\BrandInterface;
use App\Models\Brand;

class BrandReponsitory implements BrandInterface
{
    public function getAll(){
        return Brand::where('isDeleted',true)->get();
    }
    public function addNew(Brand $Brand_model){
        //lay du lieu
        return $Brand_model->save();
    }

    public function update(Brand $Brand_model){
        return $Brand_model->update();
    }

    public function delete(Brand $Brand_model){
        return $Brand_model->delete();
    }

    public function getById($id){
        $brand = Brand::findOrfail($id);
        return $brand;
    }
}
?>