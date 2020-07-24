<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Chassis;
use App\ChassisModel;
use Illuminate\Http\Request;
use Session;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::orderby('make')->paginate(10); 
        return view('admin.vehicle.index',compact('vehicles'));
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
        
        $this->validate($request, [

            'make'=>'required',
            'year'=>'required',
            'model'=>'required',
            'submodel'=>'required'
        ]);
        try{  

            $vehicle = Vehicle::create($request->all());
            
            return back()->with('flash_success','Vehicle Added successfully');

        }catch(Exception $e){ 
            return back()->with('flash_error',$e->getMessage());
        }
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
    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'make'=>'required',
            'year'=>'required',
            'model'=>'required',
            'submodel'=>'required'
        ]);
        try{  
            
            $vehicle = Vehicle::find($id);
 
            $vehicle->update($request->all()); 
 
            
            return back()->with('flash_success','Vehicle Updated successfully');

        }catch(Exception $e){ 
            return back()->with('flash_error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Vehicle::find($id)->delete();
            return back()->with('flash_success', 'Vehicle deleted successfully');
        } 
        catch (Exception $e) {
            return back()->with('flash_error', 'Vehicle Not Found');
        }
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


             // if($request->flag == 'searchByVehicle'){ 
                Session::put('user.searchByVehicle',$request->all());
             // }
 

            $vehicle = Vehicle::select('id','vehicle_id','year','make','model','submodel','dr_chassis_id','dr_model_id','year_make_model_submodel')
            ->where('year',$request->year)
            ->where('make',$request->make)
            ->where('model',$request->model);
            if($request->has('submodel')){

                $submodelBody = explode('-',$request->submodel);
                // dd($submodelBody);
                if(count($submodelBody) == 2 ){

                    $vehicle = $vehicle->where('submodel',$submodelBody[0])->where('body',$submodelBody[1]);
                }elseif(count($submodelBody) == 3 ){

                    $vehicle = $vehicle->where('submodel',$submodelBody[0].'-'.$submodelBody[1])->where('body',$submodelBody[2]);
                }
            }
            $vehicle = $vehicle->first(); 
            // dd($vehicle);
            // $chassis = Chassis::where('chassis_id',$vehicle->dr_chassis_id)->first();

            $chassis_models =ChassisModel::select('id','p_lt','tire_size','rim_size','chassis_id','model_id')
                ->where('model_id',$vehicle->dr_model_id)
                ->get()
                ->unique('tire_size'); 
                // dd($chassis_models);
            if(count($chassis_models)  == 1){

                return redirect('/tirelist/'.base64_encode($chassis_models[0]->id).'/'.base64_encode(@$vehicle->vehicle_id));
            }else{
                return view('tire_size_list',compact('vehicle','chassis_models'));
            }

        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    }




    public function uploadcsv(Request $request){ 
        try{   
            $this->validate($request, [ 
                'vehicleuploadedfile'=>'required',
            ]); 

            if($request->hasFile('vehicleuploadedfile') ){
                $filename = $request->vehicleuploadedfile->getClientOriginalName();  
                $request->vehicleuploadedfile->move(public_path('/storage/uploaded_csv'), $filename); 
                // dd(base_path('storage/app/public/uploaded_csv/').$filename);
                $filepath = base_path('storage/app/public/uploaded_csv/').$filename;  

                if( !$fr = @fopen($filepath, "r") ){

                    return back()->with('flash_error',"File Could not be read!!");
                }
                // $fw = fopen($out_file, "w");
                $i=1;
                
                while( ($data = fgetcsv($fr, 2000000, ",")) !== FALSE ) {
                    if($i != 1){ 
                        if((isset($data[0])&&$data[0]!='')){
                            $vehicle = new Vehicle;
                            $vehicle->vehicle_id = $data[0];
                            $vehicle->base_vehicle_id = $data[1];
                            $vehicle->year = $data[2];
                            $vehicle->make = $data[3];
                            $vehicle->model = $data[4];
                            $vehicle->submodel = $data[5];
                            $vehicle->dr_chassis_id = $data[6];
                            $vehicle->sort_by_vehicle_type = $data[7];
                            $vehicle->year_make_model_submodel = $data[8];
                            $vehicle->make_model_submodel = $data[9];
                            $vehicle->wheel_type = $data[10];
                            $vehicle->rf_lc = $data[11];
                            $vehicle->offroad = $data[12];
                            $vehicle->dually = $data[13];
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
                    }
                    $i++;
                }
                fclose($fr);
            }

            return back()->with('flash_success','Vehicle Data Uploaded successfully');
        }catch(Exception $e){
            return back()->with('flash_error',$e->getMessage());
        } 

    }


    public function Vehicle_Dually_update(){
         $in_file = public_path('/storage/Vehicles.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        $i=0;
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
            if($i!=0){

                $vec_id = (integer)$data[0];
                // dd($vec_id);
                $vehicle = Vehicle::where('vehicle_id',$vec_id)->where('sort_by_vehicle_type',$data[7])->first();
                if($vehicle == null ){
                    $vehicle = new Vehicle;
                }
                $vehicle->vehicle_id = $data[0];
                $vehicle->base_vehicle_id = $data[1];
                $vehicle->year = $data[2];
                $vehicle->make = $data[3];
                $vehicle->model = $data[4];
                $vehicle->submodel = $data[5];
                $vehicle->dr_chassis_id = $data[6];
                $vehicle->sort_by_vehicle_type = $data[7];
                $vehicle->year_make_model_submodel = $data[8];
                $vehicle->make_model_submodel = $data[9];
                $vehicle->wheel_type = $data[10];
                $vehicle->rf_lc = $data[11];
                $vehicle->offroad = $data[12];
                $vehicle->dually = $data[13];
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
            $i++;
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
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

  public function New_Vehicle_Import(){
         $in_file = public_path('/storage/tires_data/vehicle_test.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                if($data[1] != 'vehicle_id'){
                    \DB::table('vehicle_test')->insert(
                        [
                            'dummy' => (isset($data[0])&&$data[0]!='')?$data[0]:null,
                            'vehicle_id' => (isset($data[1])&&$data[1]!='')?$data[1]:null,
                            'base_vehicle_id' => (isset($data[2])&&$data[2]!='')?$data[2]:null,
                            'year' => (isset($data[3])&&$data[3]!='')?$data[3]:null,
                            'make' => (isset($data[4])&&$data[4]!='')?$data[4]:null,
                            'model' => (isset($data[5])&&$data[5]!='')?$data[5]:null,
                            'submodel' => (isset($data[6])&&$data[6]!='')?$data[6]:null,
                            'submodel_body' => (isset($data[7])&&$data[7]!='')?$data[7]:null,
                            'body' => (isset($data[8])&&$data[8]!='')?$data[8]:null,
                            'option' => (isset($data[9])&&$data[9]!='')?$data[9]:null,
                            'dr_chassis_id' => (isset($data[10])&&$data[10]!='')?$data[10]:null,
                            'wheel_type' => (isset($data[11])&&$data[11]!='')?$data[11]:null,
                            'rf_lc' => (isset($data[12])&&$data[12]!='')?$data[12]:null,
                            'offroad' => (isset($data[13])&&$data[13]!='')?$data[13]:null,
                            'dually' => (isset($data[14])&&$data[14]!='')?$data[14]:null,
                            'drive_type' => (isset($data[15])&&$data[15]!='')?$data[15]:null,
                            'body_type' => (isset($data[16])&&$data[16]!='')?$data[16]:null,
                            'body_number_doors' => (isset($data[17])&&$data[17]!='')?$data[17]:null,
                            'bed_length' => (isset($data[18])&&$data[18]!='')?$data[18]:null,
                            'vehicle_type' => (isset($data[19])&&$data[19]!='')?$data[19]:null,
                            'liter' => (isset($data[20])&&$data[20]!='')?$data[20]:null,
                            'region_id' => (isset($data[21])&&$data[21]!='')?$data[21]:null,
                            'region' => (isset($data[22])&&$data[22]!='')?$data[22]:null,
                            'custom_note' => (isset($data[23])&&$data[23]!='')?$data[23]:null,
                            'dr_chassis_id_1' => (isset($data[24])&&$data[24]!='')?$data[24]:null,
                            'dr_model_id' => (isset($data[25])&&$data[25]!='')?$data[25]:null,
                        ]
                    );
                }
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }

    public function vif_update(){
         $in_file = public_path('/storage/viflist_data/Vif-Matching.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        $key = 1;
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                if($data[1] != 'VehicleID'){
                    $vahicle = Vehicle::where('vehicle_id',$data[1])->where('base_vehicle_id',$data[2])->update(
                        [
                            'vif' => (isset($data[9])&&$data[9]!='')?$data[9]:null
                        ]
                    );
                    echo $key."<br>";
                    $key++;
                }
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }
}
