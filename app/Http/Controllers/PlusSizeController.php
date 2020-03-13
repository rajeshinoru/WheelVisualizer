<?php

namespace App\Http\Controllers;

use App\PlusSize;
use Illuminate\Http\Request;

class PlusSizeController extends Controller
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
     * @param  \App\PlusSize  $plusSize
     * @return \Illuminate\Http\Response
     */
    public function show(PlusSize $plusSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlusSize  $plusSize
     * @return \Illuminate\Http\Response
     */
    public function edit(PlusSize $plusSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlusSize  $plusSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlusSize $plusSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlusSize  $plusSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlusSize $plusSize)
    {
        //
    }


    public function PlusSize_Import(){
         $in_file = public_path('/storage/tires_data/plussize.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                if($data[0] !='ChassisID'){
                    $plussize = new PlusSize;
                    $plussize->chassis_id        =($data[0]     !=   'NULL'  &&     $data[0])    ? $data[0] :null;
                    $plussize->up_step_type      =($data[1]     !=   'NULL'  &&     $data[1])    ? $data[1] :null;
                    $plussize->wheel_size        =($data[2]     !=   'NULL'  &&     $data[2])    ? $data[2] :null;
                    $plussize->tire1             =($data[3]     !=   'NULL'  &&     $data[3])    ? $data[3] :null;
                    $plussize->tire2             =($data[4]     !=   'NULL'  &&     $data[4])    ? $data[4] :null;
                    $plussize->tire3             =($data[5]     !=   'NULL'  &&     $data[5])    ? $data[5] :null;
                    $plussize->tire4             =($data[6]     !=   'NULL'  &&     $data[6])    ? $data[6] :null;
                    $plussize->tire5             =($data[7]     !=   'NULL'  &&     $data[7])    ? $data[7] :null;
                    $plussize->tire6             =($data[8]     !=   'NULL'  &&     $data[8])    ? $data[8] :null;
                    $plussize->tire7             =($data[9]     !=   'NULL'  &&     $data[9])    ? $data[9] :null;
                    $plussize->tire8             =($data[10]    !=   'NULL'  &&     $data[10])   ? $data[10] :null;
                    $plussize->min_offset        =($data[11]    !=   'NULL'  &&     $data[11])   ? $data[11] :null;
                    $plussize->max_offset        =($data[12]    !=   'NULL'  &&     $data[12])   ? $data[12] :null;
                    $plussize->save(); 
                }
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }
}
