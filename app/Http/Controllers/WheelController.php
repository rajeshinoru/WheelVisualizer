<?php

namespace App\Http\Controllers;

use App\Wheel;
use Illuminate\Http\Request;

class WheelController extends Controller
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
     * @param  \App\Wheel  $wheel
     * @return \Illuminate\Http\Response
     */
    public function show(Wheel $wheel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wheel  $wheel
     * @return \Illuminate\Http\Response
     */
    public function edit(Wheel $wheel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wheel  $wheel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wheel $wheel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wheel  $wheel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wheel $wheel)
    {
        //
    }

    public function Wheel_Import(){
        // $in_file = public_path('/storage/tires_data/Falken-Export.csv'); 
        $in_file = public_path('/storage/tires_data/All_Wheels.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        $i=1;
        while( ($data = fgetcsv($fr, 2000, ",")) !== FALSE ) {
                if($i != 1){
                    $wheel = new Wheel;
                    $wheel->prodtitle = $data[0]?:null;
                    $wheel->prodbrand = $data[1]?:null;
                    $wheel->prodmodel = $data[2]?:null;
                    $wheel->prodfinish = $data[3]?:null;
                    $wheel->prodmetadesc = $data[4]?:null;
                    $wheel->prodimage = $data[5]?:null;
                    $wheel->prodimageshow = $data[6]?:null;
                    $wheel->prodimagedually = $data[7]?:null;
                    $wheel->prodsortcode = $data[8]?:null;
                    $wheel->prodheaderid = $data[9]?:null;
                    $wheel->prodfooterid = $data[10]?:null;
                    $wheel->prodinfoid = $data[11]?:null;
                    $wheel->proddesc = $data[12]?:null;
                    $wheel->wheeltype = $data[13]?:null;
                    $wheel->duallyrear = $data[14]?:null;
                    $wheel->wheeldiameter = $data[15]?:null;
                    $wheel->wheelwidth = $data[16]?:null;
                    $wheel->boltpattern1 = $data[17]?:null;
                    $wheel->boltpattern2 = $data[18]?:null;
                    $wheel->boltpattern3 = $data[19]?:null;
                    $wheel->detailtitle = $data[20]?:null;
                    $wheel->partno = $data[21]?:null;
                    $wheel->price = $data[22]?:null;
                    $wheel->price2 = $data[23]?:null;
                    $wheel->cost = $data[24]?:null;
                    $wheel->rate = $data[25]?:null;
                    $wheel->saleprice = $data[26]?:null;
                    $wheel->saletype = $data[27]?:null;
                    $wheel->salestart = $data[28]?:null;
                    $wheel->saleexp = $data[29]?:null;
                    $wheel->weight = $data[30]?:null;
                    $wheel->length = $data[31]?:null;
                    $wheel->width = $data[32]?:null;
                    $wheel->height = $data[33]?:null;
                    $wheel->shpsep = $data[34]?:null;
                    $wheel->shpfree = $data[35]?:null;
                    $wheel->shpcode = $data[36]?:null;
                    $wheel->shpflatrate = $data[37]?:null;
                    $wheel->partno_old = $data[38]?:null;
                    $wheel->metadesc = $data[39]?:null;
                    $wheel->qtyavail = $data[40]?:null;
                    $wheel->proddetailid = $data[41]?:null;
                    $wheel->productid = $data[42]?:null;
                    $wheel->dropshippable = $data[43]?:null;
                    $wheel->vendorpartno = $data[44]?:null;
                    $wheel->dropshipper = $data[45]?:null;
                    $wheel->vendorpartno2 = $data[46]?:null;
                    $wheel->dropshipper2 = $data[47]?:null;
                    $wheel->staggonly = $data[48]?:null;
                    $wheel->rf_lc = $data[49]?:null;
                    $wheel->offset1 = $data[50]?:null;
                    $wheel->offset2 = $data[51]?:null;
                    $wheel->hubbore = $data[52]?:null;
                    $wheel->save(); 
                }
                $i++;
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }
}
