<?php

namespace App\Http\Controllers;

use App\Tyre;
use Illuminate\Http\Request;

class TyreController extends Controller
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
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function show(Tyre $tyre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function edit(Tyre $tyre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tyre $tyre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tyre $tyre)
    {
        //
    }
    public function Falken_Import(){
         $in_file = public_path('/storage/tyres_data/Falken-Export.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                $tyre = new Tyre;
                $tyre->part_no = $data[0];
                $tyre->mpn = $data[1];
                $tyre->category5 = $data[2];
                $tyre->prod_title = $data[3];
                $tyre->vendor = $data[4];
                $tyre->vendor_qty = $data[5];
                $tyre->vendor_cost = $data[6];
                $tyre->vendor_marked_up_price = $data[7];
                $tyre->simple_image = $data[8];
                $tyre->category1 = $data[9];
                $tyre->category2 = $data[10];
                $tyre->category3 = $data[11];
                $tyre->category4 = $data[12];
                $tyre->category6 = $data[13];
                $tyre->pkeywords = $data[14];
                $tyre->csearch1 = $data[15];
                $tyre->csearch2 = $data[16];
                $tyre->csearch3 = $data[17];
                $tyre->csearch4 = $data[18];
                $tyre->csearch5 = $data[19];
                $tyre->prod_weight = $data[20];
                $tyre->spec1 = $data[21];
                $tyre->spec2 = $data[22];
                $tyre->spec3 = $data[23];
                $tyre->spec4 = $data[24];
                $tyre->spec5 = $data[25];
                $tyre->plt = $data[26];
                $tyre->xl = $data[27];
                $tyre->speed_mph = $data[28];
                $tyre->tier = $data[29];
                $tyre->vendor_code = $data[30];
                $tyre->vendor_website = $data[31];
                $tyre->vendor_phone = $data[32];
                $tyre->dsvendor_code = $data[33];
                $tyre->dsvendor_website = $data[34];
                $tyre->dsvendor_phone = $data[35];
                $tyre->dspart_no = $data[36];
                $tyre->drop_shippable = $data[37];
                $tyre->discoed = $data[38];
                $tyre->short_term_item = $data[39];
                $tyre->dsvendor = $data[40];
                $tyre->sale_price = $data[41];
                $tyre->dsvendor_cost = $data[42];
                $tyre->dsvendor_marked_up_price = $data[43];
                $tyre->update_date = $data[44];
                $tyre->ds_qty = $data[45];
                $tyre->ds_update_date = $data[46];
                $tyre->zero_qty_date = $data[47];
                $tyre->save(); 
            }
        fclose($fr);
        // fclose($fw);
        return 'hiii';
    }
}
