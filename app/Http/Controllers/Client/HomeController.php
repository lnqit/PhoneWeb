<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\City;
use App\Models\Post;
use App\Models\Brand;
use App\Models\orders;
use App\Models\orders_details;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('isDeleted',true)->get();
        $Category = Category::where('isDeleted',true)->get();
        $Brand = Brand::where('isDeleted',true)->get();
        //dd($product);
        return view('client.home',compact('product','Category','Brand'));
    }

    public function indexBrand($id)
    {
        //dd($id);
        $brand = Brand::findOrFail($id);
        $product = Product::where('isDeleted',true)->where('brand_id',$id)->with('Category')->get();
        //dd($product);
        return view('client.danhsach.indexBrand',compact('product','brand'));
    }

    public function search(Request $request)
    {
        //dd($request);
        if($request->search != null){
            $product = Product::where('isDeleted',true)->where('product_name','like','%'.$request->search.'%')->with('Category')->get();
        //dd($product);
        return view('client.danhsach.search',compact('product'));
        }
        if($request->search == null){
            $product = Product::where('isDeleted',true)->with('Category')->get();
     
            return view('client.danhsach.search',compact('product'));
        }
      
        
    }
    
     public function indexCategory($id)
    {
        //dd($id);
        $category = Category::findOrFail($id);
        $product = Product::where('isDeleted',true)->where('category_id',$id)->with('Category')->get();
        //dd($product);
        return view('client.danhsach.indexCategory',compact('product','category'));
    }

    public function blog()
    {
        //dd($id);
         $post = Post::where('isDeleted',true)->get();
        //dd($product);
        return view('client.danhsach.blog',compact('post'));
    }

    public function showBlog($id)
    {
        //dd($id);
        $post = Post::findOrFail($id);
         //dd($post);
         //2. show dữ liệu
         return view('client.posts.show',compact('post'));
    }

    public function historyOrder()
    {
        //dd($id);
         //2. show dữ liệu
        $orders = orders::where('users_id',Auth::id())->where('isDeleted',true)->with('orders_details')->get();
        //dd($orders);
         return view('client.OrderDetail.historyOrder',compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::findOrfail($id);
         
        return view('client.products.chitiet',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
