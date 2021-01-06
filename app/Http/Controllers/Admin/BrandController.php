<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

use  App\Repositories\Interfaces\BrandInterface;

use App\Models\Brand;
use App\Models\Product;
//gọi carbon
use Carbon\Carbon;

class BrandController extends Controller
{
    private $BrandRepo;

    public function __construct(BrandInterface $brandReponsitory)
    {
        $this->BrandRepo = $brandReponsitory;
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
            $brands = Brand::where('name','like','%'.$request->seachname.'%')->get();
            return view('admin.brands.index',compact('brands'));
        }

        $brands = $this->BrandRepo->getAll();
        //$brands = Brand::Paginate(10);
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        //dd($request->all());
        $request->validated();
        if ($request->hasFile('image')) {
            $request->image->move('images',$request->image->getClientOriginalName());
            $brand_data = new Brand([
            'name' => $request->name,
            'images' => $request->image->getClientOriginalName(),
            'description' => $request->description,
            'isdeleted'=> true
        ]);
        $this->BrandRepo->addNew($brand_data);
        return redirect('admin/brands')->with('thongbao','Created Successfully');
        }else{
            return back()->with('thongbao','Can Not Create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::findOrfail($id);
        return view('admin.brands.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->BrandRepo->getById($id);
        return view('admin.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $request->image->move('images',$request->image->getClientOriginalName());
            $brand = $this->BrandRepo->getById($id);
            if ($brand) {
            //cập nhật dữ liệu từng fiel từ form edit
            $brand->name = $request->name;
            $brand->images = $request->image->getClientOriginalName();
            $brand->description = $request->description;
            $brand->updated_at = Carbon::now()->toDateTimeString();
            //cập nhật
            $this->BrandRepo->update($brand);
            }else {
                return back()->with('thongbao','Can Not Edit');

            }
            return back()->with('thongbao','Edited Successfully');
        }else{
            $brand = $this->BrandRepo->getById($id);
            if ($brand) {
            //cập nhật dữ liệu từng fiel từ form edit
            $brand->name = $request->name;
            //$brand->images = $request->image->getClientOriginalName();
            $brand->description = $request->description;
            $brand->updated_at = Carbon::now()->toDateTimeString();
            //cập nhật
            $this->BrandRepo->update($brand);
            }else {
                return back()->with('thongbao','Can Not Edit');
            }
            return back()->with('thongbao','Edited Successfully');

        }
        $brand_data = $request->all();

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->id);
        $brands = Brand::findOrFail($request->id);
        if ($brands){
            $brands->isDeleted = 0;
            $brands->update();
            //echo "string";
        }
        return back()->with('message','Xóa thành công !');
    }
}