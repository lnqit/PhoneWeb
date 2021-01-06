<?php
namespace App\Repositories\Repo;
use App\Repositories\Interfaces\PostInterface;
use App\Models\Post;
use App\Models\Tag;

class PostReponsitory implements PostInterface
{
    public function getAll(){
        return Post::where('isDeleted',true)->get();
    }
    public function addNew(Post $Post_model){
        //lay du lieu
        return $Post_model->save();
    }

    public function update(Post $Post_model){

        return $Post_model->update();
    }

    public function delete(Post $Post_model){
        return $Post_model->delete();
    }

    public function getById($id){
        $post = Post::with('seo')->findOrfail($id);
        return $post;
    }
}
?>