<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\WheelProduct;
use App\Tire;

use Ixudra\Curl\Facades\Curl;

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
        // dd($cart);
        $cartData=$cart;
        foreach ($cart as $key => $item) {
            if($item['type']=='wheel'){
                $cartData[$key]['data']=WheelProduct::find($item['id']);
            }
            if($item['type']=='tire'){
                $cartData[$key]['data']=Tire::find($item['id']);
            }
        }

        return view('shopping_cart',compact('cart','cartData')); 
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
        $cart = Session::get('cart')??[];
        $flag=0;
        foreach ($cart as $key => $item) {
            if($item['id'] == $request->productid && $item['type'] == $request->prodtype){
                $flag=1;
                $cart[$key]= array(
                    "id" => $request->productid,
                    "type" => $request->prodtype,
                    "qty" => $request->qty,
                    "price" => $request->price,
                );
                break;
            }
        }
        if($flag==0){
            array_push($cart, array(
                "id" => $request->productid,
                "type" => $request->prodtype,
                "qty" => $request->qty,
                "price" => $request->price,
            ));
        }
        Session::put('cart', $cart);

        $msg = '';
        if(Session::get('user.packagetype') == 'wheeltirepackage' && $request->prodtype == 'tire'){
                $msg = '<br><b>This completes your Wheel and Tire Package, which will come mounted and balanced, ready to be installed on your vehicle</b><br>'; 
        }
        // Session::put('user.packagetype') == null;
        // Session::flash('alert-class', 'alert-danger'); 

        // dd($cart);
        // Session::flash('success','Product Added to Cart!');
        //dd(Session::get('cart'));
        return ['status'=>'success','message'=>$msg];
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
    public function update(Request $request)
    {
        $cart = Session::get('cart');
        // dd($cart);
        foreach ($cart as $key => $item) {
            if($item['id'] == $request->productid && $item['type'] == $request->prodtype){
                $flag=1;
                $cart[$key]['qty']= $request->qty;
                Session::put('cart', $cart);
                return 'success';
            }
        }
        return 'failed';

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
        foreach ($cart as $key => $item) {
            if($item['id'] == $id && $item['type'] == $type){
                unset($cart[$key]);
            }
        }
        $cart = array_values($cart);
        Session::put('cart', $cart);
        Session::flash('success','Removed one Item!!');
        return redirect()->back();
    }

   
    public function clearCart(Request $cartdata)
    {
        $cart = Session::put('cart',null);
        return redirect()->back();
    }
   
    public function getCartCount(Request $cartdata)
    {
        $cart = Session::get('cart')??[];
        return count($cart);
    }

    public function checkout()
    {   
        $cart = Session::get('cart')?:[];
        // dd($cart);
        $cartData=$cart;
        $subtotal =0;
        $total =0;
        foreach ($cartData as $key => $item) {
            if($item['type']=='wheel'){
                $cartData[$key]['data']=WheelProduct::find($item['id']);
            }
            if($item['type']=='tire'){
                $cartData[$key]['data']=Tire::find($item['id']);
            } 
            $subtotal+=$cartData[$key]['qty']*$cartData[$key]['data']->price;
        }
        $payment['subtotal']=$subtotal;

        $payment['fees']=0;

        $payment['tax']=0;

        $payment['shipping']=0;

        $payment['total']=$subtotal+($payment['fees']+$payment['tax']+$payment['shipping']);
        // dd($cartData);
        return view('checkout',compact('cart','cartData','payment')); 
    }
    
    public function zipcodeUpdate(Request $request)
    { 

        Session::put('user.zipcode', $request->zipcode);  

        $url ="http://production.shippingapis.com/ShippingApi.dll";
        $xml = "<CityStateLookupRequest USERID='502THEWH6849'><ZipCode ID='0'><Zip5>20024</Zip5></ZipCode></CityStateLookupRequest>";
        $api = "CityStateLookup";
         
         
        //The URL that you want to send your XML to.
        $url = $url."?API=".$api."&XML=".$xml;

        $response = Curl::to($url)->get();
        // $cURLConnection = curl_init();

        // curl_setopt($cURLConnection, CURLOPT_URL, $url);
        // curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        // $result = curl_exec($cURLConnection);
        // curl_close($cURLConnection);
 
        dd($response);
        //Print out the response output.
        // echo $result;


        return 'success';
    }

    public function zipcodeClear(Request $request)
    { 
        Session::put('user.zipcode', null);

        return back();
    }

}
