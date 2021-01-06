<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\orders_details;
use App\Models\users;
use App\Models\product;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->seachname != null) {
            $orders = orders::where('id','like','%'.$request->seachname.'%')->get();
            return view('admin.Orders.index',compact('orders'));
        }  
       $orders = orders::where('isDeleted',true)->with('users')->get();
        return view('admin.Orders.index',compact('orders'));
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
         $orders = orders::findOrFail($id);
         
        if ($orders) {
            $users = users::where('id','like',$orders->users_id,)->get();
            $orders_details = orders_details::where('order_id','like',$orders->id)->with('product')->get();
           
             return view('admin.Orders.show',compact('orders','users','orders_details'));
        }
       
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
       $orders =orders::findOrFail($id);
        if ($orders) {
          $orders->status = $request->status;
          $orders->update();  
          return back()->with('thongdiep','Cập nhập thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy(Request $request)
    {
        $orders = orders::findOrFail($request->id);
        if ($orders){
            $orders->isDeleted = 0;
            $orders->update();
            //echo "string";
        }
        return back()->with('message','Xóa thành công !');
    }
}
