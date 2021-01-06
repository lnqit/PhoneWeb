<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\App\Http\Requests\ColorRequest;

use  App\Repositories\Interfaces\ColorInterface;

use App\Models\Color;
use App\Models\Product;
//gọi carbon
use Carbon\Carbon;

class ColorController extends Controller
{

    private $ColorRepo;

    public function __construct(ColorInterface $colorReponsitory)
    {
        $this->ColorRepo = $colorReponsitory;
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
            $colors = Color::where('name','like','%'.$request->seachname.'%')->get();
            return view('admin.colors.index',compact('colors'));
        }
        $colors = $this->ColorRepo->getAll();
        // $colors = Color::all();
        return view('admin.colors.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        //dd($request->all());
        $request->validated();
        $color_data = new Color([
            'name' => $request->name,
            'color' => $request->color,
            'isdeleted'=> true
        ]);
        if ($color_data) {
            $this->ColorRepo->addNew($color_data);
            return redirect('admin/colors')->with('thongbao','Created Successfully');
        } else {
            return back()->with('thongbao','Can Not Create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $color = Color::findOrfail($id);
        return view('admin.colors.show',compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = $this->ColorRepo->getById($id);
        return view('admin.colors.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $color_data = $request->all();

        $color = $this->ColorRepo->getById($id);
            if ($color) {
            //cập nhật dữ liệu từng fiel từ form edit
            $color->name = $request->name;
            $color->color = $request->color;
            $color->updated_at = Carbon::now()->toDateTimeString();
            //cập nhật
            $this->ColorRepo->update($color);
            }else {
                return back()->with('thongbao','Can Not Edited');
            }
            return back()->with('thongbao','Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->id);
        $Color = Color::findOrFail($request->id);
        if ($Color){
            $Color->isDeleted = 0;
            $Color->update();
            //echo "string";
        }
        return back()->with('message','Xóa thành công !');
    }
}
