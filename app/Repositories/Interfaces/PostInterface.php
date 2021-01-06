<?php

namespace App\Repositories\Interfaces;
//goi model
use App\Models\Post;

//tao interface
interface PostInterface{
    //khai bao cac phuong thuc ma controller se goi
    public function getAll();
    public function addNew(Post $Post_model);
    public function update(Post $Post_model);
    public function delete(Post $Post_model);
    public function getById($id);
}

?>