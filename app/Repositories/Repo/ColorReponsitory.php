<?php
namespace App\Repositories\Repo;
use App\Repositories\Interfaces\ColorInterface;
use App\Models\Color;

class ColorReponsitory implements ColorInterface
{
    public function getAll(){
        return Color::where('isDeleted',true)->get();
    }
    public function addNew(Color $Color_model){
        //lay du lieu
        return $Color_model->save();
    }

    public function update(Color $Color_model){
        return $Color_model->update();
    }

    public function delete(Color $Color_model){
        return $Color_model->delete();
    }

    public function getById($id){
        $color = Color::findOrfail($id);
        return $color;
    }
}
?>