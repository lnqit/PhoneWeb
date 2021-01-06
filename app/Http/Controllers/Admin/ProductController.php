<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use\App\Http\Requests\ProductRequest;

use\App\Models\Product;
use\App\Models\Category;
use\App\Models\Brand;
use\App\Models\City;
use\App\Models\Color;
use\App\Models\Post;
use\App\Models\Tag;
use\App\Models\Seoable;
use\App\Models\Comment;

use  App\Repositories\Interfaces\ProductInterface;

use Carbon\Carbon;

class ProductController extends Controller
{

     //khai bao repository cua no
     private $ProductRepo;

     //goi ham khoi tao
     public function __construct(ProductInterface $productreponsitory)
     {
         $this->ProductRepo = $productreponsitory;
         $this->middleware('auth');
     }

    public function index(Request $request)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $colors = Color::all();
        $cities = City::all();
        if ($request->seachname != null) {
            $products = Product::where('product_name','like','%'.$request->seachname.'%')->get();
            return view('admin.products.index',compact('products','categories','brands','cities','colors'));
        }
        if ($request->seachbrand != null) {
            $products = Product::where('brand_id','like',$request->seachbrand)->get();
           return view('admin.products.index',compact('products','categories','brands','cities','colors'));
        }
        if ($request->seachcategory != null) {
            $products = Product::where('category_id','like',$request->seachcategory)->get();
           return view('admin.products.index',compact('products','categories','brands','cities','colors'));
        }
        if ($request->seachcolor != null) {
            $products = Product::where('color_id','like',$request->seachcolor)->get();
           return view('admin.products.index',compact('products','categories','brands','cities','colors'));
        }
        if ($request->seachcity != null) {
            $products = Product::where('city_id','like',$request->seachcity)->get();
           return view('admin.products.index',compact('products','categories','brands','cities','colors'));
        }



        $products = $this->ProductRepo->getAll();
        // $categories = Category::pluck('name','id')->toArray();
        // $brands = Brand::pluck('name','id')->toArray();
        // $cities = City::pluck('name','id')->toArray();
        // $colors = Color::pluck('name','id')->toArray();
        // $products = Product::with('Brand','Category','City','Color')->get();
        return view('admin.products.index',compact('products','categories','brands','cities','colors'));
    }


    public function create()
    {
        $categories = Category::pluck('name','id')->toArray();
        $brands = Brand::pluck('name','id')->toArray();
        $cities = City::pluck('name','id')->toArray();
        $colors = Color::pluck('name','id')->toArray();
        return view('admin.products.create',compact('categories','brands','cities','colors'));
    }


    public function store(ProductRequest $request)
    {
        $request->validated();

        if ($request->hasFile('image')) {
            $request->image->move('images',$request->image->getClientOriginalName());
            $product_data = new Product([
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'product_image' => $request->image->getClientOriginalName(),
            'description' => $request->description,
            'price' => $request->price,
            'city_id' => $request->city_id,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'color_id' => $request->color_id,
            'isdeleted' => true
            
        ]);
        $this->ProductRepo->addNew($product_data);
        $product_data->save();
        }else {
          return back()->with('thongbao','Can Not Create');
        }
        return redirect('admin/products')->with('thongbao','Created Successfully');
    }


    public function show($id)
    {
        $product = Product::findOrfail($id);
        $brand = Brand::findOrfail($id);
        $category = Category::findOrfail($id);
        $city = City::findOrfail($id);
        $color = Color::findOrfail($id);
        return view('admin.products.show',compact('product','brand','category','city','color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->ProductRepo->getById($id);

        $product = Product::findOrfail($id);
        $brand = Brand::pluck('name','id')->toArray();
        $category = Category::pluck('name','id')->toArray();
        $city = City::pluck('name','id')->toArray();
        $color = Color::pluck('name','id')->toArray();
        return view('admin.products.edit',compact('product','brand','city','color','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product_data = $request->all();

        $product = $this->ProductRepo->getById($id);
        //$product = Product::findOrfail($id);
        if ($product) {
            //cập nhật dữ liệu từng fiel từ form edit
            $product->product_code = $request->product_code;
            $product->product_name = $request->product_name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->city_id = $request->city_id;
            $product->color_id = $request->color_id;
            $product->updated_at = Carbon::now()->toDateTimeString();
            //cập nhật
            $this->ProductRepo->update($product);
            //$product->update();
        }else {
            return back()->with('thongbao','Can Not Create');
        }
        return back()->with('thongbao','Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy(Request $request)
    {
        $Product = Product::findOrFail($request->id);
        if ($Product){
            $Product->isDeleted = 0;
            $Product->update();
            //echo "string";
        }
        return back()->with('message','Xóa thành công !');
    }
}
