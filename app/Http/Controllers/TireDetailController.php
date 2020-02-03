<?php

namespace App\Http\Controllers;

use App\TireDetail;
use Illuminate\Http\Request;

class TireDetailController extends Controller
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
     * @param  \App\TireDetail  $tireDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TireDetail $tireDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TireDetail  $tireDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TireDetail $tireDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TireDetail  $tireDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TireDetail $tireDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TireDetail  $tireDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TireDetail $tireDetail)
    {
        //
    }

    public function Falken_Detail_Import(){
         $in_file = public_path('/storage/tires_data/Falken-Website-Data - TireExport.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                $tire_detail = new TireDetail;
                $tire_detail->part_no = $data[0];
                $tire_detail->price = $data[1];
                $tire_detail->price2 = $data[2];
                $tire_detail->cost = $data[3];
                $tire_detail->rate = $data[4];
                $tire_detail->sale_price = $data[5];
                $tire_detail->sale_type = $data[6];
                $tire_detail->sale_start = $data[7];
                $tire_detail->sale_exp = $data[8];
                $tire_detail->weight = $data[9];
                $tire_detail->length = $data[10];
                $tire_detail->width = $data[11];
                $tire_detail->height = $data[12];
                $tire_detail->shp_sep = $data[13];
                $tire_detail->shp_free = $data[14];
                $tire_detail->shp_code = $data[15];
                $tire_detail->shp_flatrate = $data[16];
                $tire_detail->partno_old = $data[17];
                $tire_detail->meta_desc = $data[18];
                $tire_detail->qty_avail = $data[19];
                $tire_detail->prod_detail_id = $data[20];
                $tire_detail->product_id = $data[21];
                $tire_detail->drop_shippable = $data[22];
                $tire_detail->vendor_part_no = $data[23];
                $tire_detail->drop_shipper = $data[24];
                $tire_detail->vendor_partno2 = $data[25];
                $tire_detail->drop_shipper2 = $data[26];
                $tire_detail->tire_type = $data[28]?:$data[29];
                $tire_detail->save(); 
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }
}
