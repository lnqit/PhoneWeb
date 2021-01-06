<?php

namespace App\Repositories\Interfaces;
//goi model
use App\Models\Tag;
//tao interface
interface TagInterface{
    //khai bao cac phuong thuc ma controller se goi
    public function getAll();
    public function addNew(Tag $Tag_model);
    public function update(Tag $Tag_model);
    public function delete(Tag $Tag_model);
    public function getById($id);
}

?>