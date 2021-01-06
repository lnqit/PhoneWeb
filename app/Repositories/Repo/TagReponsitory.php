<?php
namespace App\Repositories\Repo;
use App\Repositories\Interfaces\TagInterface;
use App\Models\Tag;

class TagReponsitory implements TagInterface
{
    public function getAll(){
        return Tag::where('isDeleted',true)->get();
    }
    public function addNew(Tag $Tag_model){
        //lay du lieu
        return $Tag_model->save();
    }

    public function update(Tag $Tag_model){
        return $Tag_model->update();
    }

    public function delete(Tag $Tag_model){
        return $Tag_model->delete();
    }

    public function getById($id){
        $tag = Tag::findOrfail($id);
        return $tag;
    }
}
?>