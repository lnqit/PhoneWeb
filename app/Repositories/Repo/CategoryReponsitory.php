<?php
namespace App\Repositories\Repo;
use App\Repositories\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryReponsitory implements CategoryInterface
{
    public function getAll(){
        return Category::where('isDeleted',true)->get();
    }
    public function addNew(Category $Category_model){
        //lay du lieu
        return $Category_model->save();
    }

    public function update(Category $Category_model){
        return $Category_model->update();
    }

    public function delete(Category $Category_model){
        return $Category_model->delete();
    }   

    public function getById($id){
        $category = Category::findOrfail($id);
        return $category;
    }
}
?>