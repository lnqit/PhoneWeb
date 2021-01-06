<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use  App\Repositories\Interfaces\CategoryInterface;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $CategoryRepo;


    public function __construct(CategoryInterface $categoryReponsitory)
    {
        $this->CategoryRepo = $categoryReponsitory;
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        if ($request->seachname != null) {
            $categories = Category::where('name','like','%'.$request->seachname.'%')->get();
            return view('admin.categories.index',compact('categories'));
        }
        $categories = $this->CategoryRepo->getAll();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //dd($request->all());
        $request->validated();
            $category_data = new Category([
            'name' => $request->name,
            'description' => $request->description,
            'isdeleted'=> true
        ]);
        //dd($category_data);
        //$category_data->save();
        
        if ($category_data) {
            $this->CategoryRepo->addNew($category_data);
            return redirect('admin/categories')->with('thongbao','Created Successfully');
        }else {
            return back()->with('thongbao','Can Not Edit');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrfail($id);
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->CategoryRepo->getById($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category_data = $request->all();

        $category = $this->CategoryRepo->getById($id);
            if ($category) {
            //cập nhật dữ liệu từng fiel từ form edit
            $category->name = $request->name;
            $category->description = $request->description;
            $category->updated_at = Carbon::now()->toDateTimeString();
            //cập nhật
            $this->CategoryRepo->update($category);
            }else {
                return back()->with('thongbao','Can Not Edit');
            }
            
            return back()->with('thongbao','Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->id);
        $Category = Category::findOrFail($request->id);
        if ($Category){
            $Category->isDeleted = 0;
            $Category->update();
            //echo "string";
        }
        return back()->with('message','Xóa thành công !');
    }
}
