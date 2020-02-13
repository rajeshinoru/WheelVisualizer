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


            $products = WheelProduct::select('id','prodbrand','prodfinish','prodimage','wheeldiameter','wheelwidth','prodtitle','price','partno'); 
    
             $branddesc = [];

            // Search By Wheels Size in products
            if(isset($request->flag) && $request->flag == 'searchByWheel'){
                    // dd($request->all());
                if(isset($request->wheeldiameter) && $request->wheeldiameter) 
                    $products = $products->where('wheeldiameter',$request->wheeldiameter);

                if(isset($request->wheelwidth) && $request->wheelwidth) 
                    $products = $products->where('wheelwidth',$request->wheelwidth);

                if(isset($request->boltpattern) && $request->boltpattern) 
                    $products = $products->where('boltpattern1',$request->boltpattern)->orWhere('boltpattern2',$request->boltpattern)->orWhere('boltpattern3',$request->boltpattern);

                if(isset($request->wheeldiameter) && $request->wheeldiameter) 
                    $products = $products->where('offset1',$request->minoffset);

                if(isset($request->wheeldiameter) && $request->wheeldiameter) 
                    $products = $products->where('offset2',$request->maxoffset);
            }else{

            if(isset($request->brand) && $request->brand) {
                $products = $products->whereIn('prodbrand',json_decode(base64_decode($request->brand)));
                $branddesc = WheelProduct::select('proddesc','prodbrand')->whereIn('prodbrand',json_decode(base64_decode($request->brand)))->get()->unique('prodbrand');
            }
            
            if(isset($request->diameter) && $request->diameter)
                $products = $products->whereIn('wheeldiameter',json_decode(base64_decode($request->diameter)));

            if(isset($request->width) && $request->width)
                $products = $products->whereIn('wheelwidth',json_decode(base64_decode($request->width)));

            if(isset($request->search))
                $products = $products->where('prodbrand', 'LIKE', '%'.json_decode(base64_decode($request->search)).'%');  

            }

            $products = $products->orderBy('price','ASC')
                                    // ->orderBy('prodfinish','ASC')
                                    ->paginate(9); 
            
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

            return view('products',compact('products','brands','wheeldiameter','wheelwidth','branddesc')); 
            
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


    public function getFiltersByProductWheelSize(Request $request){
       try{
            $wheel = new WheelProduct;  

            // Diameter change or Loading filter
            if(isset($request->wheeldiameter) && $request->changeBy == 'wheeldiameter' || $request->changeBy == '')
                $allData['wheelwidth'] = $data = $wheel->select('wheelwidth')->distinct('wheelwidth')->wherewheeldiameter($request->wheeldiameter)->orderBy('wheelwidth','DESC')->get();

            // Width change  or Loading Filter
            if(isset($request->wheeldiameter) && isset($request->wheelwidth) && $request->changeBy == 'wheelwidth' || $request->changeBy == '')
                $allData['boltpattern'] = $data = $wheel->select('boltpattern1')->distinct('boltpattern1')->where('wheelwidth',$request->wheelwidth)->where('wheeldiameter',$request->wheeldiameter)->get();

            // boltpattern change  or Loading Filter
            if(isset($request->wheeldiameter) && isset($request->wheelwidth) && isset($request->boltpattern) && $request->changeBy == 'boltpattern' || $request->changeBy == '')
                $allData['minoffset'] = $data = $wheel->select('offset1')->distinct('offset1')->where('wheelwidth',$request->wheelwidth)->where('boltpattern1',$request->boltpattern)->where('wheeldiameter',$request->wheeldiameter)->get();

            // minoffset change  or Loading Filter
            if(isset($request->wheeldiameter) && isset($request->wheelwidth) && isset($request->boltpattern) && isset($request->minoffset) && isset($request->minoffset) && $request->changeBy == 'minoffset' || $request->changeBy == '')
                $allData['maxoffset'] = $data = $wheel->select('offset2')->distinct('offset1')->where('wheelwidth',$request->wheelwidth)->where('boltpattern1',$request->boltpattern)->where('wheeldiameter',$request->wheeldiameter)->where('offset1',$request->minoffset)->get();

            if($request->changeBy == ''){    
                return response()->json(['data' => $allData]);
            }
            return response()->json(['data' => $data]);

        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    }

    public function setFiltersByProductWheelSize(Request $request){

        try{ 


            $products = WheelProduct::select('prodbrand','prodfinish','prodimage','wheeldiameter','wheelwidth','prodtitle','price','partno'); 
    
            if(isset($request->brand) && $request->brand) 
                $products = $products->whereIn('prodbrand',$request->brand);

            if(isset($request->diameter) && $request->diameter)
                $products = $products->whereIn('wheeldiameter',$request->diameter);

            if(isset($request->width) && $request->width)
                $products = $products->whereIn('wheelwidth',$request->width);

            if(isset($request->search))
                $products = $products->where('prodbrand', 'LIKE', '%'.$request->search.'%');  
            $products = $products->orderBy('price','ASC')
                                    // ->orderBy('prodfinish','ASC')
                                    ->paginate(9); 
            
            ///Brand with count
            $brands = WheelProduct::select('prodbrand', \DB::raw('count(*) as total'))->groupBy('prodbrand')->get()->sortBy('prodbrand'); 

            ///wheeldiameter with count 
            if(isset($request->brand) && $request->brand)
                $wheeldiameter = WheelProduct::select('wheeldiameter', \DB::raw('count(*) as total'))->whereIn('prodbrand',$request->brand)->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter');
            else 
                $wheeldiameter = WheelProduct::select('wheeldiameter', \DB::raw('count(*) as total'))->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter'); 

            ///wheelwidth with count  
            if(isset($request->brand) && $request->brand)
                $wheelwidth = WheelProduct::select('wheelwidth', \DB::raw('count(*) as total'))->whereIn('prodbrand',$request->brand)->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 
            else
                $wheelwidth = WheelProduct::select('wheelwidth', \DB::raw('count(*) as total'))->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 

            return view('products',compact('products','brands','wheeldiameter','wheelwidth')); 
            
        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    }
}
