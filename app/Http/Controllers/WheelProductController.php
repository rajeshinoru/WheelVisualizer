<?php
namespace App\Http\Controllers;

use App\WheelProduct;
use App\Viflist;
use App\Vehicle;
use App\Wheel;
use App\CarImage;
use App\Chassis;
use App\ChassisModel;
use App\PlusSize;
use App\Dropshipper;
use App\Inventory;
use App\Offroad;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Http\Controllers\ZipcodeController as Zipcode;
use Session;
use DB;

class WheelProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function findVehicle($data){
                $vehicle = Vehicle::with('Plussizes','ChassisModels','Offroads')->select('vehicle_id','vif', 'year', 'make', 'model', 'submodel', 'dr_chassis_id', 'dr_model_id', 'year_make_model_submodel', 'sort_by_vehicle_type','wheel_type','rf_lc','offroad','dually')->where('year', $data->year)
                    ->where('make', $data->make)
                    ->where('model', $data->model);

                if(@$data->submodel){

                    $submodelBody = explode('-',$data->submodel);
                    // dd($submodelBody);
                    if(count($submodelBody) == 2 ){

                        $vehicle = $vehicle->where('submodel',$submodelBody[0])->where('body',$submodelBody[1]);
                    }elseif(count($submodelBody) == 3 ){

                        $vehicle = $vehicle->where('submodel',$submodelBody[0].'-'.$submodelBody[1])->where('body',$submodelBody[2]);
                    }
                }
                $vehicle = $vehicle->orderBy('offroad','desc')->orderBy('dually','desc')->first();  
                return $vehicle;
    }



    public function getLiftSizes(Request $request){
        
        $vehicle = Session::get('user.vehicle'); 

        $liftsizes = Offroad::where('offroadid',@$vehicle->offroad)->whereNotIn('plussizetype',['Levelkit'])->select('plussizetype')->distinct('plussizetype')->pluck('plussizetype'); 

        return $liftsizes?:null;

    

    }

    public function checkDropshippble(Request $request){
        
        $dropshippable = 0;
        if(@$request->productid){ 

            $wheelproduct = WheelProduct::find($request->productid);
            $dropshippable = $wheelproduct->dropshippable;
        }

        return ['dropshippable'=>$dropshippable];

    

    }


    public function setWheelVehicleFlow(Request $request){

        try {
            
            if($request->flag == 'searchByVehicle'){ 
                $vehicle = $this->findVehicle($request);
                Session::put('user.searchByVehicle',$request->all());  
                Session::put('user.offroadtype',null);
                Session::put('user.liftsize',null); 
                Session::put('user.vehicle',$vehicle); 
            }

            if($request->offroad){    
                if($request->offroad == 'levelkit'){
                    Session::put('user.liftsize','Levelkit'); 
                }
                Session::put('user.offroadtype',$request->offroad); 
            }
      
            if($request->liftsize){     
                Session::put('user.liftsize',$request->liftsize); 
            }

            $zipcode = Session::get('user.zipcode');
            $offroadtype = Session::get('user.offroadtype');
            $liftsize = Session::get('user.liftsize'); 
            $vehicle =  Session::get('user.vehicle'); 

            return ['status'=>true,'zipcode'=>$zipcode,'offroadtype'=>$offroadtype,'liftsize'=>$liftsize,'vehicle'=>$vehicle];


        } catch (Exception $e) {
             return ['status'=>false];
        } 
    }



    public function getVehicle(Request $request)
        
    }


    public function index(Request $request)
    {

        try
        {
            $vehicle = '';


            $zipcode =Session::get('user.zipcode');

             if($request->flag == 'searchByWheelSize'){ 
                Session::put('user.searchByWheelSize',$request->all());
             } 
 
            $products = WheelProduct::with('wheel')->select('id', 'prodbrand','detailtitle', 'prodmodel', 'prodfinish', 'prodimage', 'wheeldiameter', 'wheelwidth', 'prodtitle', 'price', 'partno','partno_old','wheeltype','rf_lc','boltpattern1','offset1','offset2','boltpattern1','wheeltype');

            // if($zipcode==null){
            //     $products= $products->where('id','<',0);
            // }

            // if($request->flag == 'searchByVehicle' && !($request->has('liftsize'))){
            //     $products= $products->where('id','<',0);
            // }


            $branddesc = [];
            $car_images='';
            $offroadtype=null;
            $liftsize=null;

            if(@$request->wheeltype){
                $wheeltype = base64_decode($request->wheeltype);
                // dd($wheeltype);
                if($request->wheeltype){
                    $products = $products->where('wheeltype','LIKE','%'.$wheeltype.'%');  
                }
            }
             

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
                    $products = $products->where('offset1','>=', $request->minoffset);
                    // $products = $products->whereBetween('offset1', [$request->minoffset, $request->maxoffset]);

                if (isset($request->maxoffset) && $request->maxoffset) 
                    $products = $products->where('offset1','<=',$request->maxoffset);
            }
            elseif (isset($request->flag) && $request->flag == 'searchByVehicle')
            {

                $vehicle = Session::get('user.vehicle');
                $liftsize = Session::get('user.liftsize');
                $offroadtype = Session::get('user.offroadtype');
  

                if(@$vehicle->dually =='1' && ($offroadtype == 'stock' || $offroadtype == null)){
                    $products->where('wheeltype','LIKE','%D%'); 
                }
 
            
                //Offroad Checking Flow for Shop by Vehicle

                $offroadSizes = [];

                if(@$liftsize){

                    $offroadSizes = Offroad::where('offroadid',@$vehicle->offroad)->where('plussizetype',$liftsize)->get(); 
                }



                // Wheel Visualiser Flow for Shop by Vehicle
                if(@$vehicle->vif != null){
                    $car_images = CarImage::select('car_id','image','color_code')->wherecar_id(@$vehicle->vif)->where('image', 'LIKE', '%.png%')
                    ->with(['CarViflist' => function($query) {
                        $query->select('vif', 'yr','make','model','body','drs','whls');

                    },'CarColor'])->first();
                }

                // dd($vehicle,$car_images);
                $chassis_models = ChassisModel::where('model_id', @$vehicle->dr_model_id)->first();
                // dd($chassis_models);

                $chassis = Chassis::where('chassis_id', @$vehicle->dr_chassis_id)->first(); 

                 
                if(@$liftsize){
                     
                        $products = $products->where(function ($query) use($offroadSizes) {
                             
                            foreach ($offroadSizes as $key => $offroadSize) {  
                                $query->orwhere('detailtitle', 'like',  '%' . $offroadSize->wheeldiameter.'x'.$offroadSize->wheelwidth .'%')->whereBetween('offset1', [$offroadSize->offsetmin, $offroadSize->offsetmax]);
                             }      
                        });  
                }else{



                        //*********************** Offset checking **************************
                        
                        if($chassis_models->rim_size_r == null || $chassis_models->rim_size_r == 'NULL'){
                            $products = $products->whereBetween('offset1', [$chassis->min_et_front, $chassis->max_et_front]);
                        }else{

                            $products = $products->whereBetween('offset1', [$chassis->min_et_front, $chassis->max_et_front]);
                            $products = $products->whereBetween('offset1', [$chassis->min_et_rear, $chassis->max_et_rear]);
                        }

                        //*********************** Plus Size checking **************************


                        $plusSizes = PlusSize::where('chassis_id',@$vehicle->dr_chassis_id)->get(); 


                        $plusSizesArray=array(); $diameterSizesArray=array();

                        $rimsizearray = explode('x', $chassis_models->rim_size);
                        $widthPart2 = $widthPart1 = str_replace(" ", "", $rimsizearray[0])?:$rimsizearray[0];
                        $diameterPart2 = $diameterPart1 = str_replace(" ", "", $rimsizearray[1])?:$rimsizearray[1];

                        foreach ($plusSizes as $key => $plusSize) {
                            
                            $wheelsizearray = explode('x', $plusSize->wheel_size);
                            $width = str_replace(" ", "", $wheelsizearray[0])?:$wheelsizearray[0];
                            $diameter = str_replace(" ", "", $wheelsizearray[1])?:$wheelsizearray[1];
                            if($width > $widthPart2 ){
                                $widthPart2 = $width;
                            }
                            if($diameter > $diameterPart2 ){
                                $diameterPart2 = $diameter;
                            }
                        }

                        // dd([$diameterPart1,$diameterPart2],[$widthPart1,$widthPart2]);
                        $products = $products->whereBetween('wheeldiameter',[$diameterPart1,$diameterPart2]);
                        $products = $products->whereBetween('wheelwidth',[$widthPart1,$widthPart2]);

                }


                //*********************** BCD Bolt Pattern checking **************************
                if (strpos($chassis->pcd, '.') !== false)
                {
                    $str = substr($chassis->pcd, 0, strpos($chassis->pcd, "."));
                }
                else
                {
                    $str = $chassis->pcd;
                }

                $boltpattern = (str_replace("x", "", $str)?:'')?:'Blank5';
                if($boltpattern != ''){
                    $products = $products->whereIn('boltpattern1', [$boltpattern,'Blank5']);
                }

                // $request->flag = 'searchByWheelSize';
                // dd($plusSizesArray,$boltpattern,$diameterPart);
            }

            // Wheel Width size search in the Sidebar
            $wheelwidth = clone $products;

            if (isset($request->brand) && $request->brand) {
                $wheelwidth = $wheelwidth->whereIn('prodbrand', json_decode(base64_decode($request->brand)));
            }

            if (isset($request->diameter) && $request->diameter) {
                $wheelwidth = $wheelwidth->whereIn('wheeldiameter', json_decode(base64_decode($request->diameter)));
            }
            
            if (isset($request->finish) && $request->finish) {
                $wheelwidth = $wheelwidth->whereIn('prodfinish', json_decode(base64_decode($request->finish)));
            }

            $wheelwidth =  $wheelwidth->select('wheelwidth', \DB::raw('count(DISTINCT prodtitle) as total'))
            ->groupBy('wheelwidth')
            ->get()
            ->sortBy('wheelwidth');

            // Wheel Diameter size search in the Sidebar

            $wheeldiameter = clone $products;
            // dd($wheeldiameter);
            if (isset($request->brand) && $request->brand) {
                $wheeldiameter = $wheeldiameter->whereIn('prodbrand', json_decode(base64_decode($request->brand)));
            }

            if (isset($request->width) && $request->width) {
                $wheeldiameter = $wheeldiameter->whereIn('wheelwidth', json_decode(base64_decode($request->width)));
            }
            
            if (isset($request->finish) && $request->finish) {
                $wheeldiameter = $wheeldiameter->whereIn('prodfinish', json_decode(base64_decode($request->finish)));
            }

            $wheeldiameter =  $wheeldiameter->select('wheeldiameter', \DB::raw('count(DISTINCT prodtitle) as total'))
            ->groupBy('wheeldiameter')
            ->get()
            ->sortBy('wheeldiameter');


            // Wheel Brands size search in the Sidebar

            $countsByBrand = clone $products;
            
            if (isset($request->diameter) && $request->diameter) {
                $countsByBrand = $countsByBrand->whereIn('wheeldiameter', json_decode(base64_decode($request->diameter)));
            }

            if (isset($request->width) && $request->width) {
                $countsByBrand = $countsByBrand->whereIn('wheelwidth', json_decode(base64_decode($request->width)));
            }

            if (isset($request->finish) && $request->finish) {
                $countsByBrand = $countsByBrand->whereIn('prodfinish', json_decode(base64_decode($request->finish)));
            }
            
            $brands =  $countsByBrand->select('prodbrand')
            ->groupBy('prodbrand')
            ->get()
            ->sortBy('prodbrand');
            
            $countsByBrand = $countsByBrand->select('prodbrand', \DB::raw('count(DISTINCT prodtitle) as total'))
            ->groupBy('prodbrand')
            ->pluck('total','prodbrand');

            // Wheel Finish size search in the Sidebar

            $wheelfinish = clone $products;

            if (isset($request->brand) && $request->brand) {
                $wheelfinish = $wheelfinish->whereIn('prodbrand', json_decode(base64_decode($request->brand)));
            }

            if (isset($request->diameter) && $request->diameter) {
                $wheelfinish = $wheelfinish->whereIn('wheeldiameter', json_decode(base64_decode($request->diameter)));
            }
            
            if (isset($request->width) && $request->width) {
                $wheelfinish = $wheelfinish->whereIn('wheelwidth', json_decode(base64_decode($request->width)));
            }

            $wheelfinish =  $wheelfinish->select('prodfinish', \DB::raw('count(DISTINCT prodtitle) as total'))
            ->groupBy('prodfinish')
            ->get()
            ->sortBy('prodfinish');

            // Filters  for Main listing products ------------------------->

            if (isset($request->brand) && $request->brand)
            {
                $products = $products->whereIn('prodbrand', json_decode(base64_decode($request->brand)));
                $branddesc = WheelProduct::select('prodbrand','proddesc')->whereIn('prodbrand', json_decode(base64_decode($request->brand)))
                    ->get()
                    ->unique('prodbrand');
            }

            if (isset($request->finish) && $request->finish) 
                    $products = $products->whereIn('prodfinish', json_decode(base64_decode($request->finish)));

            if (isset($request->diameter) && $request->diameter) 
                    $products = $products->whereIn('wheeldiameter', json_decode(base64_decode($request->diameter)));

            if (isset($request->width) && $request->width) 
                    $products = $products->whereIn('wheelwidth', json_decode(base64_decode($request->width)));
 

            if (isset($request->search) && $request->search) {

                $searchText = base64_decode($request->search);

                $searchTerms = explode(' ', $searchText);
                $products = new WheelProduct; 
                // $tires = $tires->where('id','>',0);
                foreach ($searchTerms as $key => $term) {
                        $products = $products 
                            ->where('detailtitle', 'LIKE', '%' . $term . '%');
                }

                if($products->count() <= 0){
                    // dd($products->count());
                    $products = new WheelProduct; 
                    foreach ($searchTerms as $key => $term) {
     
                            $products = $products
                                ->orWhere('partno', 'LIKE', '%' . $term . '%')
                                ->orWhere('wheeldiameter', 'LIKE', '%' . $term . '%') //->orderBy('tirewidth','ASC')
                                ->orWhere('wheelwidth', 'LIKE', '%' . $term . '%') //->orderBy('tireprofile','ASC')
                                ->orWhere('prodbrand', 'LIKE', '%' . $term . '%') //->orderBy('tirediameter','ASC') 
                                ->orWhere('prodmodel', 'LIKE', '%' . $term . '%') //->orderBy('prodbrand','ASC')
                                ->orWhere('prodfinish', 'LIKE', '%' . $term . '%') //->orderBy('prodmodel','ASC')
                                // ->where('detailtitle', 'LIKE', '%' . $term . '%') //->orderBy('prodmodel','ASC')
                                ;
                    }
                }

            }

            // if zipcode is available....
            if($zipcode != null){
                $zipcodes = Zipcode::getZipcodesByRadius($zipcode,'150');
                // dd($zipcodes);
                // $zipcodes = array(
                //     0 => "32218",
                //     4 => "32226",
                //     6 => "32208",
                //     7 => "32206",
                //     8 => "32209",
                //     9 => "32204",
                //     10 => "32225",
                //     11 => "32231",
                //     12 => "32216",
                //     13 => "32227",
                //     14 => "32220",
                //     15 => "32210",
                //     16 => "32266",
                //     17 => "32240",
                //     18 => "32257",
                //     19 => "32009",
                //     20 => "32004",
                //     21 => "32006",
                //     22 => "32258",
                //     23 => "31548",
                //     24 => "31562",
                //     25 => "32259",
                //     26 => "32260",
                //     27 => "32234",
                //     29 => "32068",
                //     30 => "31569",
                //     31 => "32067",
                //     32 => "32063",
                //     33 => "32040",
                //     34 => "31537",
                //     35 => "32092",
                //     38 => "32058",
                //     40 => "31565",
                //     41 => "32095",
                //     42 => "32083",
                //     43 => "32085",
                //     44 => "31568",
                //     45 => "32091",
                //     47 => "32007",
                //     48 => "31521",
                //     49 => "31523",
                // );
            // dd($zipcodes);
 
 
                $products = $products->with([
                                    'Inventories'=>function ($query){ 
                                                        $query->select('available_qty','partno');
                                                        $query->where('available_qty','>=',4); 
                                                        $query->orderBy('available_qty','DESC'); 
                                    },
                                    'Inventories.Dropshippers'=>function ($query) use($zipcodes){
                                                        $query->select('zip','code'); 
                                                        $query->whereIn('zip',$zipcodes); 
                                    }
                                ])    
                ->orderBy('price', 'ASC');  
                // $radius_products = collect([9,7,8,2,4,6]);
                // rsort($radius_products);
                // $products = collect([1,2,3,4,5,6]);
                // if($radius_products->count() > 0){

                //     foreach ($radius_products as $key => $rproduct) {
                //         $products->prepend($rproduct);
                //     }
                // }
                // dd($products->get());
                // $radius_products = $radius_products         
                // ->orderBy('price', 'ASC')
                // ->get()
                // ->unique('prodtitle');
                // $products = WheelProduct::limit(10);
                // dd('dkjskdj');
 
            }else{


                $products = $products->with([
                                        'Inventories'=>function ($query){ 
                                                            $query->select('available_qty','partno');
                                                            $query->where('available_qty','>=',4); 
                                                            $query->orderBy('available_qty','DESC'); 
                                        }
                                    ])      
                ->orderBy('price', 'ASC');
            }                       
 
            // $products= collect([]);//
            $products = $products->get()->unique('prodtitle'); 
            // if($zipcode != null){
            //     // $products =collect($radius_products->merge($products)); 
            //     $products =$products->merge($radius_products);

            // }  
            // $products = $products->unique('prodtitle');
 
            $products = MakeCustomPaginator($products, $request, 9);
            // dd($products);
            $flag=@$request->flag?:null;


            // dd($vehicle);

            if($vehicle){
                Session::put('user.vehicle',$vehicle);
            }else{

                Session::put('user.vehicle',null);
            } 

            return view('products', compact('products', 'brands', 'wheeldiameter', 'wheelwidth','wheelfinish', 'branddesc','flag','countsByBrand','vehicle','request','car_images','zipcode','liftsize','offroadtype'));

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

        $wheel = WheelProduct::select($selectFields)->with('Reviews','Reviews.Ratings')->where('id', $product_id)->first();

        // $wheelproducts = WheelProduct::select();

        if($flag == 'searchByWheelSize' || $flag == 'searchByVehicle'){
            $products = WheelProduct::select($selectFields)->where('id', $product_id)
                ->with(['DifferentOffsets'=>function($q)use($wheel){ 
                    $q->where('prodtitle', $wheel->prodtitle);
                    $q->where('boltpattern1', $wheel->boltpattern1);
                    $q->where('offset1', $wheel->offset1);
                },
                'DifferentOffsets.DifferentOffsets'=>function($q1)use($wheel){ 
                    $q1->where('prodtitle', $wheel->prodtitle);
                    $q1->where('boltpattern1', $wheel->boltpattern1);
                    $q1->where('offset1', $wheel->offset1);
                    // $q1->get()->unique('boltpattern1');
                },'Reviews','Reviews.Ratings'
                ])
                ->get();
        }else{
            $products = WheelProduct::select($selectFields)->where('prodtitle', $wheel->prodtitle)

                ->with(['DifferentOffsets'=>function($q)use($wheel){ 
                    $q->where('prodtitle', $wheel->prodtitle);
                },
                'DifferentOffsets.DifferentOffsets'=>function($q1)use($wheel){ 
                    $q1->where('prodtitle', $wheel->prodtitle);
                    // $q1->get()->unique('boltpattern1');
                },'Reviews','Reviews.Ratings'
                ])
                ->get()
                ->unique('wheeldiameter');
                // dd($products);
        }
        // dd($products);
        $vehicle = (object)Session::get('user.searchByVehicle')??[];
        $wheelsize = (object)Session::get('user.searchByWheelSize')??[];
        $similar_products = WheelProduct::select('prodimage','prodbrand','id','prodtitle','price')
            ->where('prodbrand', $wheel->prodbrand)
            ->get()
            ->unique('prodtitle');
        // dd($products[0]->DifferentOffsets);
        return view('wheel_view', compact('wheel', 'products', 'similar_products','flag','vehicle','wheelsize'));
    }

    public function wheeltirepackage(Request $request, $product_id = '',$flag='',$is_shipped='')
    { 
        $selectFields=['id','prodbrand', 'prodmodel', 'prodimage', 'wheeldiameter', 'wheelwidth', 'prodtitle','detailtitle', 'prodfinish', 'boltpattern1', 'boltpattern2', 'boltpattern3', 'offset1', 'offset2', 'hubbore', 'width', 'height', 'partno', 'price', 'price2', 'saleprice', 'qtyavail', 'salestart', 'proddesc'];

        $wheel = WheelProduct::where('id', $product_id)->first();
    
        $vehicle = $this->findVehicle((object)Session::get('user.searchByVehicle')??[]);  

        if($flag == 'searchByVehicle'){
            // dd((object)Session::get('user.searchByVehicle')??[]);

            if($is_shipped!=''){
                return redirect('/tirelist/'.base64_encode($vehicle->ChassisModels->id).'/'.base64_encode($vehicle->vehicle_id).'/'.base64_encode($wheel->id).'/'.base64_encode('shipped'));
            }else{
                return redirect('/tirelist/'.base64_encode($vehicle->ChassisModels->id).'/'.base64_encode($vehicle->vehicle_id).'/'.base64_encode($wheel->id));
            }
            // return redirect('/tirelist/'.base64_encode($vehicle->ChassisModels->id).'/'.base64_encode($vehicle->vehicle_id));

        }else{
                        
            // $rimsize = getWheelDiameterToRim($wheel->wheeldiameter,$wheel->wheelwidth);
            // $plussizes = PlusSize::where('wheel_size',$rimsize)->get();
            
        }

        // dd($vehicle);
 
        $vehicle = (object)Session::get('user.searchByVehicle')??[];
        $wheelsize = (object)Session::get('user.searchByWheelSize')??[];
        $similar_products = WheelProduct::select('prodimage','prodbrand','id','prodtitle','price')
            ->where('prodbrand', $wheel->prodbrand)
            ->get()
            ->unique('prodtitle');
        // dd($products[0]->DifferentOffsets);
        return view('wheel_view', compact('wheel', 'products', 'similar_products','flag','vehicle','wheelsize'));
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
            if (isset($request->wheeldiameter) && isset($request->wheelwidth) && isset($request->boltpattern) && $request->changeBy == 'boltpattern' || $request->changeBy == ''){

                $allData['minoffset'] = $data = $wheel->select('offset1')
                ->distinct('offset1')
                ->where('wheelwidth', $request->wheelwidth)
                ->where('boltpattern1', $request->boltpattern)
                ->where('wheeldiameter', $request->wheeldiameter)
                ->orderBy('offset1','ASC')
                ->get();

            } 

            // minoffset change  or Loading Filter
            if (isset($request->wheeldiameter) && isset($request->wheelwidth) && isset($request->boltpattern) && isset($request->minoffset) && isset($request->minoffset) && $request->changeBy == 'minoffset' || $request->changeBy == ''){

                $allData['maxoffset'] = $data = $wheel->select('offset1')
                ->distinct('offset1')
                ->where('wheelwidth', $request->wheelwidth)
                ->where('boltpattern1', $request->boltpattern)
                ->where('wheeldiameter', $request->wheeldiameter)
                ->where('offset1', '>',$request->minoffset)
                ->orderBy('offset1','ASC')
                ->get();
            }

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
}

