<?php

namespace App\Http\Controllers;

use App\Chassis;
use Illuminate\Http\Request;

class ChassisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chassises = Chassis::orderby('chassis_id')->paginate(10); 
        return view('admin.chassis.index',compact('chassises'));
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

            'chassis_id'=>'required',
            'pcd'=>'required', 
        ]);
        try{  

            $vehicle = Chassis::create($request->all());
            
            return back()->with('flash_success','Chassis Added successfully');

        }catch(Exception $e){ 
            return back()->with('flash_error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chassis  $chassis
     * @return \Illuminate\Http\Response
     */
    public function show(Chassis $chassis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chassis  $chassis
     * @return \Illuminate\Http\Response
     */
    public function edit(Chassis $chassis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chassis  $chassis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request, [

            'chassis_id'=>'required',
            'pcd'=>'required', 
        ]);
        try{  
            
            $chassis = Chassis::find($id);
 
            $chassis->update($request->all()); 
 
            
            return back()->with('flash_success','Chassis Updated successfully');

        }catch(Exception $e){ 
            return back()->with('flash_error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chassis  $chassis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $chassis = Chassis::find($id);
            $chassis->ChassisModels()->delete();
            $chassis->delete();
            return back()->with('flash_success', 'Chassis deleted successfully');
        } 
        catch (Exception $e) {
            return back()->with('flash_error', 'Chassis Not Found');
        }
    }



    public function Chassis_Import(){
         $in_file = public_path('/storage/tires_data/chassis.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                $chassis = new Chassis;
                $chassis->chassis_id = $data[0];
                $chassis->pcd = $data[1];
                $chassis->centre_bore = $data[2];
                $chassis->centre_borer = $data[3];
                $chassis->max_wheel_load = $data[4];
                $chassis->nutbolt = $data[5];
                $chassis->nutbolt_thread_type = $data[6];
                $chassis->nutbolt_hex = $data[7];
                $chassis->boltlength = $data[8];
                $chassis->min_bolt_length = $data[9];
                $chassis->max_bolt_length = $data[10];
                $chassis->nutbolt_torque = $data[11];
                $chassis->front_vehicle_track = $data[12];
                $chassis->rear_vehicle_track = $data[13];
                $chassis->max_rim_width = $data[14];
                $chassis->min_rim_width = $data[15];
                $chassis->max_rim_width_front = $data[16];
                $chassis->max_rim_width_rear = $data[17];
                $chassis->max_et_front = $data[18];
                $chassis->min_et_front = $data[19];
                $chassis->max_et_rear = $data[20];
                $chassis->min_et_rear = $data[21];
                $chassis->gvw = $data[22];
                $chassis->max_speed = $data[23];
                $chassis->front_axle_weight = $data[24];
                $chassis->rear_axle_weight = $data[25];
                $chassis->kerb_weight = $data[26];
                $chassis->caliper = $data[27];
                $chassis->oe_tire_description = $data[28];
                $chassis->tpms = $data[29];
                $chassis->xfactor = $data[30];
                $chassis->save(); 
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }
}
