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


        $url = "http://production.shippingapis.com/ShippingApi.dll?API=CityStateLookup&XML=%3CCityStateLookupRequest%20USERID=%22502THEWH6849%22%3E%3CZipCode%20ID=%220%22%3E%3CZip5%3E".$request->zipcode."%3C/Zip5%3E%3C/ZipCode%3E%3C/CityStateLookupRequest%3E";

        /**** Sample Reponse


        """
        <?xml version="1.0" encoding="UTF-8"?>
        <CityStateLookupResponse>
            <ZipCode ID="0">
                <Zip5>20024</Zip5>
                <City>WASHINGTON</City>
                <State>DC</State>
            </ZipCode>
        </CityStateLookupResponse>
        """

        ***/




        $response = Curl::to($url)->get();
        if($response != false){

            $xml = simplexml_load_string($response);
            $state = (string) $xml->State;
            $city = (string) $xml->City;

            dd($xml,$state,$city);
            Session::put('user.state', $state); 
            Session::put('user.city', $city); 
            Session::put('user.zipcode', $request->zipcode);  
        } else{

            Session::put('user.state', null); 
            Session::put('user.city', null); 
            Session::put('user.zipcode', null);  
        }


        //         $url ='http://production.shippingapis.com/ShippingApi.dll';
        //         $xml = '<CityStateLookupRequest USERID="502THEWH6849"><ZipCode ID="0"><Zip5>20024</Zip5></ZipCode></CityStateLookupRequest>';
        //         $api = 'CityStateLookup';
                 
                 
        //         //The URL that you want to send your XML to.
        //         $url = $url."?API=".$api."&XML=".$xml;
         
        // $headers = array(
        //     "Content-type: text/xml",
        //     "Content-length: " . strlen($xml),
        //     "Connection: close",
        // );

        // $response = Curl::to($url)->get();
        // // $cURLConnection = curl_init();
        // // curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
        // //     'Header-Key: Header-Value',
        // //     'Header-Key-2: Header-Value-2'
        // // ));
        // // curl_setopt($cURLConnection, CURLOPT_URL, $url);
        // // curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        // // $result = curl_exec($cURLConnection);
        // // curl_close($cURLConnection);
 
        // dd($response);
        // //Print out the response output.
        // // echo $result;


        // $ch = curl_init(); 
        // curl_setopt($ch, CURLOPT_URL,$url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $data = curl_exec($ch); 
        // dd($data);

        return 'success';
    }

    public function zipcodeClear(Request $request)
    { 
        Session::put('user.zipcode', null);

        return back();
    }

}
