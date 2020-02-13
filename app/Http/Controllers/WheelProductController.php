<?php

namespace App\Http\Controllers;

use App\WheelProduct;
use App\Viflist;
use App\Wheel;
use App\CarImage;
use Illuminate\Http\Request;

class WheelProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        try{ 


            $products = WheelProduct::select('prodbrand','prodfinish','prodimage','wheeldiameter','wheelwidth','prodtitle','price','partno'); 
    
            if(isset($request->brand) && $request->brand) 
                $products = $products->whereIn('prodbrand',json_decode(base64_decode($request->brand)));

            if(isset($request->diameter) && $request->diameter)
                $products = $products->whereIn('wheeldiameter',json_decode(base64_decode($request->diameter)));

            if(isset($request->width) && $request->width)
                $products = $products->whereIn('wheelwidth',json_decode(base64_decode($request->width)));

            if(isset($request->search))
                $products = $products->where('prodbrand', 'LIKE', '%'.json_decode(base64_decode($request->search)).'%');  
            $products = $products->orderBy('price','ASC')
                                    // ->orderBy('prodfinish','ASC')
                                    ->paginate(9); 
            
            // $products = $products->inRandomOrder()->paginate(9); 
            ///Brand with count
            $brands = WheelProduct::select('prodbrand', \DB::raw('count(*) as total'))->groupBy('prodbrand')->get()->sortBy('prodbrand'); 

            ///wheeldiameter with count 
            if(isset($request->brand) && $request->brand)
                $wheeldiameter = WheelProduct::select('wheeldiameter', \DB::raw('count(*) as total'))->whereIn('prodbrand',json_decode(base64_decode($request->brand)))->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter');
            else 
                $wheeldiameter = WheelProduct::select('wheeldiameter', \DB::raw('count(*) as total'))->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter'); 

            ///wheelwidth with count  
            if(isset($request->brand) && $request->brand)
                $wheelwidth = WheelProduct::select('wheelwidth', \DB::raw('count(*) as total'))->whereIn('prodbrand',json_decode(base64_decode($request->brand)))->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 
            else
                $wheelwidth = WheelProduct::select('wheelwidth', \DB::raw('count(*) as total'))->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 

            return view('products',compact('products','brands','wheeldiameter','wheelwidth')); 
            
        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
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
     * @param  \App\WheelProduct  $wheelProduct
     * @return \Illuminate\Http\Response
     */
    public function show(WheelProduct $wheelProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WheelProduct  $wheelProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(WheelProduct $wheelProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WheelProduct  $wheelProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WheelProduct $wheelProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WheelProduct  $wheelProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(WheelProduct $wheelProduct)
    {
        //
    }
}
