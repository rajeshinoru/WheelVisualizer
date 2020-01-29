<?php

namespace App\Http\Controllers;

use App\TyreDetail;
use Illuminate\Http\Request;

class TyreDetailController extends Controller
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
     * @param  \App\TyreDetail  $tyreDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TyreDetail $tyreDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TyreDetail  $tyreDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TyreDetail $tyreDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TyreDetail  $tyreDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TyreDetail $tyreDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TyreDetail  $tyreDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TyreDetail $tyreDetail)
    {
        //
    }

    public function Falken_Detail_Import(){
         $in_file = public_path('/storage/tyres_data/Falken-Website-Data - TireExport.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                $tyre_detail = new TyreDetail;
                $tyre_detail->part_no = $data[0];
                $tyre_detail->price = $data[1];
                $tyre_detail->price2 = $data[2];
                $tyre_detail->cost = $data[3];
                $tyre_detail->rate = $data[4];
                $tyre_detail->sale_price = $data[5];
                $tyre_detail->sale_type = $data[6];
                $tyre_detail->sale_start = $data[7];
                $tyre_detail->sale_exp = $data[8];
                $tyre_detail->weight = $data[9];
                $tyre_detail->length = $data[10];
                $tyre_detail->width = $data[11];
                $tyre_detail->height = $data[12];
                $tyre_detail->shp_sep = $data[13];
                $tyre_detail->shp_free = $data[14];
                $tyre_detail->shp_code = $data[15];
                $tyre_detail->shp_flatrate = $data[16];
                $tyre_detail->partno_old = $data[17];
                $tyre_detail->meta_desc = $data[18];
                $tyre_detail->qty_avail = $data[19];
                $tyre_detail->prod_detail_id = $data[20];
                $tyre_detail->product_id = $data[21];
                $tyre_detail->drop_shippable = $data[22];
                $tyre_detail->vendor_part_no = $data[23];
                $tyre_detail->drop_shipper = $data[24];
                $tyre_detail->vendor_partno2 = $data[25];
                $tyre_detail->drop_shipper2 = $data[26];
                $tyre_detail->tire_type = $data[28]?:$data[29];
                $tyre_detail->save(); 
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }
}
