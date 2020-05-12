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
                "available_qty" =>array("Jacksonville"=>"3","Columbia"=>"4","Tallahasee"=>"5"),
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
            ),
            "vftp0016"=>array(
                "partno" =>"1",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"2",
                "brand" =>"0",
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>array(
                    "DenverCO"    =>"3",
                    "DallasTX"    =>"4",
                    "HoustonTX"   =>"5",
                    "KansasCityMO"    =>"6",
                    "NewOrleansLA"    =>"7",
                    "PhoenixAZ"   =>"8",
                    "OKCityOK"    =>"9",
                    "ElkGroveCA"  =>"10",
                    "SanAntonioTX"    =>"11",
                    "LosAngelesCA"    =>"12",
                    "SeattleWA"   =>"13",
                    "AtlantaGA"   =>"14",
                    "ChicagoIL"   =>"15",
                    "OrlandoFL"   =>"16",
                    "MiamiFL" =>"17",
                    "ClevelandOH" =>"18",
                    "CincinattiOH"    =>"19",
                    "CharlotteNC" =>"20",
                    "CranburyNJ"  =>"21",
                    "NashvilleTN" =>"22",
                    "SaltLakeUT"  =>"23",
                    "ManchesterCT"    =>"24",
                    "MinneapolisMN"   =>"25",
                    "JacksonvilleFL"  =>"26",
                    "RichmondVA"  =>"27",
                    "CoronaCA"    =>"28",
                    "PortlandOR"  =>"29",
                    "BaltimoreMD" =>"30",
                    "MfgBuenaParkCA"  =>"31",
                    "DistBuenaParkCA" =>"32",
                ),
                "price" =>"34", 
            ),
            "vftp0017"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>null,
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>array(
                    "CA"=>"1",
                    "FL"=>"2",
                    "GA"=>"3",
                    "IL"=>"4",
                    "PA"=>"5",
                    "TX"=>"6",
                    "UT"=>"7",
                    "WA"=>"8",
                ),
                "price" =>null, 
            ),
            "vftp0018"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"1",
                "brand" =>"4",
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>array(
                    "ATL" =>"5",
                    "CHAR" =>"6",
                    "CHI" =>"7",
                    "COL" =>"8",
                    "DAL" =>"9",
                    "DEN" =>"10",
                    "HOUS" =>"11",
                    "IND" =>"12",
                    "JACKFL" =>"13",
                    "KSCITY" =>"14",
                    "LA" =>"15",
                    "LA2" =>"16",
                    "NASH" =>"17",
                    "NJ" =>"18",
                    "NORL" =>"19",
                    "PHXAZ" =>"20",
                    "SANT" =>"21",
                    "SEAWA" =>"22",
                ),
                "price" =>"2", 
            ),
            // "vftp0022"=>array(
            //     "partno" =>"0",
            //     "vendor_partno" =>null,
            //     "mpn" =>null,
            //     "description" =>"1",
            //     "brand" =>"4",
            //     "model" =>null,
            //     "location_code" =>null,
            //     "available_qty" =>array(
            //         "ATL" =>"5",
            //         "CHAR" =>"6",
            //         "CHI" =>"7",
            //         "COL" =>"8",
            //         "DAL" =>"9",
            //         "DEN" =>"10",
            //         "HOUS" =>"11",
            //         "IND" =>"12",
            //         "JACKFL" =>"13",
            //         "KSCITY" =>"14",
            //         "LA" =>"15",
            //         "LA2" =>"16",
            //         "NASH" =>"17",
            //         "NJ" =>"18",
            //         "NORL" =>"19",
            //         "PHXAZ" =>"20",
            //         "SANT" =>"21",
            //         "SEAWA" =>"22",
            //     ),
            //     "price" =>"2", 
            // ),

            "vftp0023"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"3",
                "brand" =>null,
                "model" =>"2",
                "location_code" =>"4",
                "available_qty" =>"5",
                "price" =>null, 
            ),
            "vftp0027"=>array(
                "partno" =>"1",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"2",
                "brand" =>"0",
                "model" =>null,
                "location_code" =>"5",
                "available_qty" =>"4",
                "price" =>"3", 
            ),
            "vftp0028"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"5",
                "brand" =>"1",
                "model" =>"3",
                "location_code" =>null,
                "available_qty" =>array(
                    'F92'=>'22',
                    'g90'=>'24',
                    'G91'=>'26',
                    'G92'=>'28',
                    'O91'=>'30',
                    'W90'=>'32',
                    'W91'=>'34',
                    'W92'=>'36',
                    'W93'=>'38',
                    'W94'=>'40',
                    'W95'=>'42',
                    'W96'=>'44',
                    'W97'=>'46',
                    'W98'=>'48',                
                ),
                "price" =>null, 
            ),
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
                "vftp0014"=>array("TWI","TWI1","TWI-Inv_TroyMI"),
                "vftp0015"=>array(
                    '1' =>   array("Reliable","RTNJ","RT-Inv_BlackwoodNJ"),
                    '3' =>   array("Reliable","RTGAM","RT-Inv_MaconGA"),
                    '5' =>   array("Reliable","RTNY","RT-Inv_SyracuseNY"),
                    '7' =>   array("Reliable","RTGAD","RT-Inv_DoravilleGA"),
                    '9' =>   array("Reliable","RTCT","RT-Inv_HartfordCT"),
                    '41' =>  array("Reliable","RTMD","RT-Inv_JessupMD"),
                ),
                "vftp0016"=>array(
                    "DenverCO"    => array("WheelPros","WP1001","WP-Inv_DenverCO"),
                    "DallasTX"    => array("WheelPros","WP1002","WP-Inv_DallasTX"),
                    "HoustonTX"   => array("WheelPros","WP1003","WP-Inv_HoustonTX"),
                    "KansasCityMO"    => array("WheelPros","WP1004","WP-Inv_KansasCityMO"),
                    "NewOrleansLA"    => array("WheelPros","WP1005","WP-Inv_NewOrleansLA"),
                    "PhoenixAZ"   => array("WheelPros","WP1006","WP-Inv_PhoenixAZ"),
                    "OKCityOK"    => array("WheelPros","WP1007","WP-Inv_OKCityOK"),
                    "ElkGroveCA"  => array("WheelPros","WP1008","WP-Inv_ElkGroveCA"),
                    "SanAntonioTX"    => array("WheelPros","WP1009","WP-Inv_SanAntonioTX"),
                    "LosAngelesCA"    => array("WheelPros","WP1011","WP-Inv_LosAngelesCA"),
                    "SeattleWA"   => array("WheelPros","WP1013","WP-Inv_SeattleWA"),
                    "AtlantaGA"   => array("WheelPros","WP1014","WP-Inv_AtlantaGA"),
                    "ChicagoIL"   => array("WheelPros","WP1015","WP-Inv_ChicagoIL"),
                    "OrlandoFL"   => array("WheelPros","WP1016","WP-Inv_OrlandoFL"),
                    "MiamiFL" => array("WheelPros","WP1018","WP-Inv_MiamiFL"),
                    "ClevelandOH" => array("WheelPros","WP1019","WP-Inv_ClevelandOH"),
                    "CincinattiOH"    => array("WheelPros","WP1020","WP-Inv_CincinattiOH"),
                    "CharlotteNC" => array("WheelPros","WP1021","WP-Inv_CharlotteNC"),
                    "CranburyNJ"  => array("WheelPros","WP1022","WP-Inv_CranburyNJ"),
                    "NashvilleTN" => array("WheelPros","WP1024","WP-Inv_NashvilleTN"),
                    "SaltLakeUT"  => array("WheelPros","WP1025","WP-Inv_SaltLakeUT"),
                    "ManchesterCT"    => array("WheelPros","WP1026","WP-Inv_ManchesterCT"),
                    "MinneapolisMN"   => array("WheelPros","WP1028","WP-Inv_MinneapolisMN"),
                    "JacksonvilleFL"  => array("WheelPros","WP1029","WP-Inv_JacksonvilleFL"),
                    "RichmondVA"  => array("WheelPros","WP1030","WP-Inv_RichmondVA"),
                    "CoronaCA"    => array("WheelPros","WP1031","WP-Inv_CoronaCA"),
                    "PortlandOR"  => array("WheelPros","WP1032","WP-Inv_PortlandOR"),
                    "BaltimoreMD" => array("WheelPros","WP1034","WP-Inv_BaltimoreMD"),
                    "MfgBuenaParkCA"  => array("WheelPros","WP1053","WP-Inv_MfgBuenaParkCA"),
                    "DistBuenaParkCA" => array("WheelPros","WP1054","WP-Inv_DistBuenaParkCA"),
                ),
                "vftp0017"=>array(
                    "CA"=>array("TSW","TSWCA","TSW-Inv_BreaCA"),
                    "FL"=>array("TSW","TSWFL","TSW-Inv_MiamiFL"),
                    "GA"=>array("TSW","TSWGA","TSW-Inv_AtlantaGA"),
                    "IL"=>array("TSW","TSWIL","TSW-Inv_ChicagoIL"),
                    "PA"=>array("TSW","TSWPA","TSW-Inv_PhiladelphiaPA"),
                    "TX"=>array("TSW","TSWTX","TWS-Inv_DallasTX"),
                    "UT"=>array("TSW","TSWUT","TSW-Inv_SaltLakeUT"),
                    "WA"=>array("TSW","TSWWA","TSW-Inv_SeattleWA"),
                ),
                "vftp0018"=>array(
                    "ATL" =>    array("TheWheelGroup","WG312","WG-Inv_AtlantaGA"),
                    "CHAR" =>   array("TheWheelGroup","WG307","WG-Inv_CharlotteNC"),
                    "CHI" =>    array("TheWheelGroup","WG317","WG-Inv_ChicagoIL"),
                    "COL" =>    array("TheWheelGroup","WG204","WG-Inv_ColumbusOH"),
                    "DAL" =>    array("TheWheelGroup","WG211","WG-Inv_DallasTX"),
                    "DEN" =>    array("TheWheelGroup","WG126","WG-Inv_DenverCO"),
                    "HOUS" =>   array("TheWheelGroup","WG210","WG-Inv_HoustonTX"),
                    "IND" =>    array("TheWheelGroup","WG324","WG-Inv_IndianapolisIN"),
                    "JACKFL" => array("TheWheelGroup","WG206","WG-Inv_JacksonvilleFL"),
                    "KSCITY" => array("TheWheelGroup","WG221","WG-Inv_KansasCityMO"),
                    "LA" => array("TheWheelGroup","WG328","WG-Inv_OntarioCA"),
                    "LA2" =>    array("TheWheelGroup","WG329","WG-Inv_Ontario2CA"),
                    "NASH" =>   array("TheWheelGroup","WG302","WG-Inv_NashvilleTN"),
                    "NJ" => array("TheWheelGroup","WG305","WG-Inv_NewBrunswickNJ"),
                    "NORL" =>   array("TheWheelGroup","WG325","WG-Inv_NewOrleansLA"),
                    "PHXAZ" =>  array("TheWheelGroup","WG113","WG-Inv_PhoenixAZ"),
                    "SANT" =>   array("TheWheelGroup","WG218","WG-Inv_SanAntonioTX"),
                    "SEAWA" =>  array("TheWheelGroup","WG114","WG-Inv_SeattleWA"),
                ),



        );

        $sourcePath = '/bala/Bala - web/Wheel Client/03_10_inventories_data/vftp_local';

        // $readFolders = glob($sourcePath); 

        $allFiles = $this->recursiveScan($sourcePath,$this->storeArr);  
        // dd($allFiles);
        unset($allFiles['vftp0010']);
        unset($allFiles['vftp0011']);
        unset($allFiles['vftp0012']);
        unset($allFiles['vftp0013']);
        unset($allFiles['vftp0014']);
        unset($allFiles['vftp0015']);
        unset($allFiles['vftp0016']);
        unset($allFiles['vftp0017']);
        unset($allFiles['vftp0018']);
        unset($allFiles['vftp0019']);
        unset($allFiles['vftp0020']);
        unset($allFiles['vftp0021']);
        unset($allFiles['vftp0022']);
        unset($allFiles['vftp0023']);
        unset($allFiles['vftp0024']);
        unset($allFiles['vftp0025']);
        unset($allFiles['vftp0026']);
        unset($allFiles['vftp0027']);
        
        // dd($allFiles);

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

                                 'partno'=>($fields['partno']!=null)?preg_replace("/[^A-Za-z0-9]/", '',$data[$fields['partno']]):null,                         //PartNo

                                 'vendor_partno'=>($fields['vendor_partno']!=null)?$data[$fields['vendor_partno']]:null,        //VendorPartNo

                                 'mpn'=>($fields['mpn']!=null)?$data[$fields['mpn']]:null,                 //MPN

                                 'description'=>($fields['description']!=null)?$data[$fields['description']]:null,         //Description

                                 'brand'=>($fields['brand']!=null)?$data[$fields['brand']]:null,               //Brand

                                 'model'=>($fields['model']!=null)?$data[$fields['model']]:null,               //Model

                                 'location_code'=>($fields['location_code']!=null)?trim($data[$fields['location_code']]," "):null,       //Location Code

                                 'price'=>($fields['price']!=null)?$data[$fields['price']]:0,               //Price
                            );
                            if(gettype($fields['available_qty']) != 'array'){

                                    $insertData['available_qty']=($fields['available_qty']!=null)?$data[$fields['available_qty']]:0; 

                            } 

                            if($folderKey == "vftp0010" || $folderKey == "vftp0015"  || $folderKey == "vftp0023"){

                                $insertData['drop_shipper']=$vendor_info[$folderKey][$insertData['location_code']][0];
                                $insertData['ds_vendor_code']=$vendor_info[$folderKey][$insertData['location_code']][1];
                                $insertData['location_name']=$vendor_info[$folderKey][$insertData['location_code']][2];
                                $exists = \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->where('location_code',$insertData['location_code'])->get();

                                // dd($insertData,$vendor_info[$folderKey]);
                                if($exists->count()){

                                    // dd($exists,$insertData);
                                    \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->update($insertData);
                                }else{

                                    \DB::table('inventories_test')->insert($insertData);
                                }
                                

                            }elseif($folderKey == "vftp0011" || $folderKey == "vftp0016" || $folderKey == "vftp0017" ||  $folderKey == "vftp0018"){ 


                                foreach ($vendor_info[$folderKey] as $key => $vendor) {
                                      // dd($key);
                                    $insertData['available_qty']=$data[$fieldsArray[$folderKey]['available_qty'][$key]]; 
                                    $insertData['location_code']=$key; 

                                    $insertData['drop_shipper']=$vendor[0];
                                    $insertData['ds_vendor_code']=$vendor[1];
                                    $insertData['location_name']=$vendor[2];
                                    // dd($insertData,$data);
                                    $exists = \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->where('location_code',$insertData['location_code'])->get();

                                    if($exists->count()){
                                        
                                        \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->update($insertData);
                                    }else{

                                        \DB::table('inventories_test')->insert($insertData);
                                    }
                                }
                                
                            }elseif($folderKey == "vftp0012"){

                                    $fullfile = explode('/', $selectedFile);
                                    $filename = explode(".",end($fullfile));
                                    $locName = $filename[0];

                                    $insertData['drop_shipper']=$vendor_info[$folderKey][$locName][0];
                                    $insertData['ds_vendor_code']=$vendor_info[$folderKey][$locName][1];
                                    $insertData['location_name']=$vendor_info[$folderKey][$locName][2];
                                    
                                    $exists = \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->where('location_code',$insertData['location_code'])->get();

                                    if($exists->count()){
                                        
                                        \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->update($insertData);
                                    }else{

                                        \DB::table('inventories_test')->insert($insertData);
                                    }
                                

                            }elseif($folderKey == "vftp0013"){

                            }elseif($folderKey == "vftp0014" || $folderKey == "vftp0027"){ 
                                $insertData['drop_shipper']=$vendor_info[$folderKey][0];
                                $insertData['ds_vendor_code']=$vendor_info[$folderKey][1];
                                $insertData['location_name']=$vendor_info[$folderKey][2];

                                $exists = \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->where('location_code',$insertData['location_code'])->get();

                                    // dd($exists,$insertData);
                                if($exists->count()){

                                    \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->update($insertData);
                                }else{

                                    \DB::table('inventories_test')->insert($insertData);
                                }
                                

                            }elseif($folderKey == "vftp0016"){

                            }elseif($folderKey == "vftp0028"){ 


                                foreach ($vendor_info[$folderKey] as $key => $vendor) {
                                      // dd($key);
                                    $insertData['available_qty']=$data[$fieldsArray[$folderKey]['available_qty'][$key]]; 
                                    $insertData['location_code']=$key; 

                                    $insertData['price']=$data[($fieldsArray[$folderKey]['available_qty'][$key])+1];

                                    $insertData['drop_shipper']=$vendor[0];
                                    $insertData['ds_vendor_code']=$vendor[1];
                                    $insertData['location_name']=$vendor[2];
                                    dd($insertData,$data);
                                    $exists = \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->where('location_code',$insertData['location_code'])->get();

                                    if($exists->count()){
                                        
                                        \DB::table('inventories_test')->where('partno',$insertData['partno'])->where('location_code',$insertData['location_code'])->update($insertData);
                                    }else{

                                        \DB::table('inventories_test')->insert($insertData);
                                    }
                                }
                                
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
