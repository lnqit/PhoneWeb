<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\orders;
use App\Models\orders_details;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth; 

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        //dd($cart);
        return view('client.Carts.cart', compact('cart'));
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
        $cartInfor = Cart::content();
         $order_id = orders::insertGetId([
            'order_number' => rand(),
            'isDeleted'=>true,
            'transaction_date' => Carbon::now()->toDateTimeString(),
            'status' => 1,
            'total_amount' => str_replace(',', '', Cart::total()),
            'users_id' => Auth::id(),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]); 
         $orders_data = orders::findOrFail($order_id);
        //dd($request);  
        if (count($cartInfor) > 0) {
            foreach ($cartInfor as $key => $item) {
                $orders_detail_id = orders_details::insertGetId([
                    'quantity' => $item->qty,
                    'price' => $item->price,
                    'sub_total' => $item->qty *$item->price ,
                    'order_id' => $order_id,
                    'product_id' =>$item->id,
                    'isDeleted'=>false,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);
                $orders_detail_data = orders_details::findOrFail($orders_detail_id);
            }
        }
        Cart::destroy();
        
        return back()->with('thongbao','Đã mua hàng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //dd($request);
        $product = Product::find($request->id);
        if($request->qty){
            $qty = $request->qty;
        }else{
            $qty = 1;
        }
        Cart::add(['id' => $id, 'name' => $request->product_name,'qty'=>$qty, 'price' => $request->price,'options' => ['img' => $request->product_image]]);

        return back()->with('thongbao','Đã mua hàng '.$request->product_name.' thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        Cart::remove($id);
        return back()->with('thongbao','xóa thanh cong');
    }
}
