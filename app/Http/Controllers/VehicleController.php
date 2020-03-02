<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Chassis;
use App\ChassisModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
    /**
     * Search the records by filters.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function getFiltersByVehicle(Request $request)
    {
        try{
            $vehicle = new Vehicle; 
            // dd($request->all(),$vehicle);
            // Make change or Loading filter
            if(isset($request->make) && $request->changeBy == 'make' || $request->changeBy == '')
                $allData['year'] = $data = $vehicle->select('year')->distinct('year')->wheremake($request->make)->orderBy('year','DESC')->get();

            // Year change  or Loading Filter
            if(isset($request->make) && isset($request->year) && $request->changeBy == 'year' || $request->changeBy == '')
                $allData['model'] = $data = $vehicle->select('model')->distinct('model')->where('year',$request->year)->wheremake($request->make)->orderBy('model','ASC')->get();

            // Model change  or Loading Filter
            if(isset($request->make) && isset($request->year) && isset($request->model) && $request->changeBy == 'model' || $request->changeBy == '')
                $allData['submodel'] = $data = $vehicle->select('submodel','body')->distinct('submodel','body')->where('year',$request->year)->wheremake($request->make)->wheremodel($request->model)->orderBy('submodel','ASC')->get();
                // dd($allData['submodel']);

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
    public function setFiltersByVehicle(Request $request)
    {
        try{


            $vehicle = Vehicle::select('id','vehicle_id','year','make','model','submodel','dr_chassis_id','dr_model_id','year_make_model_submodel')
            ->where('year',$request->year)
            ->where('make',$request->make)
            ->where('model',$request->model);
            if($request->has('submodel')){

                $submodelBody = explode('-',$request->submodel);

                $vehicle = $vehicle->where('submodel',$submodelBody[0])->where('body',$submodelBody[1]);
            }
            $vehicle = $vehicle->first(); 
            
            // $chassis = Chassis::where('chassis_id',$vehicle->dr_chassis_id)->first();
            
            $chassis_models =ChassisModel::select('id','p_lt','tire_size','rim_size','chassis_id','model_id')
                ->where('model_id',$vehicle->dr_model_id)
                ->get()
                ->unique('tire_size'); 

            return view('tire_size_list',compact('vehicle','chassis_models'));

        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    }

    public function Vehicle_Import(){
         $in_file = public_path('/storage/tires_data/vehicle.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                $vehicle = new Vehicle;
                $vehicle->dummy = $data[0];
                $vehicle->vehicle_id = $data[1];
                $vehicle->base_vehicle_id = $data[2];
                $vehicle->year = $data[3];
                $vehicle->make = $data[4];
                $vehicle->model = $data[5];
                $vehicle->submodel = $data[6];
                $vehicle->dr_chassis_id = $data[7];
                $vehicle->sort_by_vehicle_type = $data[8];
                $vehicle->year_make_model_submodel = $data[9];
                $vehicle->make_model_submodel = $data[10];
                $vehicle->wheel_type = $data[11];
                $vehicle->rf_lc = $data[12];
                $vehicle->offroad = $data[13];
                $vehicle->drive_type = $data[14];
                $vehicle->body_type = $data[15];
                $vehicle->body_number_doors = $data[16];
                $vehicle->bed_length = $data[17];
                $vehicle->vehicle_type = $data[18];
                $vehicle->liter = $data[19];
                $vehicle->region_id = $data[20];
                $vehicle->region = $data[21];
                $vehicle->custom_note = $data[22];
                $vehicle->body = $data[23];
                $vehicle->option = $data[24];
                $vehicle->dr_chassis_id_1 = $data[25];
                $vehicle->dr_model_id = $data[26];
                $vehicle->save(); 
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }


}
