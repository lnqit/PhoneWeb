<?php

namespace App\Repositories\Interfaces;
//goi model
use App\Models\Color;
//tao interface
interface ColorInterface{
    //khai bao cac phuong thuc ma controller se goi
    public function getAll();
    public function addNew(Color $Color_model);
    public function update(Color $Color_model);
    public function delete(Color $Color_model);
    public function getById($id);
}

?>