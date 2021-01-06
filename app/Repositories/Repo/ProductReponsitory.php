<?php
namespace App\Repositories\Repo;
use App\Repositories\Interfaces\ProductInterface;
use\App\Models\Product;
use\App\Models\Category;
use\App\Models\Brand;
use\App\Models\City;
use\App\Models\Color;
use\App\Models\Post;
use\App\Models\Tag;
use\App\Models\Seoable;
use\App\Models\Comment;

class ProductReponsitory implements ProductInterface
{
    public function getAll(){
        return Product::where('isDeleted',true)->get();
        
    }
    public function addNew(Product $Brand_model){
        //lay du lieu
        return $Brand_model->save();
    }

    public function update(Product $Brand_model){
        return $Brand_model->update();
    }

    public function delete(Product $Brand_model){
        return $Brand_model->delete();
    }

    public function getById($id){
        $brand = Product::findOrfail($id);
        return $brand;
    }
}
?>