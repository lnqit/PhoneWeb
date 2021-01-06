<?php
namespace App\Repositories\Repo;
use App\Repositories\Interfaces\CityInterface;
use App\Models\City;

class CityReponsitory implements CityInterface
{
    public function getAll(){
        return City::where('isDeleted',true)->get();
    }
    public function addNew(City $City_model){
        //lay du lieu
        return $City_model->save();
    }

    public function update(City $City_model){
         return $City_model->update();
    }

    public function delete(City $City_model){
         return $City_model->delete();
    }

    public function getById($id){
        $city = City::findOrfail($id);
        return $city;
    }
}
?>