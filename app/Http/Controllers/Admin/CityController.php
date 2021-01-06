<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;

use  App\Repositories\Interfaces\CityInterface;

use App\Models\City;
use App\Models\Product;
use Str;
//gọi carbon
use Carbon\Carbon;

class CityController extends Controller
{
    private $CityRepo;

    public function __construct(CityInterface $cityReponsitory)
    {
        $this->CityRepo = $cityReponsitory;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->seachname != null) {
            $cities = City::where('name','like','%'.$request->seachname.'%')->get();
            return view('admin.cities.index',compact('cities'));
        }
        $cities = $this->CityRepo->getAll();
        // $cities = City::Paginate(10);
        return view('admin.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        //dd($request->all());
        $request->validated();
        $city_date = new City([
            'name' => $request->name,
            'postcode' => $request->postcode,
            'isDeleted'=> true,
        ]);
         if ($city_date) {
            $this->CityRepo->addNew($city_date);
            return redirect('admin/cities')->with('thongbao','Created Successfully');
        }else{
            return back()->with('thongbao','Can Not Edit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = $this->CityRepo->getById($id);
        return view('admin.cities.edit',compact('cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city_data = $request->all();

        $city = $this->CityRepo->getById($id);
            if ($city) {
            //cập nhật dữ liệu từng fiel từ form edit
            $city->name = $request->name;
            $city->postcode = $request->postcode;
            $city->updated_at = Carbon::now()->toDateTimeString();
            //cập nhật
            $this->CityRepo->update($city);
            }else {
                return back()->with('thongbao','Can Not Edit');
            }
            return back()->with('thongbao','Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
    {
        $city = City::findOrFail($request->id);
        if ($city){
            $city->isDeleted = 0;
            $city->update();
            //echo "string";
        }
        return back()->with('message','Xóa thành công !');
    }
}
