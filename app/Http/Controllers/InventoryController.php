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
 

    public $storeArr=array();

    public function recursiveScan($dir,$storeArr) {
        $tree = glob(rtrim($dir, '/') . '/*');
  

        if (is_array($tree)) {
            foreach($tree as $file) {
                if(is_dir($file)) {
                    $this->recursiveScan($file,$this->storeArr);
                }elseif (is_file($file)) {

                    $folderPath = explode('/', $file);
 
                    $this->storeArr[$folderPath[6]][] = $file;
                    // array_push($this->storeArr[],$file);
                }
            }
        }
        return $this->storeArr;
    }

    public function automationUpdate(Request $request){
 
        $fieldsArray = array(

            "vftp0010"=>array(
                "partno" =>"0",
                "vendor_partno" =>"1",
                "mpn" =>null,
                "description" =>"3",
                "brand" =>"2",
                "model" =>null,
                "location_code" =>"6",
                "available_qty" =>"5",
                "price" =>"4", 
            ),

            "vftp0011"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"1",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>array("Jacksonville"=>"3","Columbia"=>"4","Tallahassee"=>"5",),
                "price" =>"2", 
            ),
            "vftp0012"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>"6",
                "description" =>"1",
                "brand" =>"2",
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"4",
                "price" =>"3", 
            ),
            // "vftp0013"=>array(
            //     "partno" =>"0",
            //     "vendor_partno" =>null,
            //     "mpn" =>"6",
            //     "description" =>"1",
            //     "brand" =>"2",
            //     "model" =>null,
            //     "location_code" =>null,
            //     "available_qty" =>"4",
            //     "price" =>"3", 
            // ),
            "vftp0014"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>"2",
                "description" =>"1",
                "brand" =>"3",
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"4",
                "price" =>"5",
            ),
            "vftp0015"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>"2",
                "description" =>"3",
                "brand" =>null,
                "model" =>null,
                "location_code" =>"8",
                "available_qty" =>"7",
                "price" =>null,
            )
        );

        $vendor_info = array(
                "vftp0010"=>array(
                    '8'  =>array ( "Omni","OS8","OS-Inv_AmarilloTX"),
                    '10' =>array ( "Omni","OS10","OS-Inv_BillingsMT"),
                    '11' =>array ( "Omni","OS11","OS-Inv_DallasTX"),
                    '15' =>array ( "Omni","OS15","OS-Inv_DallasTX"),
                    '19' =>array ( "Omni","OS19","OS-Inv_DallasTX"),
                    '20' =>array ( "Omni","OS20","OS-Inv_DallasTX"),
                    '22' =>array ( "Omni","OS22","OS-Inv_DallasTX"),
                    '61' =>array ( "Omni","OS61","OS-Inv_DallasTX"),
                    '62' =>array ( "Omni","OS62","OS-Inv_SaltLakeCityUT"),
                    '71' =>array ( "Omni","OS71","OS-Inv_CommerceCA"),
                    '72' =>array ( "Omni","OS71","OS-Inv_CommerceCA"),
                ),
                "vftp0011"=>array(
                    'Jacksonville' => array("Barons","BTJACK","BT-Inv_JacksonvilleFL"),
                    'Columbia' => array("Barons","BTCOLU","BT-Inv_ColumbiaSC"),
                    'Tallahasee' => array("Barons","BTTALLA","BT-Inv_TallahaseeFL"),
                ),
                "vftp0012"=>array(
                    'LongIsland' => array("Future","FTOLDB","FT-Inv_OldBethpageNY"),
                    'Philadelphia' => array("Future","FTPHIL","FT-Inv_PhiladelphiaPA"),
                    'Schenectady' => array("Future","FTSCHEN","FT-Inv_SchenectadyNY"),
                ),
        );

        $sourcePath = '/bala/Bala - web/Wheel Client/03_10_inventories_data/vftp_local';

        // $readFolders = glob($sourcePath); 

        $allFiles = $this->recursiveScan($sourcePath,$this->storeArr);  
        // dd($allFiles);
        unset($allFiles['vftp0010']);
        unset($allFiles['vftp0011']);

        foreach($allFiles as $folderKey => $folder) {

            $fields = $fieldsArray[$folderKey];
            foreach($folder as $key => $selectedFile) { 


                $filepath = $selectedFile;
                $inpfile = fopen($filepath, "r");
                // Open and Read individual CSV file
                if (($inpfile = fopen($filepath, 'r')) !== false) {
                    // Collect CSV each row records
                    $flag = 0;
                    while (($data = fgetcsv($inpfile, 10000)) !== false) {

                        if($flag != 0){
                            $insertData = array(

                                'filename'=>$folderKey,

                                 'partno'=>($fields['partno']!=null)?$data[$fields['partno']]:null,                         //PartNo

                                 'vendor_partno'=>($fields['vendor_partno']!=null)?$data[$fields['vendor_partno']]:null,        //VendorPartNo

                                 'mpn'=>($fields['mpn']!=null)?$data[$fields['mpn']]:null,                 //MPN

                                 'description'=>($fields['description']!=null)?$data[$fields['description']]:null,         //Description

                                 'brand'=>($fields['brand']!=null)?$data[$fields['brand']]:null,               //Brand

                                 'model'=>($fields['model']!=null)?$data[$fields['model']]:null,               //Model

                                 'location_code'=>($fields['location_code']!=null)?$data[$fields['location_code']]:null,       //Location Code

                                 'available_qty'=>($fields['available_qty']!=null)?$data[$fields['available_qty']]:null,       //Available QTY

                                 'price'=>($fields['price']!=null)?$data[$fields['price']]:null,               //Price
                            );


                            if($folderKey == "vftp0010"){

                                $insertData['drop_shipper']=$vendor_info[$folderKey][$insertData['location_code']][0];
                                $insertData['ds_vendor_code']=$vendor_info[$folderKey][$insertData['location_code']][1];
                                $insertData['location_name']=$vendor_info[$folderKey][$insertData['location_code']][2];

                                $exists = \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->where('location_code',$insertData['location_code'])->get();

                                if($exists->count()){

                                    // dd($exists,$insertData);
                                    \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->update($insertData);
                                }else{

                                    \DB::table('inventories_test')->insert($insertData);
                                }
                                

                            }elseif($folderKey == "vftp0011"){ 


                                foreach ($vendor_info[$folderKey] as $key => $vendor) {
                                    
                                    $insertData['drop_shipper']=$vendor[$key][0];
                                    $insertData['ds_vendor_code']=$vendor[$key][1];
                                    $insertData['location_name']=$vendor[$key][2];

                                    $exists = \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->where('location_code',$insertData['location_code'])->get();

                                    if($exists->count()){
                                        
                                        \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->update($insertData);
                                    }else{

                                        \DB::table('inventories_test')->insert($insertData);
                                    }
                                }
                                
                            }elseif($folderKey == "vftp0012"){


                                    $filename = explode(".",end(explode('/', $selectedFile)));
                                    $locName = @$filename[0];

                                    $insertData['drop_shipper']=$vendor_info[$folderKey][$locName]][0];
                                    $insertData['ds_vendor_code']=$vendor_info[$folderKey][$locName]][1];
                                    $insertData['location_name']=$vendor_info[$folderKey][$locName]][2];
                                    
                                    $exists = \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->where('location_code',$insertData['location_code'])->get();

                                    if($exists->count()){
                                        
                                        \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->update($insertData);
                                    }else{

                                        \DB::table('inventories_test')->insert($insertData);
                                    }
                                

                            }elseif($folderKey == "vftp0013"){

                            }elseif($folderKey == "vftp0014"){

                            }elseif($folderKey == "vftp0015"){

                            }
                        }
                        $flag=1;
                    }
                }

            }
        }
        return "success";
    }


    // public function automationUpdate(Request $request){

    //     $this->listFolderFiles('/bala/Bala - web/Wheel Client/03_10_inventories_data');
    // }




}
