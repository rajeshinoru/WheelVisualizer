<?php

namespace App\Http\Controllers;

use App\MinusSize;
use Illuminate\Http\Request;

class MinusSizeController extends Controller
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
     * @param  \App\MinusSize  $minusSize
     * @return \Illuminate\Http\Response
     */
    public function show(MinusSize $minusSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MinusSize  $minusSize
     * @return \Illuminate\Http\Response
     */
    public function edit(MinusSize $minusSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MinusSize  $minusSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MinusSize $minusSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MinusSize  $minusSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(MinusSize $minusSize)
    {
        //
    }


    public function MinusSize_Import(){
         $in_file = public_path('/storage/tires_data/minussize.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                if($data[0] !='ChassisID'){
                    $minussize = new MinusSize;
                    $minussize->chassis_id           =($data[0]     !=   'NULL'  &&     $data[0])    ? $data[0] :null;
                    $minussize->front_rear         =($data[1]     !=   'NULL'  &&     $data[1])    ? $data[1] :null;
                    $minussize->down_step_rim_size           =($data[2]     !=   'NULL'  &&     $data[2])    ? $data[2] :null;
                    $minussize->down_step_tire1               =($data[3]     !=   'NULL'  &&     $data[3])    ? $data[3] :null;
                    $minussize->save(); 
                }
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }
}
