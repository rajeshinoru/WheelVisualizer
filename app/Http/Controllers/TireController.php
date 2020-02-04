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
        $tires = Tire::select('simple_image','prod_title','category4','part_no','plt','xl','spec3')
                ->where('spec3','like', '%' . base64_decode($tire_size) . '%')
                ->with(['TireDetails' => function($q) {
                    $q->select('part_no','price','sale_price');
                }])
                ->get()
                ->unique('simple_image');

        $load_indexs = ChassisModel::where('tire_size',base64_decode($tire_size))->where('load_index','!=','NULL')->distinct('load_index')->pluck('load_index');
        return view('tires_list',compact('tires','load_indexs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tireview(Request $request,$tire_id='')
    {
        $tire = Tire::select('simple_image','prod_title','category4','category5','part_no','plt','xl','spec1','spec2','spec3','csearch1','csearch2','csearch3')
                ->where('id',base64_decode($tire_id))
                ->with(['TireDetails' => function($q) {
                    $q->select('part_no','price','sale_price');
                }])
                ->first();
        $diff_tires =  Tire::select('simple_image','prod_title','category4','category5','part_no','plt','xl','spec1','spec2','spec3','spec4','csearch1','csearch2','csearch3')
                ->where('spec1',$tire->spec1)
                ->where('spec2',$tire->spec2)
                ->with(['TireDetails' => function($q) {
                    $q->select('part_no','price','sale_price');
                }])
                ->get();
                // dd($tire,$diff_tires);
        return view('tire_view',compact('tire','diff_tires'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand(Request $request,$brand_name='')
    {

        $tires = Tire::select('id','simple_image','prod_title','category4','part_no','plt','xl')
                ->where('category5',base64_decode($brand_name))
                ->with(['TireDetails' => function($q) {
                    $q->select('part_no','price','sale_price');
                }])
                ->get()
                ->unique('simple_image');
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
                $allData['profile'] = $data = $tire->select('category3 as profile')->distinct('category3')->wherecategory2($request->width)->orderBy('profile','DESC')->get();

            // Profile change  or Loading Filter
            if(isset($request->width) && isset($request->profile) && $request->changeBy == 'profile' || $request->changeBy == '')
                $allData['diameter'] = $data = $tire->select('category4 as diameter')->distinct('category4')->where('category2',$request->width)->where('category3',$request->profile)->get();

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
            $tires = Tire::with('TireDetails')
            ->where('category2',$request->width)
            ->where('category3',$request->profile)
            ->where('category4',$request->diameter)
            ->get();  
            $load_indexs = ChassisModel::where('load_index','!=','NULL')->distinct('load_index')->pluck('load_index');

            return view('tires_list',compact('tires','load_indexs'));

        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    }



    public function Falken_Import(){
         $in_file = public_path('/storage/tires_data/Falken-Export.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                $tire = new Tire;
                $tire->part_no = $data[0];
                $tire->mpn = $data[1];
                $tire->category5 = $data[2];
                $tire->prod_title = $data[3];
                $tire->vendor = $data[4];
                $tire->vendor_qty = $data[5];
                $tire->vendor_cost = $data[6];
                $tire->vendor_marked_up_price = $data[7];
                $tire->simple_image = $data[8];
                $tire->category1 = $data[9];
                $tire->category2 = $data[10];
                $tire->category3 = $data[11];
                $tire->category4 = $data[12];
                $tire->category6 = $data[13];
                $tire->pkeywords = $data[14];
                $tire->csearch1 = $data[15];
                $tire->csearch2 = $data[16];
                $tire->csearch3 = $data[17];
                $tire->csearch4 = $data[18];
                $tire->csearch5 = $data[19];
                $tire->prod_weight = $data[20];
                $tire->spec1 = $data[21];
                $tire->spec2 = $data[22];
                $tire->spec3 = $data[23];
                $tire->spec4 = $data[24];
                $tire->spec5 = $data[25];
                $tire->plt = $data[26];
                $tire->xl = $data[27];
                $tire->speed_mph = $data[28];
                $tire->tier = $data[29];
                $tire->vendor_code = $data[30];
                $tire->vendor_website = $data[31];
                $tire->vendor_phone = $data[32];
                $tire->dsvendor_code = $data[33];
                $tire->dsvendor_website = $data[34];
                $tire->dsvendor_phone = $data[35];
                $tire->dspart_no = $data[36];
                $tire->drop_shippable = $data[37];
                $tire->discoed = $data[38];
                $tire->short_term_item = $data[39];
                $tire->dsvendor = $data[40];
                $tire->sale_price = $data[41];
                $tire->dsvendor_cost = $data[42];
                $tire->dsvendor_marked_up_price = $data[43];
                $tire->update_date = $data[44];
                $tire->ds_qty = $data[45];
                $tire->ds_update_date = $data[46];
                $tire->zero_qty_date = $data[47];
                $tire->save(); 
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }
}
