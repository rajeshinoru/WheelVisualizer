<?php

namespace App\Http\Controllers;

use App\Tire;
use App\ChassisModel;
use App\Vehicle;
use Illuminate\Http\Request;
use DB;
class TireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tires');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request,$chassis_model_id='',$vehicle_id='')
    {

        $tires = new Tire;

        $tires = $tires->select('prodimage','id','prodtitle','tiresize','loadindex','speedrating',
                    'price','prodmodel','tirewidth','tireprofile','tirediameter');
        // dd(base64_decode($chassis_model_id));
        $chassis_model = ChassisModel::find(base64_decode($chassis_model_id)) ?? null;
        $vehicle = Vehicle::where('vehicle_id',base64_decode($vehicle_id))->first() ?? null;

        if($request->has('tirebrand')){
            if($request->tirebrand !=''){
                $tires = $tires->whereIn('prodbrand',json_decode(base64_decode($request->tirebrand)));
            }
        }
        if($request->has('tirespeedrating')){
            if($request->tirespeedrating !=''){
                $tires = $tires->where('speedrating',json_decode(base64_decode($request->tirespeedrating)));
            }
        }
        if($request->has('tireloadindex')){
            if($request->tireloadindex !=''){
                $tires = $tires->whereIn('loadindex',json_decode(base64_decode($request->tireloadindex)));
            }
        }
        if($request->has('minprice')){
            if($request->minprice !=''){
                $tires = $tires->where('price','>',json_decode(base64_decode($request->minprice)));
            }
        }
        
        if($request->has('maxprice')){
            if($request->maxprice !=''){
                $tires = $tires->where('price','<',json_decode(base64_decode($request->maxprice)));
            }
        }


        if( $chassis_model_id!='' && $vehicle_id!=''){
            $tires = $tires->where('tiresize','like', '%' . @$chassis_model->tire_size . '%');
        }else{

            if($request->has('width')){
                $tires = $tires->where('tirewidth',$request->width);
            }

            if($request->has('profile')){
                $tires = $tires->where('tireprofile',$request->profile);
            }

            if($request->has('diameter')){
                $tires = $tires->where('tirediameter',$request->diameter);
            }
        }


        // Load index search in the Sidebar

        $load_indexs = clone $tires;

        if (isset($request->tirebrand) && $request->tirebrand) {
            $load_indexs = $load_indexs->whereIn('prodbrand', json_decode(base64_decode($request->tirebrand)));
        }

        if (isset($request->speedrating) && $request->speedrating) {
            $load_indexs = $load_indexs->whereIn('speedrating', json_decode(base64_decode($request->speedrating)));
        }

        $load_indexs =  $load_indexs->select('loadindex', \DB::raw('count(DISTINCT prodmodel) as total'))
        ->groupBy('loadindex')
        ->get()
        ->sortBy('loadindex');



        // Speed Ratings search in the Sidebar

        $speedratings = clone $tires;

        if (isset($request->tirebrand) && $request->tirebrand) {
            $speedratings = $speedratings->whereIn('prodbrand', json_decode(base64_decode($request->tirebrand)));
        }

        if (isset($request->loadindex) && $request->loadindex) {
            $speedratings = $speedratings->whereIn('loadindex', json_decode(base64_decode($request->loadindex)));
        }

        $speedratings =  $speedratings->select('speedrating', \DB::raw('count(DISTINCT prodmodel) as total'))
        ->groupBy('speedrating')
        ->get()
        ->sortBy('speedrating');



            // Tire Brands search in the Sidebar

            $countsByBrand = clone $tires;
            
            if (isset($request->tirebrand) && $request->tirebrand) {
                $countsByBrand = $countsByBrand->whereIn('prodbrand', json_decode(base64_decode($request->tirebrand)));
            }

            if (isset($request->loadindex) && $request->loadindex) {
                $countsByBrand = $countsByBrand->whereIn('loadindex', json_decode(base64_decode($request->loadindex)));
            }

            $countsByBrand = $countsByBrand->select('prodbrand', \DB::raw('count(DISTINCT prodmodel) as total'))
            ->groupBy('prodbrand')
            ->pluck('total','prodbrand');

            $brands =  Tire::select('prodbrand')
            ->groupBy('prodbrand')
            ->get()
            ->sortBy('prodbrand');
            $prices =  Tire::select('price')
            ->groupBy('price')
            ->get()
            ->sortBy('price');
        $tires = $tires
            ->orderBy('price', 'ASC')
            ->get()
            ->unique('prodmodel')
            ->toArray();

        if(count($tires) == 0){

            $load_indexs =  Tire::select('loadindex', \DB::raw('count(DISTINCT prodmodel) as total'))
            ->groupBy('loadindex')
            ->get()
            ->sortBy('loadindex');

            $speedratings =  Tire::select('speedrating', \DB::raw('count(DISTINCT prodmodel) as total'))
            ->groupBy('speedrating')
            ->get()
            ->sortBy('speedrating');
            $countsByBrand = Tire::select('prodbrand', \DB::raw('count(DISTINCT prodmodel) as total'))
                ->groupBy('prodbrand')
                ->pluck('total','prodbrand');
        }

        $tires = MakeCustomPaginator($tires, $request, 8);
        // dd($tires);
        // dd($speedratings,json_decode(base64_decode($request->tirespeedrating)));
        return view('tires_list',compact('tires','vehicle','chassis_model','load_indexs','speedratings','brands','countsByBrand','prices'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tireview(Request $request,$tire_id='')
    {
        $tire = Tire::select('prodimage','warranty','detailtitle','prodbrand','tiresize','prodmodel',
                'speedrating','loadindex','utqg','partno','originalprice','price','saletype','qtyavail',
                'dry_performance','wet_performance','mileage_performance','ride_comfort','quiet_ride',
                'winter_performance','fuel_efficiency','proddesc','benefits1','benefits2','benefits3','benefits4','benefitsimage1','benefitsimage2','benefitsimage3','benefitsimage4','badge1','badge2','badge3','detaildesctype','detaildescfeatures')
                ->where('id',base64_decode($tire_id))
                ->with(['Brand'])->first();
        $diff_tires =  Tire::select('id','warranty','tiresize',
                'speedrating','loadindex','utqg','partno','price','prodmodel')
                ->where('tiresize',$tire->tiresize)
                ->with(['Brand'])
                ->get();

        $similar_tires = Tire::select('detailtitle','prodimage','id','warranty','tiresize',
                'speedrating','loadindex','utqg','partno','price','prodmodel')
                ->where('prodbrand',$tire->prodbrand)
                // ->orWhere('tirewidth',$tire->tirewidth)
                // ->orWhere('tirediameter',$tire->tirediameter)
                ->get()
                ->unique('prodmodel');
        return view('tire_view',compact('tire','diff_tires','similar_tires'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand(Request $request,$brand_name='')
    {
        $tires = new Tire;
        
        if($brand_name != ''){
                $tires = $tires->where('prodbrand',base64_decode($brand_name));
        }

        $tires = $tires->select('prodimage','prodtitle','prodmodel','price','id','prodbrand','detaildesctype')
                ->with(['Brand'])
                ->orderBy('price','ASC')
                ->get()
                ->unique('prodmodel');
        $tire = $tires->first();
        return view('tire_brand',compact('tires','tire'));
    }

    public function tirebrandmodel(Request $request,$tire_id='')
    {
        $tire = Tire::with(['Brand'])->where('id',base64_decode($tire_id))->first();
        $diff_tires =  Tire::with(['Brand'])->where('prodmodel',$tire->prodmodel)->get();
        return view('tire_brand_model',compact('tire','diff_tires'));
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
     * @param  \App\Tire  $tire
     * @return \Illuminate\Http\Response
     */
    public function show(Tire $tire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tire  $tire
     * @return \Illuminate\Http\Response
     */
    public function edit(Tire $tire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tire  $tire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tire $tire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tire  $tire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tire $tire)
    {
        //
    }


    /**
     * Search the records by filters.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function getFiltersByTire(Request $request)
    {
        try{
            $tire = new Tire;  

            // Width change or Loading filter
            if(isset($request->width) && $request->changeBy == 'width' || $request->changeBy == '')
                $allData['profile'] = $data = $tire->select('tireprofile')->distinct('tireprofile')->wheretirewidth($request->width)->orderBy('tireprofile','DESC')->get();

            // Profile change  or Loading Filter
            if(isset($request->width) && isset($request->profile) && $request->changeBy == 'profile' || $request->changeBy == '')
                $allData['diameter'] = $data = $tire->select('tirediameter')->distinct('tirediameter')->where('tirewidth',$request->width)->where('tireprofile',$request->profile)->get();

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
    // /**
    //  * Search the records by filters.
    //  *
    //  * @param  \App\Vehicle  $vehicle
    //  * @return \Illuminate\Http\Response
    //  */
    // public function setFiltersByTire(Request $request)
    // {
    //     try{
    //         $tires = Tire::select('prodimage','id','prodtitle','tiresize','loadindex','speedrating',
    //                 'price','prodmodel','tirewidth','tireprofile','tirediameter')
    //                 ->where('tirewidth',$request->width)
    //                 ->where('tireprofile',$request->profile)
    //                 ->where('tirediameter',$request->diameter)
    //                 ->get();  
    //         $load_indexs =Tire::select('loadindex', \DB::raw('count(*) as total'))->groupBy('loadindex')->get()->sortBy('loadindex');
        
    //         $speedratings =Tire::select('speedrating', \DB::raw('count(*) as total'))->groupBy('speedrating')->get()->sortBy('speedrating');

    //         return view('tires_list',compact('tires','load_indexs','speedratings'));

    //     }catch(ModelNotFoundException $notfound){
    //         return response()->json(['error' => $notfound->getMessage()]); 
    //     }catch(Exception $error){
    //         return response()->json(['error' => $error->getMessage()]); 
    //     }
    // }



    public function Falken_Import(){
         // $in_file = public_path('/storage/tires_data/Falken-Export.csv'); 
         // $in_file = public_path('/storage/tires_data/Conti-Web-02-08.csv'); 
         $in_file = public_path('/storage/tires_data/Continental-02-24-20 (1).csv'); 


        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        $i=1;
        while( ($data = fgetcsv($fr, 2000, ",")) !== FALSE ) {
                if($i != 1){

                    $tire =Tire::where('partno',$data[0])->first();
                    if($tire==null){
                        $tire=new Tire;
                    }
                    $tire->partno = isset($data[0])?$data[0]:null;
                    $tire->prodtitle = isset($data[1])?$data[1]:null;
                    $tire->prodbrand = isset($data[2])?$data[2]:null;
                    $tire->prodmodel = isset($data[3])?$data[3]:null;
                    $tire->prodmetadesc = isset($data[4])?$data[4]:null;
                    $tire->prodimage = isset($data[5])?$data[5]:null;
                    $tire->prodimageshow = isset($data[6])?$data[6]:null;
                    $tire->prodsortcode = isset($data[7])?$data[7]:null;
                    $tire->prodheaderid = isset($data[8])?$data[8]:null;
                    $tire->prodfooterid = isset($data[9])?$data[9]:null;
                    $tire->prodinfoid = isset($data[10])?$data[10]:null;
                    $tire->proddesc = isset($data[11])?$data[11]:null;
                    $tire->tirewidth = isset($data[12])?$data[12]:null;
                    $tire->tireprofile = isset($data[13])?$data[13]:null;
                    $tire->tirediameter = isset($data[14])?$data[14]:null;
                    $tire->tiresize = isset($data[15])?$data[15]:null;
                    $tire->speedrating = isset($data[16])?$data[16]:null;
                    $tire->loadindex = isset($data[17])?$data[17]:null;
                    $tire->ply = isset($data[18])?$data[18]:null;
                    $tire->utqg = isset($data[19])?$data[19]:null;
                    $tire->warranty = isset($data[20])?$data[20]:null;
                    $tire->detailtitle = isset($data[21])?$data[21]:null;
                    $tire->keywords = isset($data[22])?$data[22]:null;
                    $tire->price = isset($data[23])?$data[23]:null;
                    $tire->price2 = isset($data[24])?$data[24]:null;
                    $tire->cost = isset($data[25])?$data[25]:null;
                    $tire->rate = isset($data[26])?$data[26]:null;
                    $tire->saleprice = isset($data[27])?$data[27]:null;
                    $tire->saletype = isset($data[28])?$data[28]:null;
                    $tire->salestart = isset($data[29])?$data[29]:null;
                    $tire->saleexp = isset($data[30])?$data[30]:null;
                    $tire->weight = isset($data[31])?$data[31]:null;
                    $tire->length = isset($data[32])?$data[32]:null;
                    $tire->width = isset($data[33])?$data[33]:null;
                    $tire->height = isset($data[34])?$data[34]:null;
                    $tire->shpsep = isset($data[35])?$data[35]:null;
                    $tire->shpfree = isset($data[36])?$data[36]:null;
                    $tire->shpcode = isset($data[37])?$data[37]:null;
                    $tire->shpflatrate = isset($data[38])?$data[38]:null;
                    $tire->partno_old = isset($data[39])?$data[39]:null;
                    $tire->metadesc = isset($data[40])?$data[40]:null;
                    $tire->qtyavail = isset($data[41])?$data[41]:null;
                    $tire->proddetailid = isset($data[42])?$data[42]:null;
                    $tire->productid = isset($data[43])?$data[43]:null;
                    $tire->dropshippable = isset($data[44])?$data[44]:null;
                    $tire->vendorpartno = isset($data[45])?$data[45]:null;
                    $tire->dropshipper = isset($data[46])?$data[46]:null;
                    $tire->vendorpartno2 = isset($data[47])?$data[47]:null;
                    $tire->dropshipper2 = isset($data[48])?$data[48]:null;
                    $tire->tiretype = isset($data[49])?$data[49]:null;
                    $tire->lt = isset($data[50])?$data[50]:null;
                    $tire->xl = isset($data[51])?$data[51]:null;
                    $tire->badge1 = isset($data[52])?$data[52]:null;
                    $tire->badge2 = isset($data[53])?$data[53]:null;
                    $tire->badge3 = isset($data[54])?$data[54]:null;
                    $tire->originalprice = isset($data[55])?$data[55]:null;
                    $tire->detaildesctype = isset($data[56])?$data[56]:null;
                    $tire->detaildescfeatures = isset($data[57])?$data[57]:null;
                    $tire->detaildesc = isset($data[58])?$data[58]:null;
                    $tire->benefits1 = isset($data[59])?$data[59]:null;
                    $tire->benefits2 = isset($data[60])?$data[60]:null;
                    $tire->benefits3 = isset($data[61])?$data[61]:null;
                    $tire->benefits4 = isset($data[62])?$data[62]:null;
                    $tire->benefitsimage1 = isset($data[63])?$data[63]:null;
                    $tire->benefitsimage2 = isset($data[64])?$data[64]:null;
                    $tire->benefitsimage3 = isset($data[65])?$data[65]:null;
                    $tire->benefitsimage4 = isset($data[66])?$data[66]:null;
                    $tire->prodlandingdesc = isset($data[67])?$data[67]:null;
                    $tire->prodimage1 = isset($data[68])?$data[68]:null;
                    $tire->prodimage2 = isset($data[69])?$data[69]:null;
                    $tire->prodimage3 = isset($data[70])?$data[70]:null;
                    $tire->dry_performance = isset($data[71])?$data[71]:null;
                    $tire->wet_performance = isset($data[72])?$data[72]:null;
                    $tire->mileage_performance = isset($data[73])?$data[73]:null;
                    $tire->ride_comfort = isset($data[74])?$data[74]:null;
                    $tire->quiet_ride = isset($data[75])?$data[75]:null;
                    $tire->winter_performance = isset($data[76])?$data[76]:null;
                    $tire->fuel_efficiency = isset($data[77])?$data[77]:null;
                    $tire->braking = isset($data[78])?$data[78]:null;
                    $tire->responsiveness = isset($data[79])?$data[79]:null;
                    $tire->sport = isset($data[80])?$data[80]:null;
                    $tire->off_road = isset($data[81])?$data[81]:null;
                    // dd($tire);
                    echo $tire->partno."<br>";
                    $tire->save(); 

                }
                $i++;
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }



    // public function Falken_Import(){
    //      // $in_file = public_path('/storage/tires_data/Falken-Export.csv'); 
    //      $in_file = public_path('/storage/tires_data/01 - Falken-Tire-Data - Falken 950_with_desc.csv'); 

    //     if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
    //     // $fw = fopen($out_file, "w");
    //     $i=1;
    //     while( ($data = fgetcsv($fr, 2000, ",")) !== FALSE ) {
    //             if($i != 1){
    //                 $tire =Tire::where('partno',$data[0])->first();
    //                 $tire->badge1 = $data[52];
    //                 $tire->badge2 = $data[53];
    //                 $tire->badge3 = $data[54];
    //                 $tire->originalprice = $data[55];
    //                 $tire->detaildesctype = $data[56];
    //                 $tire->detaildescfeatures = $data[57];
    //                 $tire->detaildesc = $data[58];
    //                 $tire->benefits1 = $data[59];
    //                 $tire->benefits2 = $data[60];
    //                 $tire->benefits3 = $data[61];
    //                 $tire->benefits4 = $data[62];
    //                 $tire->benefitsimage1 = $data[63];
    //                 $tire->benefitsimage2 = $data[64];
    //                 $tire->benefitsimage3 = $data[65];
    //                 $tire->benefitsimage4 = $data[66];
    //                 $tire->prodlandingdesc = $data[67];
    //                 $tire->prodimage1 = $data[68];
    //                 $tire->prodimage2 = $data[69];
    //                 $tire->prodimage3 = $data[70];
    //                 $tire->save(); 
    //             }
    //             $i++;
    //         }
    //     fclose($fr);
    //     // fclose($fw);
    //     return 'hiii';
    // }

}
