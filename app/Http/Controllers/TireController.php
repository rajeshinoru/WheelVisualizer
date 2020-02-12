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
        
        $load_indexs =Tire::select('loadindex', \DB::raw('count(*) as total'))->groupBy('loadindex')->get()->sortBy('loadindex');
        // ->where('tiresize','like', '%' . base64_decode($chassis_model_id) . '%')
        $speedratings =Tire::select('speedrating', \DB::raw('count(*) as total'))->groupBy('speedrating')->get()->sortBy('speedrating');

        $chassis_model = ChassisModel::find(base64_decode($chassis_model_id));
        $vehicle = Vehicle::where('vehicle_id',base64_decode($vehicle_id))->first();
        // dd($vehicle);
        $tire = new Tire;
        if($request->has('tirebrand')){
            if($request->tirebrand !=''){
                $tire = $tire->whereIn('prodbrand',json_decode(base64_decode($request->tirebrand)));
            }
        }
        if($request->has('tirespeedrating')){
            if($request->tirespeedrating !=''){
                $tire = $tire->where('speedrating',json_decode(base64_decode($request->tirespeedrating)));
            }
        }
        if($request->has('tireloadindex')){
            if($request->tireloadindex !=''){
                $tire = $tire->whereIn('loadindex',json_decode(base64_decode($request->tireloadindex)));
            }
        }

        $tires = $tire->select('prodimage','id','prodtitle','tiresize','loadindex','speedrating','price','prodmodel')
                ->where('tiresize','like', '%' . @$chassis_model->tire_size . '%')
                ->get()
                ->unique('prodmodel');
        return view('tires_list',compact('tires','vehicle','chassis_model','load_indexs','speedratings'));
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
        return view('tire_view',compact('tire','diff_tires'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand(Request $request,$brand_name='')
    {

        $tires = Tire::select('prodimage','prodtitle','prodmodel','price','id','prodbrand','detaildesctype')
                ->where('prodbrand',base64_decode($brand_name))
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
    /**
     * Search the records by filters.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function setFiltersByTire(Request $request)
    {
        try{
            $tires = Tire::select('prodimage','id','prodtitle','tiresize','loadindex','speedrating',
                    'price','prodmodel','tirewidth','tireprofile','tirediameter')
                    ->where('tirewidth',$request->width)
                    ->where('tireprofile',$request->profile)
                    ->where('tirediameter',$request->diameter)
                    ->get();  
            $load_indexs =Tire::select('loadindex', \DB::raw('count(*) as total'))->groupBy('loadindex')->get()->sortBy('loadindex');
        
            $speedratings =Tire::select('speedrating', \DB::raw('count(*) as total'))->groupBy('speedrating')->get()->sortBy('speedrating');

            return view('tires_list',compact('tires','load_indexs','speedratings'));

        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    }



    public function Falken_Import(){
         // $in_file = public_path('/storage/tires_data/Falken-Export.csv'); 
         $in_file = public_path('/storage/tires_data/All-Falken.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        $i=1;
        while( ($data = fgetcsv($fr, 2000, ",")) !== FALSE ) {
                if($i != 1){
                    $tire = new Tire;
                    $tire->partno = $data[0]?:null;
                    $tire->prodtitle = $data[1]?:null;
                    $tire->prodbrand = $data[2]?:null;
                    $tire->prodmodel = $data[3]?:null;
                    $tire->prodmetadesc = $data[4]?:null;
                    $tire->prodimage = $data[5]?:null;
                    $tire->prodimageshow = $data[6]?:null;
                    $tire->prodsortcode = $data[7]?:null;
                    $tire->prodheaderid = $data[8]?:null;
                    $tire->prodfooterid = $data[9]?:null;
                    $tire->prodinfoid = $data[10]?:null;
                    $tire->proddesc = $data[11]?:null;
                    $tire->tirewidth = $data[12]?:null;
                    $tire->tireprofile = $data[13]?:null;
                    $tire->tirediameter = $data[14]?:null;
                    $tire->tiresize = $data[15]?:null;
                    $tire->speedrating = $data[16]?:null;
                    $tire->loadindex = $data[17]?:null;
                    $tire->ply = $data[18]?:null;
                    $tire->utqg = $data[19]?:null;
                    $tire->warranty = $data[20]?:null;
                    $tire->detailtitle = $data[21]?:null;
                    $tire->keywords = $data[22]?:null;
                    $tire->price = $data[23]?:null;
                    $tire->price2 = $data[24]?:null;
                    $tire->cost = $data[25]?:null;
                    $tire->rate = $data[26]?:null;
                    $tire->saleprice = $data[27]?:null;
                    $tire->saletype = $data[28]?:null;
                    $tire->salestart = $data[29]?:null;
                    $tire->saleexp = $data[30]?:null;
                    $tire->weight = $data[31]?:null;
                    $tire->length = $data[32]?:null;
                    $tire->width = $data[33]?:null;
                    $tire->height = $data[34]?:null;
                    $tire->shpsep = $data[35]?:null;
                    $tire->shpfree = $data[36]?:null;
                    $tire->shpcode = $data[37]?:null;
                    $tire->shpflatrate = $data[38]?:null;
                    $tire->partno_old = $data[39]?:null;
                    $tire->metadesc = $data[40]?:null;
                    $tire->qtyavail = $data[41]?:null;
                    $tire->proddetailid = $data[42]?:null;
                    $tire->productid = $data[43]?:null;
                    $tire->dropshippable = $data[44]?:null;
                    $tire->vendorpartno = $data[45]?:null;
                    $tire->dropshipper = $data[46]?:null;
                    $tire->vendorpartno2 = $data[47]?:null;
                    $tire->dropshipper2 = $data[48]?:null;
                    $tire->tiretype = $data[49]?:null;
                    $tire->lt = $data[50]?:null;
                    $tire->xl = $data[51]?:null;
                    $tire->badge1 = $data[52]?:null;
                    $tire->badge2 = $data[53]?:null;
                    $tire->badge3 = $data[54]?:null;
                    $tire->originalprice = $data[55]?:null;
                    $tire->detaildesctype = $data[56]?:null;
                    $tire->detaildescfeatures = $data[57]?:null;
                    $tire->detaildesc = $data[58]?:null;
                    $tire->benefits1 = $data[59]?:null;
                    $tire->benefits2 = $data[60]?:null;
                    $tire->benefits3 = $data[61]?:null;
                    $tire->benefits4 = $data[62]?:null;
                    $tire->benefitsimage1 = $data[63]?:null;
                    $tire->benefitsimage2 = $data[64]?:null;
                    $tire->benefitsimage3 = $data[65]?:null;
                    $tire->benefitsimage4 = $data[66]?:null;
                    $tire->prodlandingdesc = $data[67]?:null;
                    $tire->prodimage1 = $data[68]?:null;
                    $tire->prodimage2 = $data[69]?:null;
                    $tire->prodimage3 = $data[70]?:null;
                    $tire->dry_performance = $data[71]?:null;
                    $tire->wet_performance = $data[72]?:null;
                    $tire->mileage_performance = $data[73]?:null;
                    $tire->ride_comfort = $data[74]?:null;
                    $tire->quiet_ride = $data[75]?:null;
                    $tire->winter_performance = $data[76]?:null;
                    $tire->fuel_efficiency = $data[77]?:null;
                    $tire->braking = $data[78]?:null;
                    $tire->responsiveness = $data[79]?:null;
                    $tire->sport = $data[80]?:null;
                    $tire->off_road = $data[81]?:null;
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
