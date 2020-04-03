<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
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
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }


    public function  getUploadInventories(Request $request){
        $db_ext = \DB::connection('sqlsrv');
        $inv = $db_ext->table('inventories')->get()->count();
        dd($inv);
        // dd($db_ext);
    }

    public function  CopyTableToServer(Request $request){
        // dd(Inventory::get()->count());
        $db_ext = \DB::connection('sqlsrv');

        $columns=[
            'partno',
            'vendor_partno',
            'mpn',
            'description',
            'brand',
            'model',
            'location_code',
            'available_qty',
            'price',
            'drop_shipper',
            'ds_vendor_code',
            'location_name'
        ];
        // Get table data from production
        foreach(\DB::table('inventories')->select($columns)->get() as $data){
            // dd($data);
             // Save data to staging database - default db connection
             $db_ext->table('inventories')->insert((array) $data);
        }
    }




    public function  UploadInventories(Request $request){

  set_time_limit(999999999);

    $filepath = public_path('/storage/inventories_data/vftp0018.csv');
    $inpfile = fopen($filepath, "r");
    // Open and Read individual CSV file
    if (($inpfile = fopen($filepath, 'r')) !== false) {
        // Collect CSV each row records
        $flag = 0;

$skipLines = Inventory::get()->count(); // or however many lines you want to skip
$lineNum = 1;
if ($skipLines > 0) {
    while (fgetcsv($inpfile)) {
        if ($lineNum==$skipLines) { break; }
        $lineNum++;
    }
}
            while (($data = fgetcsv($inpfile, 10000)) !== false) {

                if($flag != 0){
                    if(!Inventory::where('partno',$data[0])->where('location_code',$data[6])->first()){
                        $inventory = new Inventory;
                        $inventory->partno = $data[0]??null;
                        $inventory->vendor_partno = $data[1]??null;
                        $inventory->mpn = $data[2]??null;
                        $inventory->description = $data[3]??null;
                        $inventory->brand = $data[4]??null;
                        $inventory->model = $data[5]??null;
                        $inventory->location_code = $data[6]??null;
                        $inventory->available_qty = $data[7]??null;
                        $inventory->price = $data[8]??null;
                        $inventory->drop_shipper = $data[9]??null;
                        $inventory->ds_vendor_code = $data[10]??null;
                        $inventory->location_name = $data[11]??null;
                        $inventory->save();

                    }
                
                }
                    $flag=1;
            }
    }
    fclose($inpfile); // Close individual CSV file 

    }








}
