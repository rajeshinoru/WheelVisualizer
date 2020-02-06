<?php

namespace App\Http\Controllers;

use App\Tire;
use App\ChassisModel;
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
    public function list(Request $request,$tire_size='')
    { 
        $tires = Tire::where('tiresize','like', '%' . base64_decode($tire_size) . '%')
                ->get()
                ->unique('prodmodel');
        $load_indexs =Tire::select('loadindex', \DB::raw('count(*) as total'))->where('tiresize','like', '%' . base64_decode($tire_size) . '%')->groupBy('loadindex')->get()->sortBy('loadindex');
        
        $speedratings =Tire::select('speedrating', \DB::raw('count(*) as total'))->where('tiresize','like', '%' . base64_decode($tire_size) . '%')->groupBy('speedrating')->get()->sortBy('speedrating');
        
        return view('tires_list',compact('tires','load_indexs','speedratings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tireview(Request $request,$tire_id='')
    {
        $tire = Tire::where('id',base64_decode($tire_id))->first();
        $diff_tires =  Tire::where('prodmodel',$tire->prodmodel)->get();
        return view('tire_view',compact('tire','diff_tires'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand(Request $request,$brand_name='')
    {

        $tires = Tire::where('prodbrand',base64_decode($brand_name))
                ->orderBy('price','ASC')
                ->get()
                ->unique('prodtitle');
        return view('tire_brand',compact('tires'));
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
            $tires = Tire::where('tirewidth',$request->width)
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



    // public function Falken_Import(){
    //      // $in_file = public_path('/storage/tires_data/Falken-Export.csv'); 
    //      $in_file = public_path('/storage/tires_data/Falken-Tire-Data - Falken 950.csv'); 

    //     if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
    //     // $fw = fopen($out_file, "w");
    //     $i=1;
    //     while( ($data = fgetcsv($fr, 2000, ",")) !== FALSE ) {
    //             if($i != 1){
    //                 $tire = new Tire;
    //                 $tire->partno=$data[0];
    //                 $tire->prodtitle=$data[1];
    //                 $tire->prodbrand=$data[2];
    //                 $tire->prodmodel=$data[3];
    //                 $tire->prodmetadesc=$data[4];
    //                 $tire->prodimage=$data[5];
    //                 $tire->prodimageshow=$data[6];
    //                 $tire->prodsortcode=$data[7];
    //                 $tire->prodheaderid=$data[8];
    //                 $tire->prodfooterid=$data[9];
    //                 $tire->prodinfoid=$data[10];
    //                 $tire->proddesc=$data[11];
    //                 $tire->tirewidth=$data[12];
    //                 $tire->tireprofile=$data[13];
    //                 $tire->tirediameter=$data[14];
    //                 $tire->tiresize=$data[15];
    //                 $tire->speedrating=$data[16];
    //                 $tire->loadindex=$data[17];
    //                 $tire->ply=$data[18];
    //                 $tire->utqg=$data[19];
    //                 $tire->warranty=$data[20];
    //                 $tire->detailtitle=$data[21];
    //                 $tire->keywords=$data[22];
    //                 $tire->price=$data[23];
    //                 $tire->price2=$data[24];
    //                 $tire->cost=$data[25];
    //                 $tire->rate=$data[26];
    //                 $tire->saleprice=$data[27];
    //                 $tire->saletype=$data[28];
    //                 $tire->salestart=$data[29];
    //                 $tire->saleexp=$data[30];
    //                 $tire->weight=$data[31];
    //                 $tire->length=$data[32];
    //                 $tire->width=$data[33];
    //                 $tire->height=$data[34];
    //                 $tire->shpsep=$data[35];
    //                 $tire->shpfree=$data[36];
    //                 $tire->shpcode=$data[37];
    //                 $tire->shpflatrate=$data[38];
    //                 $tire->partno_old=$data[39];
    //                 $tire->metadesc=$data[40];
    //                 $tire->qtyavail=$data[41];
    //                 $tire->proddetailid=$data[42];
    //                 $tire->productid=$data[43];
    //                 $tire->dropshippable=$data[44];
    //                 $tire->vendorpartno=$data[45];
    //                 $tire->dropshipper=$data[46];
    //                 $tire->vendorpartno2=$data[47];
    //                 $tire->dropshipper2=$data[48];
    //                 $tire->tiretype=$data[49];
    //                 $tire->lt=$data[50];
    //                 $tire->xl=$data[51];
    //                 $tire->originalprice=$data[52];
    //                 $tire->dry_performance=$data[53];
    //                 $tire->wet_performance=$data[54];
    //                 $tire->mileage_performance=$data[55];
    //                 $tire->ride_comfort=$data[56];
    //                 $tire->quiet_ride=$data[57];
    //                 $tire->winter_performance=$data[58];
    //                 $tire->fuel_efficiency=$data[59];
    //                 $tire->braking=$data[60];
    //                 $tire->responsiveness=$data[61];
    //                 $tire->sport=$data[62];
    //                 $tire->off_road=$data[63];
    //                 $tire->save(); 
    //             }
    //             $i++;
    //         }
    //     fclose($fr);
    //     // fclose($fw);
    //     return 'hiii';
    // }



    public function Falken_Import(){
         // $in_file = public_path('/storage/tires_data/Falken-Export.csv'); 
         $in_file = public_path('/storage/tires_data/01 - Falken-Tire-Data - Falken 950_with_desc.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        $i=1;
        while( ($data = fgetcsv($fr, 2000, ",")) !== FALSE ) {
                if($i != 1){
                    $tire =Tire::where('partno',$data[0])->first();
                    $tire->badge1 = $data[52];
                    $tire->badge2 = $data[53];
                    $tire->badge3 = $data[54];
                    $tire->originalprice = $data[55];
                    $tire->detaildesctype = $data[56];
                    $tire->detaildescfeatures = $data[57];
                    $tire->detaildesc = $data[58];
                    $tire->benefits1 = $data[59];
                    $tire->benefits2 = $data[60];
                    $tire->benefits3 = $data[61];
                    $tire->benefits4 = $data[62];
                    $tire->benefitsimage1 = $data[63];
                    $tire->benefitsimage2 = $data[64];
                    $tire->benefitsimage3 = $data[65];
                    $tire->benefitsimage4 = $data[66];
                    $tire->prodlandingdesc = $data[67];
                    $tire->prodimage1 = $data[68];
                    $tire->prodimage2 = $data[69];
                    $tire->prodimage3 = $data[70];
                    $tire->save(); 
                }
                $i++;
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }

}
