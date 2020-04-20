<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\WheelProduct;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cart = Session::get('cart')?:[];
        $wheelproducts = new WheelProduct;
        if (array_key_exists("wheel",$cart)){
            $productIds = array_keys($cart['wheel']);
            $wheelproducts = $wheelproducts->whereIn('id',$productIds)->get();
            
        }
        return view('shopping_cart',compact('cart','wheelproducts')); 
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
        // dd($request->all());
        $cart = Session::get('cart');
        $cart[$request->prodtype][$request->productid]= array(
            "id" => $request->productid,
            "type" => $request->prodtype,
            "qty" => $request->qty,
        );

        Session::put('cart', $cart);
        Session::flash('success','Product Added to Cart!');
        //dd(Session::get('cart'));
        return 'success';
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type,$id)
    {
        $cart = Session::get('cart');
        unset($cart[$type][$id]);
        Session::put('cart', $cart);
        Session::flash('success','Removed one Item!!');
        //dd(Session::get('cart'));
        return redirect()->back();
    }

    public function addToCart(Request $request, $id)
    {
        $product = DB::select('select * from products where id='.$id);
        $cart = Session::get('cart');
        $cart[$product[0]->id] = array(
            "id" => $product[0]->id,
            "nama_product" => $product[0]->nama_product,
            "harga" => $product[0]->harga,
            "pict" => $product[0]->pict,
            "qty" => 1,
        );

        Session::put('cart', $cart);
        Session::flash('success','barang berhasil ditambah ke keranjang!');
        //dd(Session::get('cart'));
        return redirect()->back();
    }
    public function clearCart(Request $cartdata)
    {
        $cart = Session::put('cart',null);
        return redirect()->back();
    }
    public function updateCart(Request $cartdata)
    {
        $cart = Session::get('cart');

        foreach ($cartdata->all() as $id => $val) 
        {
            if ($val > 0) {
                $cart[$id]['qty'] += $val;
            } else {
                unset($cart[$id]);
            }
        }
        Session::put('cart', $cart);
        return redirect()->back();
    }
}
