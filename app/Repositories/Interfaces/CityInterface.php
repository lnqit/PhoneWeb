<?php

namespace App\Repositories\Interfaces;
//goi model
use App\Models\City;
//tao interface
interface CityInterface{
    //khai bao cac phuong thuc ma controller se goi
    public function getAll();
    public function addNew(City $City_model);
    public function update(City $City_model);
    public function delete(City $City_model);
    public function getById($id);
}

?>