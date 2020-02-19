<?php
namespace App\Http\Controllers;

use App\WheelProduct;
use App\Viflist;
use App\Vehicle;
use App\Wheel;
use App\CarImage;
use App\Chassis;
use App\ChassisModel;
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class WheelProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try
        {

            $products = WheelProduct::select('id', 'prodbrand', 'prodmodel', 'prodfinish', 'prodimage', 'wheeldiameter', 'wheelwidth', 'prodtitle', 'price', 'partno','wheeltype','rf_lc');

            $branddesc = [];

            // Search By Wheels Size in products
            if (isset($request->flag) && $request->flag == 'searchByWheelSize')
            {

                if (isset($request->wheeldiameter) && $request->wheeldiameter) 
                    $products = $products->where('wheeldiameter', $request->wheeldiameter);

                if (isset($request->wheelwidth) && $request->wheelwidth) 
                    $products = $products->where('wheelwidth', $request->wheelwidth);

                if (isset($request->boltpattern) && $request->boltpattern) 
                    $products = $products->where('boltpattern1', $request->boltpattern);
                    // ->orWhere('boltpattern2', $request->boltpattern)
                    // ->orWhere('boltpattern3', $request->boltpattern);

                if (isset($request->minoffset) && $request->minoffset) 
                    $products = $products->where('offset1', $request->minoffset);

                if (isset($request->maxoffset) && $request->maxoffset) 
                    $products = $products->where('offset2', $request->maxoffset);



            }
            elseif (isset($request->flag) && $request->flag == 'searchByVehicle')
            {

                $vehicle = Vehicle::select('vehicle_id', 'year', 'make', 'model', 'submodel', 'dr_chassis_id', 'dr_model_id', 'year_make_model_submodel', 'sort_by_vehicle_type','wheel_type','rf_lc')->where('year', $request->year)
                    ->where('make', $request->make)
                    ->where('model', $request->model)
                    ->where('submodel', $request->submodel)
                    ->first();
                $chassis = Chassis::where('chassis_id', $vehicle->dr_chassis_id)
                    ->first();
                $chassis_models = ChassisModel::where('chassis_id', $vehicle->dr_chassis_id)
                    ->where('model_id', $vehicle->dr_model_id)
                    ->first();
                // dd($str);
                if (strpos($chassis->pcd, '.') !== false)
                {
                    $str = substr($chassis->pcd, 0, strpos($chassis->pcd, "."));
                }
                else
                {
                    $str = $chassis->pcd;
                }
                // dd($str);
                $boltpattern = str_replace("x", "", $str)?:'Blank5';
                // dd($boltpattern,$vehicle->wheel_type);
                if($boltpattern !=''){
                    $products = $products->where('boltpattern1', $boltpattern);
                }
                $typeArray = explode(',', $vehicle->wheel_type);
                // dd($typeArray);
                $products = $products->whereIn('wheeltype', $typeArray);
                // $products = $products->where('rf_lc', $vehicle->rf_lc);
                // dd($vehicle);

            }
            else
            {
                // dd($request->all());
                // if (isset($request->brand) && $request->brand)
                // {
                //     $products = $products->whereIn('prodbrand', json_decode(base64_decode($request->brand)));
                //     $branddesc = WheelProduct::select('prodbrand','proddesc')->whereIn('prodbrand', json_decode(base64_decode($request->brand)))
                //         ->get()
                //         ->unique('prodbrand');
                // }

                if (isset($request->diameter) && $request->diameter) 
                        $products = $products->whereIn('wheeldiameter', json_decode(base64_decode($request->diameter)));

                if (isset($request->width) && $request->width) 
                        $products = $products->whereIn('wheelwidth', json_decode(base64_decode($request->width)));

                if (isset($request->search)) 
                        $products = $products->where('prodbrand', 'LIKE', '%' . json_decode(base64_decode($request->search)) . '%');
            }

            if (isset($request->brand) && $request->brand)
            {
                $products = $products->whereIn('prodbrand', json_decode(base64_decode($request->brand)));
                $branddesc = WheelProduct::select('prodbrand','proddesc')->whereIn('prodbrand', json_decode(base64_decode($request->brand)))
                    ->get()
                    ->unique('prodbrand');
                    // dd($branddesc);
            }
            $products = $products
                ->orderBy('price', 'ASC')
                ->get()
                ->unique('prodimage')
                ->toArray();
            $products = MakeCustomPaginator($products, $request, 9);

            // $products = $products
            // ->orderBy('price', 'ASC')
            // ->orderBy('prodfinish','ASC')
            // ->paginate(9);
            ///Brand with count
            $brands = WheelProduct::select('prodbrand', \DB::raw('count(*) as total'))->groupBy('prodbrand')
                ->get()
                ->sortBy('prodbrand');

            ///wheeldiameter with count
            if (isset($request->brand) && $request->brand) $wheeldiameter = WheelProduct::select('wheeldiameter', \DB::raw('count(*) as total'))->whereIn('prodbrand', json_decode(base64_decode($request->brand)))
                ->groupBy('wheeldiameter')
                ->get()
                ->sortBy('wheeldiameter');
            else $wheeldiameter = WheelProduct::select('wheeldiameter', \DB::raw('count(*) as total'))->groupBy('wheeldiameter')
                ->get()
                ->sortBy('wheeldiameter');

            ///wheelwidth with count
            if (isset($request->brand) && $request->brand) $wheelwidth = WheelProduct::select('wheelwidth', \DB::raw('count(*) as total'))->whereIn('prodbrand', json_decode(base64_decode($request->brand)))
                ->groupBy('wheelwidth')
                ->get()
                ->sortBy('wheelwidth');
            else $wheelwidth = WheelProduct::select('wheelwidth', \DB::raw('count(*) as total'))->groupBy('wheelwidth')
                ->get()
                ->sortBy('wheelwidth');
            $flag=@$request->flag?:null;
            return view('products', compact('products', 'brands', 'wheeldiameter', 'wheelwidth', 'branddesc','flag'));

        }
        catch(ModelNotFoundException $notfound)
        {
            return response()->json(['error' => $notfound->getMessage() ]);
        }
        catch(Exception $error)
        {
            return response()->json(['error' => $error->getMessage() ]);
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

    public function wheelproductview(Request $request, $product_id = '',$flag='')
    {

        $selectFields=['id','prodbrand', 'prodmodel', 'prodimage', 'wheeldiameter', 'wheelwidth', 'prodtitle','detailtitle', 'prodfinish', 'boltpattern1', 'boltpattern2', 'boltpattern3', 'offset1', 'offset2', 'hubbore', 'width', 'height', 'partno', 'price', 'price2', 'saleprice', 'qtyavail', 'salestart', 'proddesc'];

        $wheel = WheelProduct::select($selectFields)->where('id', $product_id)->first();

        // $wheelproducts = WheelProduct::select();

        if($flag == 'searchByWheelSize'){
            $products = WheelProduct::select($selectFields)->where('id', $product_id)->get();
        }else{
            $products = WheelProduct::select($selectFields)->where('prodtitle', $wheel->prodtitle)

                ->with(['DifferentOffsets'=>function($q)use($wheel){ 
                    $q->where('prodtitle', $wheel->prodtitle);
                },
                'DifferentOffsets.DifferentOffsets'=>function($q1)use($wheel){ 
                    $q1->where('prodtitle', $wheel->prodtitle);
                    // $q1->get()->unique('boltpattern1');
                },
                ])
                ->get()
                ->unique('wheeldiameter');
                // dd($products);
        }
        $similar_products = WheelProduct::select('prodimage','prodbrand','id','prodtitle','price')
            ->where('prodbrand', $wheel->prodbrand)
            ->get()
            ->unique('prodtitle');
        // dd($products[0]->DifferentOffsets);
        return view('wheel_view', compact('wheel', 'products', 'similar_products','flag'));
    }

    public function getFiltersByProductWheelSize(Request $request)
    {
        try
        {
            $wheel = new WheelProduct;

            // Diameter change or Loading filter
            if (isset($request->wheeldiameter) && $request->changeBy == 'wheeldiameter' || $request->changeBy == '') $allData['wheelwidth'] = $data = $wheel->select('wheelwidth')
                ->distinct('wheelwidth')
                ->wherewheeldiameter($request->wheeldiameter)
                ->orderBy('wheelwidth', 'DESC')
                ->get();

            // Width change  or Loading Filter
            if (isset($request->wheeldiameter) && isset($request->wheelwidth) && $request->changeBy == 'wheelwidth' || $request->changeBy == '') $allData['boltpattern'] = $data = $wheel->select('boltpattern1')
                ->distinct('boltpattern1')
                ->where('wheelwidth', $request->wheelwidth)
                ->where('wheeldiameter', $request->wheeldiameter)
                ->get();

            // boltpattern change  or Loading Filter
            if (isset($request->wheeldiameter) && isset($request->wheelwidth) && isset($request->boltpattern) && $request->changeBy == 'boltpattern' || $request->changeBy == '') $allData['minoffset'] = $data = $wheel->select('offset1')
                ->distinct('offset1')
                ->where('wheelwidth', $request->wheelwidth)
                ->where('boltpattern1', $request->boltpattern)
                ->where('wheeldiameter', $request->wheeldiameter)
                ->get();

            // minoffset change  or Loading Filter
            if (isset($request->wheeldiameter) && isset($request->wheelwidth) && isset($request->boltpattern) && isset($request->minoffset) && isset($request->minoffset) && $request->changeBy == 'minoffset' || $request->changeBy == '') $allData['maxoffset'] = $data = $wheel->select('offset2')
                ->distinct('offset1')
                ->where('wheelwidth', $request->wheelwidth)
                ->where('boltpattern1', $request->boltpattern)
                ->where('wheeldiameter', $request->wheeldiameter)
                ->where('offset1', $request->minoffset)
                ->get();

            if ($request->changeBy == '')
            {
                return response()
                    ->json(['data' => $allData]);
            }
            return response()->json(['data' => $data]);

        }
        catch(ModelNotFoundException $notfound)
        {
            return response()->json(['error' => $notfound->getMessage() ]);
        }
        catch(Exception $error)
        {
            return response()->json(['error' => $error->getMessage() ]);
        }
    }

    // public function setFiltersByProductWheelSize(Request $request){
    //     try{
    

    //         $products = WheelProduct::select('prodbrand','prodfinish','prodimage','wheeldiameter','wheelwidth','prodtitle','price','partno');
    //         if(isset($request->brand) && $request->brand)
    //             $products = $products->whereIn('prodbrand',$request->brand);
    //         if(isset($request->diameter) && $request->diameter)
    //             $products = $products->whereIn('wheeldiameter',$request->diameter);
    //         if(isset($request->width) && $request->width)
    //             $products = $products->whereIn('wheelwidth',$request->width);
    //         if(isset($request->search))
    //             $products = $products->where('prodbrand', 'LIKE', '%'.$request->search.'%');
    //         $products = $products->orderBy('price','ASC')
    //                                 // ->orderBy('prodfinish','ASC')
    //                                 ->paginate(9);
    //         ///Brand with count
    //         $brands = WheelProduct::select('prodbrand', \DB::raw('count(*) as total'))->groupBy('prodbrand')->get()->sortBy('prodbrand');
    //         ///wheeldiameter with count
    //         if(isset($request->brand) && $request->brand)
    //             $wheeldiameter = WheelProduct::select('wheeldiameter', \DB::raw('count(*) as total'))->whereIn('prodbrand',$request->brand)->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter');
    //         else
    //             $wheeldiameter = WheelProduct::select('wheeldiameter', \DB::raw('count(*) as total'))->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter');
    //         ///wheelwidth with count
    //         if(isset($request->brand) && $request->brand)
    //             $wheelwidth = WheelProduct::select('wheelwidth', \DB::raw('count(*) as total'))->whereIn('prodbrand',$request->brand)->groupBy('wheelwidth')->get()->sortBy('wheelwidth');
    //         else
    //             $wheelwidth = WheelProduct::select('wheelwidth', \DB::raw('count(*) as total'))->groupBy('wheelwidth')->get()->sortBy('wheelwidth');
    //         return view('products',compact('products','brands','wheeldiameter','wheelwidth'));
    //     }catch(ModelNotFoundException $notfound){
    //         return response()->json(['error' => $notfound->getMessage()]);
    //     }catch(Exception $error){
    //         return response()->json(['error' => $error->getMessage()]);
    //     }
    // }
    // public function setFiltersByProductVehicle(Request $request)
    // {
    //     try{
    //         $vehicle = Vehicle::select('vehicle_id','year','make','model','submodel','dr_chassis_id','dr_model_id','year_make_model_submodel','sort_by_vehicle_type')
    //         ->where('year',$request->year)
    //         ->where('make',$request->make)
    //         ->where('model',$request->model)
    //         ->where('submodel',$request->submodel)
    //         ->first();
    //         $chassis_models =ChassisModel::where('chassis_id',$vehicle->dr_chassis_id)->where('model_id',$vehicle->dr_model_id)
    //             ->first();
    //             // ->unique('tire_size');
    //         return view('products',compact('vehicle','chassis_models'));
    //     }catch(ModelNotFoundException $notfound){
    //         return response()->json(['error' => $notfound->getMessage()]);
    //     }catch(Exception $error){
    //         return response()->json(['error' => $error->getMessage()]);
    //     }
    // }
    
}

