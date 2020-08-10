<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use App\Inventory;
use App\RemoteInventory;
use App\InventoryMigration;
use App\InventoryProcess;

use Illuminate\Http\Request; 
use Storage;

use Rap2hpoutre\FastExcel\FastExcel;

class UpdateFolderWise extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'folderupdate:inventories {folder?} {env?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the VFTP Folders Sheet Data ';


    public $env='';

    public $storeArr=array();


    /**
     * Create a new command instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        parent::__construct();
    }

 

    public function recursiveScan($dir,$storeArr) {
        $tree = glob(rtrim($dir, '/') . '/*');
        if (is_array($tree)) {
            foreach($tree as $file) {
                if(is_dir($file)) {
                    $this->recursiveScan($file,$this->storeArr);
                }elseif (is_file($file)) {

                $filename = strtoupper($file);
    
                   if ( (strpos($filename, '.XLSX') !== false) ||
                        (strpos($filename, '.XLS') !== false) ||
                        (strpos($filename, '.CSV') !== false) || 
                        (strpos($filename, '.csv') !== false) 
                      )
                   { 
                        $this->storeArr[] = $file;
                   }
                    // array_push($this->storeArr[],$file);
                }
            }
        }
        return $this->storeArr;
    }

    public function process_update($fname,$dropshipper) {
         $pid = getmypid();
         $invprocess = InventoryProcess::where('foldername',$fname)->whereDate('created_at', \Carbon\Carbon::today())->first();
         if($invprocess){
            $invprocess->processid = $pid;
            $invprocess->loopcount = $invprocess->loopcount +1;
            $invprocess->save(); 
         }else{
            $invprocess = InventoryProcess::create([
                'foldername' => $fname,
                'dropshipper' => $dropshipper,
                'processid' => $pid,
                'loopcount' => 1,
                // 'started_at' => \Carbon\Carbon::now(),
            ]);
         }
    }
    public function inventoryFeedUpdate($currentFolder,$newData,$db_ext=''){ 
        // $this->info(getmypid());
        $table = "inventories"; 
 
        if(array_keys($newData) !== range(0, count($newData) - 1)) {

            // $this->info($currentFolder." --- ".$newData['partno']." --- ".$newData['location_code']);
 

            $newData['available_qty'] = (integer)$this->clean($newData['available_qty']);
            $newData['price'] = $this->clean($newData['price']);
            // dd($newData);
            if(is_numeric($newData['available_qty'])&&is_numeric($newData['price'])){
                // dd($newData);
                $test = Inventory::updateOrCreate(['partno' =>$newData['partno'],'drop_shipper' =>$newData['drop_shipper'], 'location_code' =>$newData['location_code']] , $newData );
                // dd($test);
                if($this->env != 'local'){

                RemoteInventory::updateOrCreate(['partno' =>$newData['partno'],'drop_shipper' =>$newData['drop_shipper'], 'location_code' =>$newData['location_code']] , $newData );
                 
                \Log::channel('ftplog')->info("FOLDER:".$currentFolder." --- "."PN:".$newData['partno']." --- "."LOC:".$newData['location_code']); 
                }

                $this->process_update($currentFolder,$newData['drop_shipper']);
            }

        }else{
            

 
                foreach ($newData as $key => $data) {

                    $data['available_qty'] =  (string)$this->clean($data['available_qty']);
                    $data['price'] = $this->clean($data['price']);


                    if(is_numeric($data['available_qty'])&&is_numeric($data['price'])){
                        
                        // $this->info($currentFolder." --- ".$data['partno']." --- ".$data['location_code']);

                       

                        Inventory::updateOrCreate(['partno' =>$data['partno'],'drop_shipper' =>$data['drop_shipper'], 'location_code' =>$data['location_code']] , $data ); 
                        if($this->env != 'local'){
                            RemoteInventory::updateOrCreate(['partno' =>$data['partno'],'drop_shipper' =>$data['drop_shipper'], 'location_code' =>$data['location_code']] , $data );  

                            \Log::channel('ftplog')->info("FOLDER:".$currentFolder." --- "."PN:".$data['partno']." --- "."LOC:".$data['location_code']);
                        }
                        
                        $this->process_update($currentFolder,$data['drop_shipper']);
                        // $sap_exists_loop = $db_ext->table('inventories')->select('partno','location_code')->where('partno',$data['partno'])->where('location_code',$data['location_code'])->first(); 


                        // if($sap_exists_loop){
                        //     $db_ext->table('inventories')->where('partno',$data['partno'])->where('location_code',$data['location_code'])->update($data); 
                        // }else{

                        //     $db_ext->table('inventories')->insert($data);   
                        // }
                    }
                } 


        }

 
    }

    function clean($string) {
       // $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

       $convString = preg_replace('/[^0-9\-.]/', '', $string); // Removes special chars.

       if (strpos($convString, '-') !== false || $convString =='') {
            $convString = 0;
       }
       return $convString;
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
  

        $folderKey = $this->argument('folder'); 

        $this->env = $this->argument('env'); 

        $currentFolder = $folderKey;


        \Log::info("FOLDER NAME ".$folderKey);

        ini_set('max_execution_time',1200);
        set_time_limit(1200);

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
            "vftp0013"=>array(
                "partno" =>"1",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"2",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"3",
                "price" =>"4",
            ),
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
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"1",
                "brand" =>"2",
                "model" =>"3",
                "location_code" =>null,
                "available_qty" =>array(
                    "1001"=>"19",
                    "1002"=>"20",
                    "1003"=>"21",
                    "1004"=>"22",
                    "1005"=>"23",
                    "1006"=>"24",
                    "1007"=>"25",
                    "1008"=>"26",
                    "1009"=>"27",
                    "1011"=>"28",
                    "1013"=>"29",
                    "1014"=>"30",
                    "1015"=>"31",
                    "1016"=>"32",
                    "1018"=>"33",
                    "1019"=>"34",
                    "1020"=>"35",
                    "1021"=>"36",
                    "1022"=>"37",
                    "1024"=>"38",
                    "1025"=>"39",
                    "1026"=>"40",
                    "1028"=>"41",
                    "1029"=>"42",
                    "1030"=>"43",
                    "1031"=>"44",
                    "1032"=>"45",
                    "1033"=>"46",
                    "1034"=>"47",
                    "1035"=>"48",
                    "1036"=>"49",
                    "1037"=>"50",
                    "1038"=>"51",
                    "1039"=>"52",
                    "1040"=>"53",
                    "1041"=>"54",
                    "1042"=>"55",
                    "1043"=>"56",
                    "1044"=>"57",
                    "1045"=>"58",
                    "1046"=>"59",
                    "1047"=>"60",
                    "1048"=>"61",
                    "1049"=>"62",
                    "1053"=>"63",
                    "1055"=>"64",
                    "1056"=>"65",
                    "1061"=>"66",
                    "1070"=>"67",
                    "1071"=>"68",
                    "1072"=>"69",
                    "1082"=>"70",
                    "1084"=>"71",
                    "1085"=>"72",
                    "1086"=>"73",
                    "1402"=>"74",
                    "1403"=>"75",
                    "1404"=>"76",
                    "1406"=>"77",
                    "1409"=>"78",
                    "1415"=>"79",
                    "1421"=>"80",
                    "1425"=>"81",
                    "1428"=>"82",
                    "1434"=>"83",
                    "1436"=>"84",

                ),
                "price" =>"16", 
            ),
            "vftp0017"=>array(
                "partno" =>"1",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>null,
                "brand" =>"0",
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>array(
                    "CA"=>"2",
                    "FL"=>"3",
                    "GA"=>"4",
                    "IL"=>"5",
                    "PA"=>"6",
                    "TX"=>"7",
                    "UT"=>"8",
                    "WA"=>"9",
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
            "vftp0019"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"3",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"7",
                "price" =>"6", 
            ),
            "vftp0022"=>array(
                "partno" =>"2",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"1",
                "brand" =>"0",
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"3",
                "price" =>"6", 
            ),

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
            "vftp0024"=>array(
                "partno" =>"1",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"2",
                "brand" =>"0",
                "model" =>null,
                "location_code" =>"6",
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
            "vftp0029"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"1",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"3",
                "price" =>"2", 
            ),
            "vftp0030"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>"4",
                "description" =>"1",
                "brand" =>"2",
                "model" =>null,
                "location_code" =>"5",
                "available_qty" =>"6",
                "price" =>null, 
            ),

            "vftp0031"=>array(
                "partno" =>"0",
                "vendor_partno" =>"2",
                "mpn" =>"1",
                "description" =>null,
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>array(
                    "RALEIGHNC" => "3",
                    "BALTIMOREMD" => "4",
                    "PHILADELPHIANJ" => "5",
                    "TAMPAFL" => "6",
                    "JACKSONVILLEFL" => "7",
                    "DALLASTX" => "8",
                    "FTLAUDERDALEFL" => "9",
                    "OKCOK" => "10",
                    "CHARLOTTENC" => "11",
                    "ATLANTAGA" => "12",
                    "ORLANDOFL" => "13",
                    "KANSASCITYMO" => "14",
                    "LOUISVILLEKY" => "15",
                    "HOUSTONTX" => "16",
                    "SANANTONIOTX" => "17",
                    "HARTFORDCT" => "18",
                    "CLEVELANDOH" => "19",
                    "NASHVILLETN" => "20",
                    "NORTHJERSEYNJ" => "21",
                    "SALTLAKECITYUT" => "22",
                    "DENVERCO" => "23",
                    "PORTLANDOR" => "24",
                    "DETROITMI" => "25",
                    "RICHMONDVA" => "26",
                    "COLUMBUSOH" => "27",
                    "JACKSONMS" => "28",
                    "OMAHANE" => "29",
                    "CHICAGOIL" => "30",
                    "PITTSBURGHPA" => "31",
                    "PHOENIXAZ" => "32",
                    "OAKLANDCA" => "33",
                    "SIMIVALLEYCA" => "34",
                    "FONTANACA" => "35",
                    "MANASSASVA" => "36",
                    "ROCHESTERNY" => "37",
                    "LONGISLANDNY" => "38",
                    "ALBUQUERQUENM" => "39",
                    "CHATANOOGAGA" => "40",
                    "MEMPHISTN" => "41",
                    "CINCINNATIOH" => "42",
                    "INDIANAPOLISIN" => "43",
                    "ALBANYNY" => "44",
                    "BOSTONMA" => "45",
                    "PHILADELPHIANJ" => "46",
                    "ALLENTOWNPA" => "47",
                    "BUFFALONY" => "48",
                    "SYRACUSENY" => "49",
                    "GREENSBORONC" => "50",
                    "ATLANTAGA" => "51",
                    "BIRMINGHAMAL" => "52",
                    "MIAMIFL" => "53",
                    "NEWORLEANSLA" => "54",
                    "DALLASTX" => "55",
                    "HOUSTONTX" => "56",
                    "MOBILEAL" => "57",
                    "LASVEGASNV" => "58",
                    "FRESNOCA" => "59",
                    "SANTAANACA" => "60",
                    "LOSANGELESCA" => "61",
                    "SANJOSECA" => "62",
                    "SACRAMENTOCA" => "63",
                    "HAWAIIHI" => "64",
                    "SEATTLEWA" => "65",
                    "BENICIACA" => "66",
                    "SANDIEGOCA" => "67",
                    "BATONROUGELA" => "68",
                    "AUSTINTX" => "69",
                    "KNOXVILLETN" => "70",
                    "FTMYERSFL" => "71",
                ),
                "price" =>null,  
            ),
            "vftp0032"=>array(
                "partno" =>"12",
                "vendor_partno" =>null,
                "mpn" =>"13",
                "description" =>"10",
                "brand" =>"11",
                "model" =>"10",
                "location_code" =>"1",
                "available_qty" =>"4",
                "price" =>"9",  
            ),
            "vftp0033"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>null,
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>array(
                    "AL"=>"1",
                    "CA"=>"2",
                    "IN"=>"3",
                    "TX"=>"4",
                    "NC"=>"5",
                    "ON"=>"6",
                    "US"=>"7",
                    "CAD"=>"8",

                ),
                "price" =>null,  
            ),
            // "vftp0033"=>array(
            //     "partno" =>"0",
            //     "vendor_partno" =>"1",
            //     "mpn" =>"2",
            //     "description" =>"3",
            //     "brand" =>"4",
            //     "model" =>"5",
            //     "location_code" =>"6",
            //     "available_qty" =>"7",
            //     "price" =>"8",  
            // ),

            "vftp0036"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"3",
                "brand" =>"1",
                "model" =>"2",
                "location_code" =>null,
                "available_qty" =>"10",
                "price" =>"11",  
            ),
            "vftp0037"=>array(
                "partno" =>"1",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"7",
                "brand" =>"0",
                "model" =>"2",
                "location_code" =>null,
                "available_qty" =>"10",
                "price" =>null,  
            ),

            "vftp0038"=>array(
                "partno" =>"1",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"2",
                "brand" =>null,
                "model" =>"0",
                "location_code" =>null,
                "available_qty" =>"12",
                "price" =>"3",  
            ),
            "vftp0040"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"1",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"2",
                "price" =>null,  
            ),

            "vftp0042"=>array(
                "partno" =>"2",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"4",
                "brand" =>"0",
                "model" =>"5",
                "location_code" =>null,
                "available_qty" =>"14",
                "price" =>null,  
            ),
            "vftp0043"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"1",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>array(
                    "CA" => "2",
                    "FL" => "3",
                    "TX" => "4",
                    "NJ" => "5"
                ),
                "price" =>null,  
            ),
            "vftp0044"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"9",
                "brand" =>"1",
                "model" =>"2",
                "location_code" =>null,
                "available_qty" =>"22",
                "price" =>"18",  
            ),
            "vftp0045"=>array(
                "partno" =>"2",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"6",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"8",
                "price" =>null,  
            ),
            "vftp0046"=>array(
                "partno" =>"1",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"2",
                "brand" =>"0",
                "model" =>"5",
                "location_code" =>"14", // Multi locations but single row update
                "available_qty" =>"3",
                "price" =>null,  
            ),
            "vftp0047"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"2",
                "brand" =>"1",
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"3",
                "price" =>null,  
            ),
            "vftp0048"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"1",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"2",
                "price" =>null,  
            ),
            "vftp0049"=>array(
                "partno" =>"3",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"4",
                "brand" =>"0",
                "model" =>"2",
                "location_code" =>null,
                "available_qty" =>array(
                    "ONTARIO, CA" => "9",   // Rim as Common columns so 2 index minus from length
                    "ORLANDO, FL" => "10"   // Rim as Common columns so 2 index minus from length
                ),
                "price" =>null,  
            ),
            "vftp0050"=>array(
                "partno" =>"1",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"5",
                "brand" =>"0",
                "model" =>"2",
                "location_code" =>null,
                "available_qty" =>"10", // Starting row must be heading
                "price" =>null,  
            ),
            "vftp0051"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"3",
                "brand" =>"1",
                "model" =>"2",
                "location_code" =>null,
                "available_qty" =>"9",  
                "price" =>null,  
            ),
            "vftp0052"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"1",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>2,  
                "price" =>null,  
            ),
            "vftp0053"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"4",
                "brand" =>null,
                "model" =>"1",
                "location_code" =>null,
                "available_qty" =>"8",  
                "price" =>"7",  
            ),
            "vftp0054"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"6",
                "brand" =>null,
                "model" =>"1",
                "location_code" =>null,
                "available_qty" =>array(
                    "CA" => "7",  
                    "FL" => "8"   
                ),
                "price" =>null,  
            ),
            "vftp0055"=>array(
                "partno" =>"0",
                "vendor_partno" =>null,
                "mpn" =>null,
                "description" =>"2",
                "brand" =>null,
                "model" =>null,
                "location_code" =>null,
                "available_qty" =>"4",  
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
                "vftp0013"=>array("Economy","ETDALL","ET-Inv_DallasTX"),
                "vftp0014"=>array("TWI","TWI1","TWI-Inv_TroyMI"),
                "vftp0015"=>array(
                    '1' =>   array("Reliable","RTNJ","RT-Inv_BlackwoodNJ"),
                    '3' =>   array("Reliable","RTGAM","RT-Inv_MaconGA"),
                    '5' =>   array("Reliable","RTNY","RT-Inv_SyracuseNY"),
                    '7' =>   array("Reliable","RTGAD","RT-Inv_DoravilleGA"),
                    '9' =>   array("Reliable","RTCT","RT-Inv_HartfordCT"),
                    '41' =>  array("Reliable","RTMD","RT-Inv_JessupMD"),
                    '61' =>  array("Reliable","",""),
                ),
                // "vftp0016"=>array(
                //     "DenverCO"    => array("WheelPros","WP1001","WP-Inv_DenverCO"),
                //     "DallasTX"    => array("WheelPros","WP1002","WP-Inv_DallasTX"),
                //     "HoustonTX"   => array("WheelPros","WP1003","WP-Inv_HoustonTX"),
                //     "KansasCityMO"    => array("WheelPros","WP1004","WP-Inv_KansasCityMO"),
                //     "NewOrleansLA"    => array("WheelPros","WP1005","WP-Inv_NewOrleansLA"),
                //     "PhoenixAZ"   => array("WheelPros","WP1006","WP-Inv_PhoenixAZ"),
                //     "OKCityOK"    => array("WheelPros","WP1007","WP-Inv_OKCityOK"),
                //     "ElkGroveCA"  => array("WheelPros","WP1008","WP-Inv_ElkGroveCA"),
                //     "SanAntonioTX"    => array("WheelPros","WP1009","WP-Inv_SanAntonioTX"),
                //     "LosAngelesCA"    => array("WheelPros","WP1011","WP-Inv_LosAngelesCA"),
                //     "SeattleWA"   => array("WheelPros","WP1013","WP-Inv_SeattleWA"),
                //     "AtlantaGA"   => array("WheelPros","WP1014","WP-Inv_AtlantaGA"),
                //     "ChicagoIL"   => array("WheelPros","WP1015","WP-Inv_ChicagoIL"),
                //     "OrlandoFL"   => array("WheelPros","WP1016","WP-Inv_OrlandoFL"),
                //     "MiamiFL" => array("WheelPros","WP1018","WP-Inv_MiamiFL"),
                //     "ClevelandOH" => array("WheelPros","WP1019","WP-Inv_ClevelandOH"),
                //     "CincinattiOH"    => array("WheelPros","WP1020","WP-Inv_CincinattiOH"),
                //     "CharlotteNC" => array("WheelPros","WP1021","WP-Inv_CharlotteNC"),
                //     "CranburyNJ"  => array("WheelPros","WP1022","WP-Inv_CranburyNJ"),
                //     "NashvilleTN" => array("WheelPros","WP1024","WP-Inv_NashvilleTN"),
                //     "SaltLakeUT"  => array("WheelPros","WP1025","WP-Inv_SaltLakeUT"),
                //     "ManchesterCT"    => array("WheelPros","WP1026","WP-Inv_ManchesterCT"),
                //     "MinneapolisMN"   => array("WheelPros","WP1028","WP-Inv_MinneapolisMN"),
                //     "JacksonvilleFL"  => array("WheelPros","WP1029","WP-Inv_JacksonvilleFL"),
                //     "RichmondVA"  => array("WheelPros","WP1030","WP-Inv_RichmondVA"),
                //     "CoronaCA"    => array("WheelPros","WP1031","WP-Inv_CoronaCA"),
                //     "PortlandOR"  => array("WheelPros","WP1032","WP-Inv_PortlandOR"),
                //     "BaltimoreMD" => array("WheelPros","WP1034","WP-Inv_BaltimoreMD"),
                //     "MfgBuenaParkCA"  => array("WheelPros","WP1053","WP-Inv_MfgBuenaParkCA"),
                //     "DistBuenaParkCA" => array("WheelPros","WP1054","WP-Inv_DistBuenaParkCA"),
                // ),                
                "vftp0016"=>array( 
                    "1001"=>array("WheelPros","WP1001","WP-Inv_DenverCO"),
                    "1002"=>array("WheelPros","WP1002","WP-Inv_DallasTX"),
                    "1003"=>array("WheelPros","WP1003","WP-Inv_HoustonTX"),
                    "1004"=>array("WheelPros","WP1004","WP-Inv_KansasCityMO"),
                    "1005"=>array("WheelPros","WP1005","WP-Inv_NewOrleansLA"),
                    "1006"=>array("WheelPros","WP1006","WP-Inv_PhoenixAZ"),
                    "1007"=>array("WheelPros","WP1007","WP-Inv_OKCityOK"),
                    "1008"=>array("WheelPros","WP1008","WP-Inv_ElkGroveCA"),
                    "1009"=>array("WheelPros","WP1009","WP-Inv_SanAntonioTX"),
                    "1011"=>array("WheelPros","WP1011","WP-Inv_LosAngelesCA"),
                    "1013"=>array("WheelPros","WP1013","WP-Inv_SeattleWA"),
                    "1014"=>array("WheelPros","WP1014","WP-Inv_AtlantaGA"),
                    "1015"=>array("WheelPros","WP1015","WP-Inv_ChicagoIL"),
                    "1016"=>array("WheelPros","WP1016","WP-Inv_OrlandoFL"),
                    "1018"=>array("WheelPros","WP1018","WP-Inv_MiamiFL"),
                    "1019"=>array("WheelPros","WP1019","WP-Inv_ClevelandOH"),
                    "1020"=>array("WheelPros","WP1020","WP-Inv_CincinattiOH"),
                    "1021"=>array("WheelPros","WP1021","WP-Inv_CharlotteNC"),
                    "1022"=>array("WheelPros","WP1022","WP-Inv_CranburyNJ"),
                    "1024"=>array("WheelPros","WP1024","WP-Inv_NashvilleTN"),
                    "1025"=>array("WheelPros","WP1025","WP-Inv_SaltLakeUT"),
                    "1026"=>array("WheelPros","WP1026","WP-Inv_ManchesterCT"),
                    "1028"=>array("WheelPros","WP1028","WP-Inv_MinneapolisMN"),
                    "1029"=>array("WheelPros","WP1029","WP-Inv_JacksonvilleFL"),
                    "1030"=>array("WheelPros","WP1030","WP-Inv_RichmondVA"),
                    "1031"=>array("WheelPros","WP1031","WP-Inv_CoronaCA"),
                    "1032"=>array("WheelPros","WP1032","WP-Inv_PortlandOR"),
                    "1033"=>array("WheelPros","WP1033","N/A"),
                    "1034"=>array("WheelPros","WP1034","WP-Inv_BaltimoreMD"),
                    "1035"=>array("WheelPros","WP1035","N/A"),
                    "1036"=>array("WheelPros","WP1036","WP-Inv_DetroitMI"),
                    "1037"=>array("WheelPros","WP1037","N/A"),
                    "1038"=>array("WheelPros","WP1038","N/A"),
                    "1039"=>array("WheelPros","WP1039","N/A"),
                    "1040"=>array("WheelPros","WP1040","N/A"),
                    "1041"=>array("WheelPros","WP1041","N/A"),
                    "1042"=>array("WheelPros","WP1042","WP-Inv_NewYorkNY"),
                    "1043"=>array("WheelPros","WP1043","WP-Inv_TampaFL"),
                    "1044"=>array("WheelPros","WP1044","N/A"),
                    "1045"=>array("WheelPros","WP1045","N/A"),
                    "1046"=>array("WheelPros","WP1046","N/A"),
                    "1047"=>array("WheelPros","WP1047","N/A"),
                    "1048"=>array("WheelPros","WP1048","N/A"),
                    "1049"=>array("WheelPros","WP1049","N/A"),
                    "1053"=>array("WheelPros","WP1053","WP-Inv_MfgBuenaParkCA"),
                    "1055"=>array("WheelPros","WP1055","N/A"),
                    "1056"=>array("WheelPros","WP1056","N/A"),
                    "1061"=>array("WheelPros","WP1061","N/A"),
                    "1070"=>array("WheelPros","WP1070","N/A"),
                    "1071"=>array("WheelPros","WP1071","N/A"),
                    "1072"=>array("WheelPros","WP1072","N/A"),
                    "1082"=>array("WheelPros","WP1082","WP-Inv_Midas-LA2MHTCA"),
                    "1084"=>array("WheelPros","WP1084","N/A"),
                    "1085"=>array("WheelPros","WP1085","WP-Inv_BuenaParkDistCA"),
                    "1086"=>array("WheelPros","WP1086","WP-Inv_DallasDistTX"),
                    "1402"=>array("WheelPros","WP1402","N/A"),
                    "1403"=>array("WheelPros","WP1403","N/A"),
                    "1404"=>array("WheelPros","WP1404","N/A"),
                    "1406"=>array("WheelPros","WP1406","N/A"),
                    "1409"=>array("WheelPros","WP1409","N/A"),
                    "1415"=>array("WheelPros","WP1415","N/A"),
                    "1421"=>array("WheelPros","WP1421","N/A"),
                    "1425"=>array("WheelPros","WP1425","N/A"),
                    "1428"=>array("WheelPros","WP1428","N/A"),
                    "1434"=>array("WheelPros","WP1434","N/A"),
                    "1436"=>array("WheelPros","WP1436","N/A"),

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
                "vftp0019"=>array("Turbo","TBCA","TB-Inv_IrwindaleCA"),
                "vftp0022"=>array("KMTires","KMHICK","KM-Inv_HickoryNC"),
                "vftp0023"=>array( 
                    "ATL" =>array("MHT","MHTATL","MHT-Inv_NORCROSSGA"),
                    "BAL39" =>array("MHT","MHTBAL39","MHT-Inv_BALTIMOREMD"),
                    "CHI" =>array("MHT","MHTCHI","MHT-Inv_ELKGROVEVILLAGEIL"),
                    "COL" =>array("MHT","MHTCOL","MHT-Inv_HILLIARDOH"),
                    "DAL" =>array("MHT","MHTDAL","MHT-Inv_SOUTHLAKETX"),
                    "DEN" =>array("MHT","MHTDEN","MHT-Inv_ENGLEWOODCO"),
                    "DET40" =>array("MHT","MHTDET40","MHT-Inv_STJOHNSMI"),
                    "FTL" =>array("MHT","MHTFTL","MHT-Inv_POMPANOBEACHFL"),
                    "GRN" =>array("MHT","MHTGRN","MHT-Inv_GREENSBORONC"),
                    "HOU" =>array("MHT","MHTHOU","MHT-Inv_HOUSTONTX"),
                    "KSC" =>array("MHT","MHTKSC","MHT-Inv_KANSASCITYMO"),
                    "LA" =>array("MHT","MHTLA","MHT-Inv_RANCHODOMINGUEZ"),
                    "LA2" =>array("MHT","MHTLA2","MHT-Inv_RANCHODOMINGUEZ2"),
                    "MSP38" =>array("MHT","MHTMSP38","MHT-Inv_MapleGroveMN"),
                    "NAS" =>array("MHT","MHTNAS","MHT-Inv_NASHVILLETN"),
                    "NJ" =>array("MHT","MHTNJ","MHT-Inv_NEWYORKNY"),
                    "NOCAL" =>array("MHT","MHTNOCAL","MHT-Inv_HAYWARDCA"),
                    "NOR" =>array("MHT","MHTNOR","MHT-Inv_KennerLA"),
                    "OK" =>array("MHT","MHTOK","MHT-Inv_OKLAHOMACITYOK"),
                    "ORL41" =>array("MHT","MHTORL41","MHT-Inv_ORLANDOFL"),
                    "PHX" =>array("MHT","MHTPHX","MHT-Inv_PHOENIXAZ"),
                    "POR37" =>array("MHT","MHTPOR37","MHT-Inv_PORTLANDOR"),
                    "SAN" =>array("MHT","MHTSAN","MHT-Inv_SANANTONIOTX"),
                    "SEA" =>array("MHT","MHTSEA","MHT-Inv_FIFEWA"),
                    "SLC" =>array("MHT","MHTSLC","MHT-Inv_SALTLAKECITYUT"),
                    "TMP" =>array("MHT","MHTTMP","MHT-Inv_TAMPAFL"),
                ),                
                "vftp0024"=>array( 
                    "3"=>array("TiresWarehouse","TW3","TiresWare-Inv_FresnoCA"),
                    "4"=>array("TiresWarehouse","TW4","TiresWare-Inv_UnionCityCA"),
                    "5"=>array("TiresWarehouse","TW5","TiresWare-Inv_RedlandsCA"),
                    "7"=>array("TiresWarehouse","TW7","TiresWare-Inv_SantaFeSpringsCA"),
                    "8"=>array("TiresWarehouse","TW8","TiresWare-Inv_SylmarCA"),
                    "11"=>array("TiresWarehouse","TW11","TiresWare-Inv_SanDiegoCA"),
                    "12"=>array("TiresWarehouse","TW12","TiresWare-Inv_PhoenixAZ"),
                    "21"=>array("TiresWarehouse","TW21","TiresWare-Inv_LasVegasNV")
                ),
                "vftp0027"=>array("KWTire","KWT1","KWT-Inv_LancasterPA"),
                "vftp0028"=>array( 
                    "F92"=>array("TreadMaxx","TMF92","TM-Inv_TampaFL"),
                    "g90"=>array("TreadMaxx","TMG90","TM-Inv_EllenwoodGA"),
                    "G91"=>array("TreadMaxx","TMG91","TM-Inv_MaconGA"),
                    "G92"=>array("TreadMaxx","TMG92","TM-Inv_AugustaSC"),
                    "O91"=>array("TreadMaxx","TMO91","TM-Inv_SharonvilleOH"),
                    "W90"=>array("TreadMaxx","TMW90","TM-Inv_LockbourneOH "),
                    "W91"=>array("TreadMaxx","TMW91","TM-Inv_AlabasterAL"),
                    "W92"=>array("TreadMaxx","TMW92","TM-Inv_SolonOH"),
                    "W93"=>array("TreadMaxx","TMW93","TM-Inv_CharlotteNC"),
                    "W94"=>array("TreadMaxx","TMW94","TM-Inv_MidwayFL"),
                    "W95"=>array("TreadMaxx","TMW95","TM-Inv_HoustonTX "),
                    "W96"=>array("TreadMaxx","TMW96","TM-Inv_DesotoTX"),
                    "W97"=>array("TreadMaxx","TMW97","TM-Inv_JacksonvilleFL"),
                    "W98"=>array("TreadMaxx","TMW98","TM-Inv_OrlandoFL"),
                ),                
                "vftp0029"=>array( 
                    "Birmingham" => array("SSTire","SST8","SST-Inv_BirminghamAL"),
                    "Columbia" => array("SSTire","SST9","SST-Inv_ColumbiaSC"),
                    "Fairfield" => array("SSTire","SST13","ST-Inv_CincinnatiOH"),
                    "Galax" => array("SSTire","SST4","SST-Inv_GalaxVA"),
                    "Huntington" => array("SSTire","SST2","SST-Inv_HuntingtonWV"),
                    "Lexington" => array("SSTire","SST1","SST-Inv_LexingtonKY"),
                    "Louisville" => array("SSTire","SST10","ST-Inv_LouisvilleKY"),
                    "Memphis" => array("SSTire","SST5","SST-Inv_MemphisTN"),
                    "Nashville" => array("SSTire","SST3","SST-Inv_NashvilleTN"),
                    "Shreveport" => array("SSTire","SST12","ST-Inv_ShreveportLA"),
                    "Springdale" => array("SSTire","SST11","ST-Inv_SpringdaleAR"),
                    "Tulsa" => array("SSTire","N/A","N/A"),
                ),

                "vftp0030"=>array( 
                    "8"   => array("ATD","ATD8","ATD-Inv_NashvilleTN"),
                    "12"  => array("ATD","ATD12","ATD-Inv_AshevilleNC"),
                    "13"  => array("ATD","ATD13","ATD-Inv_KnoxvilleTN"),
                    "15"  => array("ATD","ATD15","ATD-Inv_FayettevilleNC"),
                    "16"  => array("ATD","ATD16","ATD-Inv_RaleighNC"),
                    "17"  => array("ATD","ATD17","ATD-Inv_RichmondVA"),
                    "18"  => array("ATD","ATD18","ATD-Inv_AugustaGA"),
                    "40"  => array("ATD","ATD40","ATD-Inv_ColumbiaSC"),
                    "047"  => array("ATD","ATD47","ATD-Inv_ChattanoogaTN"),
                    "51"  => array("ATD","ATD51","ATD-Inv_TuckerGA"),
                    "52"  => array("ATD","ATD52","ATD-Inv_AtlantaSouthGA"),
                    "53"  => array("ATD","ATD53","ATD-Inv_PensacolaFL"),
                    "54"  => array("ATD","ATD54","ATD-Inv_JacksonMS"),
                    "55"  => array("ATD","ATD55","ATD-Inv_TexarkanaAR"),
                    "56"  => array("ATD","ATD56","ATD-Inv_MemphisTN"),
                    "58"  => array("ATD","ATD58","ATD-Inv_TallahasseeFL"),
                    "59"  => array("ATD","ATD59","ATD-Inv_NLittleRockAR"),
                    "60"  => array("ATD","ATD60","ATD-Inv_MauldinSC"),
                    "62"  => array("ATD","ATD62","ATD-Inv_LouisvilleKY"),
                    "70"  => array("ATD","ATD70","ATD-Inv_CharlotteNC"),
                    "75"  => array("ATD","ATD75","ATD-Inv_RoanokeVA"),
                    "80"  => array("ATD","ATD80","ATD-Inv_BurlingtonNC"),
                    "85"  => array("ATD","ATD85","ATD-Inv_RuralHallNC"),
                    "90"  => array("ATD","ATD90","ATD-Inv_NorfolkVA"),
                    "95"  => array("ATD","ATD95","ATD-Inv_OrlandoFL"),
                    "101"  => array("ATD","ATD101","ATD-Inv_WilsonNC"),
                    "105"  => array("ATD","ATD105","ATD-Inv_WilmingtonNC"),
                    "107"  => array("ATD","ATD107","ATD-Inv_ManassasVA"),
                    "110"  => array("ATD","ATD110","ATD-Inv_SalisburyMD"),
                    "111"  => array("ATD","ATD111","ATD-Inv_MiamiFL"),
                    "112"  => array("ATD","ATD112","ATD-Inv_WestPalmBeachFL"),
                    "113"  => array("ATD","ATD113","ATD-Inv_JacksonvilleFL"),
                    "114"  => array("ATD","ATD114","ATD-Inv_FtMyersFL"),
                    "115"  => array("ATD","ATD115","ATD-Inv_HarrisonburgVA"),
                    "117"  => array("ATD","ATD117","ATD-Inv_TampaFL"),
                    "121"  => array("ATD","ATD121","ATD-Inv_KennesawGA"),
                    "123"  => array("ATD","ATD123","ATD-Inv_SavannahGA"),
                    "124"  => array("ATD","ATD124","ATD-Inv_ByronGA"),
                    "130"  => array("ATD","ATD130","ATD-Inv_CharlestonSC"),
                    "132"  => array("ATD","ATD132","ATD-Inv_JohnsonCityTN"),
                    "140"  => array("ATD","ATD140","ATD-Inv_HuntsvilleAL"),
                    "141"  => array("ATD","ATD141","ATD-Inv_MontgomeryAL"),
                    "170"  => array("ATD","ATD170","ATD-Inv_CincinnatiOH"),
                    "180"  => array("ATD","ATD180","ATD-Inv_IndianapolisIN"),
                    "204"  => array("ATD","ATD204","ATD-Inv_NorthBaltimoreMD"),
                    "212"  => array("ATD","ATD212","ATD-Inv_PittsburghPA"),
                    "215"  => array("ATD","ATD215","ATD-Inv_RochesterNY"),
                    "219"  => array("ATD","ATD219","ATD-Inv_PocaWV"),
                    "225"  => array("ATD","ATD225","ATD-Inv_CantonNCTOH"),
                    "240"  => array("ATD","ATD240","ATD-Inv_ColumbusOH"),
                    "250"  => array("ATD","ATD250","ATD-Inv_PhiladelphiaNJ"),
                    "252"  => array("ATD","ATD252","ATD-Inv_MalvernPA"),
                    "260"  => array("ATD","ATD260","ATD-Inv_TotowaNJ"),
                    "270"  => array("ATD","ATD270","ATD-Inv_LongIslandNY"),
                    "275"  => array("ATD","ATD275","ATD-Inv_AlbanyNY"),
                    "280"  => array("ATD","ATD280","ATD-Inv_TauntonMA"),
                    "285"  => array("ATD","ATD285","ATD-Inv_ManchesterNH"),
                    "288"  => array("ATD","ATD288","ATD-Inv_MaineME"),
                    "290"  => array("ATD","ATD290","ATD-Inv_HartfordCT"),
                    "300"  => array("ATD","ATD300","ATD-Inv_SanJoseCA"),
                    "302"  => array("ATD","ATD302","ATD-Inv_SacramentoCA"),
                    "303"  => array("ATD","ATD303","ATD-Inv_FresnoCA"),
                    "304"  => array("ATD","ATD304","ATD-Inv_MoorparkCA"),
                    "306"  => array("ATD","ATD306","ATD-Inv_SantaFeSpringsCA"),
                    "307"  => array("ATD","ATD307","ATD-Inv_RanchoCucCA"),
                    "308"  => array("ATD","ATD308","ATD-Inv_PhoenixAZ"),
                    "309"  => array("ATD","ATD309","ATD-Inv_ChulaVistaCA"),
                    "310"  => array("ATD","ATD310","ATD-Inv_RenoNV"),
                    "312"  => array("ATD","ATD312","ATD-Inv_NorthBayCA"),
                    "314"  => array("ATD","ATD314","ATD-Inv_BakersfieldCA"),
                    "315"  => array("ATD","ATD315","ATD-Inv_TucsonAZ"),
                    "318"  => array("ATD","ATD318","ATD-Inv_ComptonCA"),
                    "320"  => array("ATD","ATD320","ATD-Inv_LasVegasNV"),
                    "345"  => array("ATD","ATD345","ATD-Inv_MedfordOR"),
                    "501"  => array("ATD","ATD501","ATD-Inv_LincolnNE"),
                    "502"  => array("ATD","ATD502","ATD-Inv_SiouxFallsSD"),
                    "507"  => array("ATD","ATD507","ATD-Inv_DesMoinesIA"),
                    "510"  => array("ATD","ATD510","ATD-Inv_MinneapolisMN"),
                    "515"  => array("ATD","ATD515","ATD-Inv_MilwaukeeWI"),
                    "522"  => array("ATD","ATD522","ATD-Inv_FargoND"),
                    "530"  => array("ATD","ATD530","ATD-Inv_DenverCO"),
                    "535"  => array("ATD","ATD535","ATD-Inv_GrandJunctionCO"),
                    "538"  => array("ATD","ATD538","ATD-Inv_ColoradoSpringsCO"),
                    "540"  => array("ATD","ATD540","ATD-Inv_DetroitMI"),
                    "548"  => array("ATD","ATD548","ATD-Inv_PeoriaIL"),
                    "550"  => array("ATD","ATD550","ATD-Inv_ChicagoIL"),
                    "563"  => array("ATD","ATD563","ATD-Inv_SpringfieldMO"),
                    "570"  => array("ATD","ATD570","ATD-Inv_KansasCityMO"),
                    "585"  => array("ATD","ATD585","ATD-Inv_WichitaKS"),
                    "601"  => array("ATD","ATD601","ATD-Inv_LubbockTX"),
                    "602"  => array("ATD","ATD602","ATD-Inv_McAllenTX"),
                    "603"  => array("ATD","ATD603","ATD-Inv_AmarilloTX"),
                    "604"  => array("ATD","ATD604","ATD-Inv_SanAngeloTX"),
                    "605"  => array("ATD","ATD605","ATD-Inv_DallasTX"),
                    "610"  => array("ATD","ATD610","ATD-Inv_SanAntonioTX"),
                    "615"  => array("ATD","ATD615","ATD-Inv_ElPasoTX"),
                    "618"  => array("ATD","ATD618","ATD-Inv_FtWorthTX"),
                    "635"  => array("ATD","ATD635","ATD-Inv_StLouisMO"),
                    "640"  => array("ATD","ATD640","ATD-Inv_AlbuquerqueNM"),
                    "645"  => array("ATD","ATD645","ATD-Inv_BirminghamAL"),
                    "650"  => array("ATD","ATD650","ATD-Inv_OklahomaCityOK"),
                    "655"  => array("ATD","ATD655","ATD-Inv_TulsaOK"),
                    "658"  => array("ATD","ATD658","ATD-Inv_BeaumontTX"),
                    "660"  => array("ATD","ATD660","ATD-Inv_HoustonTX"),
                    "665"  => array("ATD","ATD665","ATD-Inv_HoustonSouthTX"),
                    "670"  => array("ATD","ATD670","ATD-Inv_CorpusChristiTX"),
                    "675"  => array("ATD","ATD675","ATD-Inv_AustinTX"),
                    "680"  => array("ATD","ATD680","ATD-Inv_BatonRougeLA"),
                    "682"  => array("ATD","ATD682","ATD-Inv_SlidellLA"),
                    "710"  => array("ATD","ATD710","ATD-Inv_ATDWheelsEastNC"),
                    "711"  => array("ATD","ATD711","ATD-Inv_ATDWheelsWestCA"),
                    "810"  => array("ATD","ATD810","ATD-Inv_SaltLakeCityUT"),
                    "820"  => array("ATD","ATD820","ATD-Inv_CasperWY"),
                    "830"  => array("ATD","ATD830","ATD-Inv_BoiseID"),
                    "840"  => array("ATD","ATD840","ATD-Inv_SeattleWA"),
                    "845"  => array("ATD","ATD845","ATD-Inv_SpokaneWA"),
                    "850"  => array("ATD","ATD850","ATD-Inv_PortlandOR"),
                    "931"  => array("ATD","N/A","N/A"),
                    "971"  => array("ATD","N/A","N/A"),
                    "974"  => array("ATD","ATD974","ATD-Inv_AllianceTX"),
                    "976"  => array("ATD","N/A","N/A"),
                ),

                "vftp0031"=>array(
                    "ALBANYNY" => array("TireHub","142ALBANYNY","TIREHUB-Inv_142ALBANYNY"),
                    "ALBUQUERQUENM" => array("TireHub","136ALBUQUERQUENM","TIREHUB-Inv_136ALBUQUERQUENM"),
                    "ALLENTOWNPA" => array("TireHub","145ALLENTOWNPA","TIREHUB-Inv_145ALLENTOWNPA"),
                    "ATLANTAGA" => array("TireHub","106ATLANTAGA","TIREHUB-Inv_106ATLANTAGA"),
                    "AUSTINTX" => array("TireHub","202AUSTINTX","TIREHUB-Inv_202AUSTINTX"),
                    "BALTIMOREMD" => array("TireHub","101BALTIMOREMD","TIREHUB-Inv_101BALTIMOREMD"),
                    "BATONROUGELA" => array("TireHub","201BATONROUGELA","TIREHUB-Inv_201BATONROUGELA"),
                    "BENICIACA" => array("TireHub","168BENICIACA","TIREHUB-Inv_168BENICIACA"),
                    "BIRMINGHAMAL" => array("TireHub","151BIRMINGHAMAL","TIREHUB-Inv_151BIRMINGHAMAL"),
                    "BOSTONMA" => array("TireHub","143BOSTONMA","TIREHUB-Inv_143BOSTONMA"),
                    "BUFFALONY" => array("TireHub","146BUFFALONY","TIREHUB-Inv_146BUFFALONY"),
                    "CHARLOTTENC" => array("TireHub","112CHARLOTTENC","TIREHUB-Inv_112CHARLOTTENC"),
                    "CHATANOOGAGA" => array("TireHub","138CHATANOOGAGA","TIREHUB-Inv_138CHATANOOGAGA"),
                    "CHICAGOIL" => array("TireHub","126CHICAGOIL","TIREHUB-Inv_126CHICAGOIL"),
                    "CINCINNATIOH" => array("TireHub","140CINCINNATIOH","TIREHUB-Inv_140CINCINNATIOH"),
                    "CLEVELANDOH" => array("TireHub","116CLEVELANDOH","TIREHUB-Inv_116CLEVELANDOH"),
                    "COLUMBUSOH" => array("TireHub","123COLUMBUSOH","TIREHUB-Inv_123COLUMBUSOH"),
                    "DALLASTX" => array("TireHub","110DALLASTX","TIREHUB-Inv_110DALLASTX"),
                    "DENVERCO" => array("TireHub","120DENVERCO","TIREHUB-Inv_120DENVERCO"),
                    "DETROITMI" => array("TireHub","121DETROITMI","TIREHUB-Inv_121DETROITMI"),
                    "FONTANACA" => array("TireHub","131FONTANACA","TIREHUB-Inv_131FONTANACA"),
                    "FRESNOCA" => array("TireHub","160FRESNOCA","TIREHUB-Inv_160FRESNOCA"),
                    "FTLAUDERDALEFL" => array("TireHub","105FTLAUDERDALEFL","TIREHUB-Inv_105FTLAUDERDALEFL"),
                    "FTMYERSFL" => array("TireHub","206FTMYERSFL","TIREHUB-Inv_206FTMYERSFL"),
                    "GREENSBORONC" => array("TireHub","149GREENSBORONC","TIREHUB-Inv_149GREENSBORONC"),
                    "HARTFORDCT" => array("TireHub","115HARTFORDCT","TIREHUB-Inv_115HARTFORDCT"),
                    "HAWAIIHI" => array("TireHub","166HAWAIIHI","TIREHUB-Inv_166HAWAIIHI"),
                    "HOUSTONTX" => array("TireHub","113HOUSTONTX","TIREHUB-Inv_113HOUSTONTX"),
                    "INDIANAPOLISIN" => array("TireHub","141INDIANAPOLISIN","TIREHUB-Inv_141INDIANAPOLISIN"),
                    "JACKSONMS" => array("TireHub","124JACKSONMS","TIREHUB-Inv_124JACKSONMS"),
                    "JACKSONVILLEFL" => array("TireHub","104JACKSONVILLEFL","TIREHUB-Inv_104JACKSONVILLEFL"),
                    "KANSASCITYMO" => array("TireHub","109KANSASCITYMO","TIREHUB-Inv_109KANSASCITYMO"),
                    "KNOXVILLETN" => array("TireHub","204KNOXVILLETN","TIREHUB-Inv_204KNOXVILLETN"),
                    "LASVEGASNV" => array("TireHub","159LASVEGASNV","TIREHUB-Inv_159LASVEGASNV"),
                    "LONGISLANDNY" => array("TireHub","135LONGISLANDNY","TIREHUB-Inv_135LONGISLANDNY"),
                    "LOSANGELESCA" => array("TireHub","163LOSANGELESCA","TIREHUB-Inv_163LOSANGELESCA"),
                    "LOUISVILLEKY" => array("TireHub","108LOUISVILLEKY","TIREHUB-Inv_108LOUISVILLEKY"),
                    "MANASSASVA" => array("TireHub","132MANASSASVA","TIREHUB-Inv_132MANASSASVA"),
                    "MEMPHISTN" => array("TireHub","139MEMPHISTN","TIREHUB-Inv_139MEMPHISTN"),
                    "MIAMIFL" => array("TireHub","152MIAMIFL","TIREHUB-Inv_152MIAMIFL"),
                    "MOBILEAL" => array("TireHub","157MOBILEAL","TIREHUB-Inv_157MOBILEAL"),
                    "NASHVILLETN" => array("TireHub","117NASHVILLETN","TIREHUB-Inv_117NASHVILLETN"),
                    "NEWORLEANSLA" => array("TireHub","154NEWORLEANSLA","TIREHUB-Inv_154NEWORLEANSLA"),
                    "NORTHJERSEYNJ" => array("TireHub","118NORTHJERSEYNJ","TIREHUB-Inv_118NORTHJERSEYNJ"),
                    "OAKLANDCA" => array("TireHub","129OAKLANDCA","TIREHUB-Inv_129OAKLANDCA"),
                    "OKCOK" => array("TireHub","111OKCOK","TIREHUB-Inv_111OKCOK"),
                    "OMAHANE" => array("TireHub","125OMAHANE","TIREHUB-Inv_125OMAHANE"),
                    "ORLANDOFL" => array("TireHub","107ORLANDOFL","TIREHUB-Inv_107ORLANDOFL"),
                    "PHILADELPHIANJ" => array("TireHub","102PHILADELPHIANJ","TIREHUB-Inv_102PHILADELPHIANJ"),
                    "PHOENIXAZ" => array("TireHub","128PHOENIXAZ","TIREHUB-Inv_128PHOENIXAZ"),
                    "PITTSBURGHPA" => array("TireHub","127PITTSBURGHPA","TIREHUB-Inv_127PITTSBURGHPA"),
                    "PORTLANDOR" => array("TireHub","134PORTLANDOR","TIREHUB-Inv_134PORTLANDOR"),
                    "RALEIGHNC" => array("TireHub","100RALEIGHNC","TIREHUB-Inv_100RALEIGHNC"),
                    "RICHMONDVA" => array("TireHub","122RICHMONDVA","TIREHUB-Inv_122RICHMONDVA"),
                    "ROCHESTERNY" => array("TireHub","133ROCHESTERNY","TIREHUB-Inv_133ROCHESTERNY"),
                    "SACRAMENTOCA" => array("TireHub","165SACRAMENTOCA","TIREHUB-Inv_165SACRAMENTOCA"),
                    "SALTLAKECITYUT" => array("TireHub","119SALTLAKECITYUT","TIREHUB-Inv_119SALTLAKECITYUT"),
                    "SANANTONIOTX" => array("TireHub","114SANANTONIOTX","TIREHUB-Inv_114SANANTONIOTX"),
                    "SANDIEGOCA" => array("TireHub","200SANDIEGOCA","TIREHUB-Inv_200SANDIEGOCA"),
                    "SANJOSECA" => array("TireHub","164SANJOSECA","TIREHUB-Inv_164SANJOSECA"),
                    "SANTAANACA" => array("TireHub","162SANTAANACA","TIREHUB-Inv_162SANTAANACA"),
                    "SEATTLEWA" => array("TireHub","167SEATTLEWA","TIREHUB-Inv_167SEATTLEWA"),
                    "SIMIVALLEYCA" => array("TireHub","130SIMIVALLEYCA","TIREHUB-Inv_130SIMIVALLEYCA"),
                    "SYRACUSENY" => array("TireHub","147SYRACUSENY","TIREHUB-Inv_147SYRACUSENY"),
                    "TAMPAFL" => array("TireHub","103TAMPAFL","TIREHUB-Inv_103TAMPAFL"),
                ),

                "vftp0032"=>array(
                    "3001"=>array("TBC","TBC3001","TBC-Inv_AlbanyGA"),
                    "3008"=>array("TBC","TBC3008","TBC-Inv_FlorenceSC"),
                    "3009"=>array("TBC","TBC3009","TBC-Inv_GainesvilleGA"),
                    "3010"=>array("TBC","TBC3010","TBC-Inv_GreerSC"),
                    "3011"=>array("TBC","TBC3011","TBC-Inv_GrovetownGA"),
                    "3013"=>array("TBC","TBC3013","TBC-Inv_JacksonvilleFL"),
                    "3015"=>array("TBC","TBC3015","TBC-Inv_MaconGA"),
                    "3017"=>array("TBC","TBC3017","TBC-Inv_OrlandoFL"),
                    "3019"=>array("TBC","TBC3019","TBC-Inv_PoolerGA"),
                    "3021"=>array("TBC","TBC3021","TBC-Inv_WestPalmBeachFL"),
                    "3023"=>array("TBC","TBC3023","TBC-Inv_TampaFL"),
                    "3029"=>array("TBC","TBC3029","TBC-Inv_LehighAcresFL"),
                    "3032"=>array("TBC","TBC3032","TBC-Inv_LongviewTX"),
                    "3035"=>array("TBC","TBC3035","TBC-Inv_AuburnME"),
                    "3037"=>array("TBC","TBC3037","TBC-Inv_OcoeeTN"),
                    "3038"=>array("TBC","TBC3038","TBC-Inv_KnoxvilleTN"),
                    "3040"=>array("TBC","TBC3040","TBC-Inv_RochesterNY"),
                    "3041"=>array("TBC","TBC3041","TBC-Inv_AlbanyNY"),
                    "3042"=>array("TBC","TBC3042","TBC-Inv_GoodlettsvilleTN"),
                    "3044"=>array("TBC","TBC3044","TBC-Inv_WichitaKS"),
                    "3046"=>array("TBC","TBC3046","TBC-Inv_SantaFeSpringsCA"),
                    "3050"=>array("TBC","TBC3050","TBC-Inv_GlendaleHeightsIL"),
                    "3058"=>array("TBC","TBC3058","TBC-Inv_LockbourneOH"),
                    "3060"=>array("TBC","TBC3060","TBC-Inv_BeniciaCA"),
                    "3061"=>array("TBC","TBC3061","TBC-Inv_ColumbiaMO"),
                    "3064"=>array("TBC","TBC3064","TBC-Inv_RedlandsCA"),
                    "3065"=>array("TBC","TBC3065","TBC-Inv_FresnoCA"),
                    "3066"=>array("TBC","TBC3066","TBC-Inv_TollesonAZ"),
                    "3069"=>array("TBC","TBC3069","TBC-Inv_WestSacramentoCA"),
                    "3071"=>array("TBC","TBC3071","TBC-Inv_StowOH"),
                    "3072"=>array("TBC","TBC3072","TBC-Inv_BedfordParkIL"),
                    "3111"=>array("TBC","TBC3111","TBC-Inv_OmahaNE"),
                    "3121"=>array("TBC","TBC3121","TBC-Inv_WyomingMI"),
                    "3122"=>array("TBC","TBC3122","TBC-Inv_KnoxvilleTN2"),
                    "3124"=>array("TBC","TBC3124","TBC-Inv_MaumeOH"),
                    "3133"=>array("TBC","TBC3133","TBC-Inv_MariettaGA"),
                    "3134"=>array("TBC","TBC3134","TBC-Inv_NCharlestonSC"),
                    "3140"=>array("TBC","TBC3140","TBC-Inv_WillistonVT"),
                    "3144"=>array("TBC","TBC3144","TBC-Inv_LibertyvilleIL"),
                    "3146"=>array("TBC","TBC3146","TBC-Inv_AlbuquerqueNM"),
                    "3149"=>array("TBC","TBC3149","TBC-Inv_MidwayFL"),
                    "3153"=>array("TBC","TBC3153","TBC-Inv_OFallonMO"),
                    "3154"=>array("TBC","TBC3154","TBC-Inv_AvenelNJ"),
                    "3155"=>array("TBC","TBC3155","TBC-Inv_HicksvilleNY"),
                    "3159"=>array("TBC","TBC3159","TBC-Inv_SpringfieldMO"),
                    "3163"=>array("TBC","TBC3163","TBC-Inv_ChatsworthCA"),
                    "3165"=>array("TBC","TBC3165","TBC-Inv_NewBerlinWI"),
                    "3179"=>array("TBC","TBC3179","TBC-Inv_KansasCityKS"),
                    "3180"=>array("TBC","TBC3180","TBC-Inv_RogersMN"),
                    "3185"=>array("TBC","TBC3185","TBC-Inv_ConwaySC"),
                    "3187"=>array("TBC","TBC3187","TBC-Inv_ColumbiaSC"),
                    "3192"=>array("TBC","TBC3192","TBC-Inv_LubbockTX"),
                    "3194"=>array("TBC","TBC3194","TBC-Inv_SunnyvaleCA"),
                    "3201"=>array("TBC","TBC3201","TBC-Inv_AnchorageAK"),
                    "3203"=>array("TBC","TBC3203","TBC-Inv_ColoradoSpringsCO"),
                    "3205"=>array("TBC","TBC3205","TBC-Inv_MesquiteTX"),
                    "3209"=>array("TBC","TBC3209","TBC-Inv_DenverCO"),
                    "3214"=>array("TBC","TBC3214","TBC-Inv_WestValleyCityUT"),
                    "3216"=>array("TBC","TBC3216","TBC-Inv_TucsonAZ"),
                    "3223"=>array("TBC","TBC3223","TBC-Inv_LexingtonKY"),
                    "3228"=>array("TBC","TBC3228","TBC-Inv_BellevilleMI"),
                    "3231"=>array("TBC","TBC3231","TBC-Inv_BrooksKY"),
                    "3236"=>array("TBC","TBC3236","TBC-Inv_NormalIL"),
                    "3240"=>array("TBC","TBC3240","TBC-Inv_BurienWA"),
                    "3242"=>array("TBC","TBC3242","TBC-Inv_ForestParkGA"),
                    "3243"=>array("TBC","TBC3243","TBC-Inv_NorcrossGA"),
                    "3244"=>array("TBC","TBC3244","TBC-Inv_StaffordTX"),
                    "3253"=>array("TBC","TBC3253","TBC-Inv_WestChesterOH"),
                    "3269"=>array("TBC","TBC3269","TBC-Inv_MiamiFL"),
                    "3281"=>array("TBC","TBC3281","TBC-Inv_OklahomaCityOK"),
                    "3282"=>array("TBC","TBC3282","TBC-Inv_PortlandOR"),
                    "3283"=>array("TBC","TBC3283","TBC-Inv_SpokaneWA"),
                    "3286"=>array("TBC","TBC3286","TBC-Inv_MemphisTN"),
                    "3289"=>array("TBC","TBC3289","TBC-Inv_PflugervilleTX"),
                ),

                "vftp0033"=>array(
                    "AL" =>array("VisionWheels","VWAL","VW-Inv_DecaturAL"),
                    "CA" =>array("VisionWheels","VWCA","VW-Inv_CoronaCA"),
                    "IN" =>array("VisionWheels","VWIN","VW-Inv_PortageIN"),
                    "TX" =>array("VisionWheels","VWTX","VW-Inv_CoppellTX"),
                    "NC" =>array("VisionWheels","VWNC","VW-Inv_CharlotteNC"),
                    "ON" =>array("VisionWheels","VWON","VW-Inv_OntarioCA"),
                    "US" =>array("VisionWheels","N/A","N/A"),
                    "CAD" =>array("VisionWheels","N/A","N/A"),
                ),        
     
                "vftp0036"=>array("Asanti","ASCA","AS-Inv_FullertonCA"),
                "vftp0037"=>array("DWG","DWCA","DWG-Inv_BaldwinParkCA"),
                "vftp0038"=>array("Giovanna","GOCA","GIO-Inv_SantaFeSpringsCA"),   
                "vftp0040"=>array("Lexani","LXCA","LX-Inv_PalmDesertCA"),
                "vftp0042"=>array("BSI","BSCA","BSI-Inv_SantaFeSpringsCA"),        

                "vftp0043"=>array(
                    "CA" => array("MKW","MKCA","MKW-Inv_CityofIndustryCA"),
                    "FL" => array("MKW","MKFL","MKW-Inv_TampaFL"),
                    "TX" => array("MKW","MKTX","MKW-Inv_SanAntonioTX"),
                    "NJ" => array("MKW","MKNJ","MKW-Inv_PatersonNJ"),
                ),
                "vftp0044"=>array("NS-Tuner","NSCA","NS-Inv_ElMonteCA"),  
                "vftp0045"=>array("Pinnacle","PCCA","PIN-Inv_LaPuenteCA"), 
                "vftp0046"=>array(      
                    "CA" => array("Prestige","PSCA","PS-Inv_ChinoCA"),
                    "TX" => array("Prestige","PSTX","PS-Inv_ArlingtonTX"), 
                ), 
                "vftp0047"=>array("Raceline","RCCA","RC-Inv_GardenGroveCA"),  
                "vftp0048"=>array("Rohana","RHIL","RH-Inv_ChicagoIL"),  
        
                "vftp0049"=>array(
                    "ONTARIO, CA" => array("Strada","STCA","ST-Inv_OntarioCA"),
                    "ORLANDO, FL" => array("Strada","STFL","ST-Inv_OrlandoFL"), 
                ),
                "vftp0050"=>array("TradeUnion","TUCA","TU-Inv_MontclairCA"),  
                "vftp0051"=>array("Ultra","UTCA","UT-Inv_FullertonCA"),  
                "vftp0052"=>array("VMR","VMCA","VMR-Inv_AnaheimCA"),  
                "vftp0053"=>array("XIX","XICA","XIX-Inv_ElMonteCA"),  
             
                "vftp0054"=>array(
                    "CA" => array("Varro","VRCA","VR-Inv_RanchoCA"),
                    "FL" => array("Varro","VRFL","VR-Inv_TampaFL"), 
                ),
                "vftp0055"=>array("Azad","AZCA","AZ-Inv_IrwindaleCA"),  

            

       

        );
    
        $allFiles =array();

        $db_ext ='';//\DB::connection('sqlsrv'); // SAP Server Connection
        

        $allFiles = $this->recursiveScan(public_path('/storage/vftp/'.$folderKey),$this->storeArr);

        // dd($allFiles,$folderKey);

        if(in_array($folderKey, ["vftp0013","vftp0017","vftp0027","vftp0028","vftp0030","vftp0032","vftp0046","vftp0049","vftp0050","vftp0054","vftp0055"])){
            \Log::info('File NAME =>'.end($allFiles));
            $allFiles = array(end($allFiles));
        }


        // dd($allFiles);


        foreach ($allFiles as $index => $selectedFile) { 

            \Log::info("File NAME ".$selectedFile);
            // dd($selectedFile);

            $filepathArray = explode('/', $selectedFile);
            $selectedFileName = end($filepathArray); 

            // if(in_array($folderKey, ["vftp0013","vftp0017","vftp0027","vftp0028","vftp0030","vftp0032"])){

            //     $isMigrate = InventoryMigration::where('foldername',$folderKey)->where('filename',$selectedFileName)->first(); 
            // }else{
            //     $isMigrate = false;
            // }  

            // if(!$isMigrate){


                $fields = $fieldsArray[$folderKey]; 

                // Open and Read individual CSV file
                if (($inpfile = fopen($selectedFile, 'r')) !== false) {
                    // Collect CSV each row records
                    $flag = 0; 

                    if(strpos($selectedFileName, ".CSV") !== false || strpos($selectedFileName, ".csv") !== false){

                        while (($data = fgetcsv($inpfile, 10000)) !== false) {
                            // dd($data);
                            if($flag != 0){

                                if($folderKey == "vftp0030"){
                                    $dataValue = explode('|', $data[0]);
                                }else{
                                    $dataValue =  $data;
                                }  
                                $insertData = array(

                                    // 'filename'=>$folderKey,

                                     'partno'=>($fields['partno']!=null)?$dataValue[$fields['partno']]:null,                         //PartNo

                                     'vendor_partno'=>($fields['vendor_partno']!=null)?$dataValue[$fields['vendor_partno']]:null,        //VendorPartNo

                                     'mpn'=>($fields['mpn']!=null)?$dataValue[$fields['mpn']]:null,                 //MPN

                                     'description'=>($fields['description']!=null)?$dataValue[$fields['description']]:null,         //Description

                                     'brand'=>($fields['brand']!=null)?$dataValue[$fields['brand']]:null,               //Brand

                                     'model'=>($fields['model']!=null)?$dataValue[$fields['model']]:null,               //Model

                                     'location_code'=>($fields['location_code']!=null)?trim($dataValue[$fields['location_code']]," "):null,       //Location Code

                                     'price'=>($fields['price']!=null)?$dataValue[$fields['price']]:0,               //Price
                                );  

                                if($insertData['partno'] == '' || $insertData['partno'] == null ){
                                    continue;
                                }

                                // $insertData['price'] = $this->clean($insertData['price']);

                                if(gettype($fields['available_qty']) != 'array'){

                                        $insertData['available_qty']=($fields['available_qty']!=null)?$dataValue[$fields['available_qty']]:0; 


                                } 
                                    // dd($insertData);

                                if($folderKey == "vftp0010" || $folderKey == "vftp0015"  || $folderKey == "vftp0023" || $folderKey == "vftp0030" || $folderKey == "vftp0032" ){


                                    $insertData['drop_shipper']=$vendor_info[$folderKey][$insertData['location_code']][0];
                                    $insertData['ds_vendor_code']=$vendor_info[$folderKey][$insertData['location_code']][1];
                                    $insertData['location_name']=$vendor_info[$folderKey][$insertData['location_code']][2];
                                    // dd($insertData);
                                    $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);

                                }elseif($folderKey == "vftp0011" || $folderKey == "vftp0016" || $folderKey == "vftp0017" ||  $folderKey == "vftp0018" ||   $folderKey == "vftp0031" || $folderKey == "vftp0033" ||   $folderKey == "vftp0043" ||   $folderKey == "vftp0049" || $folderKey == "vftp0054"  ){ 
                                    $insertDataArray=[];

                                    foreach ($vendor_info[$folderKey] as $key => $vendor) { 
                                        $insertData['available_qty']=$dataValue[$fieldsArray[$folderKey]['available_qty'][$key]]; 
                                        $insertData['location_code']=$key; 

                                        $insertData['drop_shipper']=$vendor[0];
                                        $insertData['ds_vendor_code']=$vendor[1];
                                        $insertData['location_name']=$vendor[2]; 
                                        $insertDataArray[]=$insertData;

                                    }
                                    
                                    // dd($insertDataArray);

                                    $this->inventoryFeedUpdate($currentFolder,$insertDataArray,$db_ext);

                                }elseif($folderKey == "vftp0012" || $folderKey == "vftp0029"  ){

                                        $fullfile = explode('/', $selectedFile);
                                        $filename = explode(".",end($fullfile));
                                        $locName = $filename[0];

                                        if($folderKey == "vftp0029"){
                                            $filenameArray = explode('_',$locName);
                                            $locName = $filenameArray[2];
                                        }

                                        $insertData['location_code']=$locName;
                                        $insertData['drop_shipper']=$vendor_info[$folderKey][$locName][0];
                                        $insertData['ds_vendor_code']=$vendor_info[$folderKey][$locName][1];
                                        $insertData['location_name']=$vendor_info[$folderKey][$locName][2]; 

                                    $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);                                    

                                }elseif($folderKey == "vftp0013" || $folderKey == "vftp0014" || $folderKey == "vftp0019" || $folderKey == "vftp0027" || $folderKey == "vftp0036" || $folderKey == "vftp0037" || $folderKey == "vftp0038"  || $folderKey == "vftp0040" || $folderKey == "vftp0042" || $folderKey == "vftp0044" || $folderKey == "vftp0045" || $folderKey == "vftp0047" || $folderKey == "vftp0048"  || $folderKey == "vftp0050"  || $folderKey == "vftp0051" || $folderKey == "vftp0053"  || $folderKey == "vftp0055"  ){

                                    $insertData['drop_shipper']=$vendor_info[$folderKey][0];
                                    $insertData['ds_vendor_code']=$vendor_info[$folderKey][1];
                                    $insertData['location_name']=$vendor_info[$folderKey][2];

                                    $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);

                                }elseif($folderKey == "vftp0028"){ 

     
                                    $insertData['partno'] = preg_replace("/[^A-Za-z0-9]/", '',$insertData['partno']);
                                     $insertDataArray=[];

                                    foreach ($vendor_info[$folderKey] as $key => $vendor) { 
                                        $insertData['available_qty']=$dataValue[$fieldsArray[$folderKey]['available_qty'][$key]]; 
                                        $insertData['location_code']=$key; 

                                        $insertData['price']=$dataValue[($fieldsArray[$folderKey]['available_qty'][$key])+1];

                                        $insertData['drop_shipper']=$vendor[0];
                                        $insertData['ds_vendor_code']=$vendor[1];
                                        $insertData['location_name']=$vendor[2]; 

                                        $insertDataArray[]=$insertData;

                                    }
                                    
                                    $this->inventoryFeedUpdate($currentFolder,$insertDataArray,$db_ext);
                                }elseif($folderKey == "vftp0022"){ 
 
                                       
                                    $insertData['drop_shipper']=$vendor_info[$folderKey][0];
                                    $insertData['ds_vendor_code']=$vendor_info[$folderKey][1];
                                    $insertData['location_name']=$vendor_info[$folderKey][2];

                                    if(is_numeric($dataValue[4])&&is_numeric($dataValue[5])){

                                        $insertData['price']=(float)($dataValue[4])+(float)( $dataValue[5] );
                                    }else{
                                        $insertData['price']=(float)$dataValue[4];
                                    } 


                                    // dd($insertData);

                                    $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);

                                }elseif($folderKey == "vftp0046"){
  
                                        $locName = $insertData['location_code'];
                                        $insertData['drop_shipper']=$vendor_info[$folderKey][$locName][0];
                                        $insertData['ds_vendor_code']=$vendor_info[$folderKey][$locName][1];
                                        $insertData['location_name']=$vendor_info[$folderKey][$locName][2]; 
                                        $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);                                    

                                }elseif($folderKey == "vftp0052"){

                                        $stocks = [
                                            "In stock"=>"20",
                                            "Low stock"=>"4",
                                            "No stock"=>"0"
                                        ];

                                        $insertData['available_qty']=$stocks[$insertData['available_qty']];
                                        $insertData['drop_shipper']=$vendor_info[$folderKey][0];
                                        $insertData['ds_vendor_code']=$vendor_info[$folderKey][1];
                                        $insertData['location_name']=$vendor_info[$folderKey][2]; 
                                        // dd($insertData);
                                        $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);                                    

                                }elseif($folderKey == "vftp0024"){

                                        $insertData['price'] = ($this->clean($dataValue[3])+$this->clean($dataValue[4]))??0; 

                                        $insertData['drop_shipper']=$vendor_info[$folderKey][$insertData['location_code']][0];
                                        $insertData['ds_vendor_code']=$vendor_info[$folderKey][$insertData['location_code']][1];
                                        $insertData['location_name']=$vendor_info[$folderKey][$insertData['location_code']][2]; 
                                        // dd($insertData);
                                        // dd($insertData);
                                        $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);                                    

                                } 
                            }
                            $flag=1;
                        }
                    }else{


                        if($folderKey == 'vftp0046'){
                            $excelData = (new FastExcel)->sheet("5")->import($selectedFile);
                            // unset($excelData[0]); 

                        }elseif($folderKey == 'vftp0055'){
                            $excelData = (new FastExcel)->sheet("2")->import($selectedFile);
                            // unset($excelData[0]); 
                        }else{

                            $excelData = (new FastExcel)->import($selectedFile);
                            // $excelData = \Excel::load($selectedFile)->get()->toArray();
                        }
 

                        foreach($excelData as $key => $data){ 
                            $data = array_values($data);

                            if(true){

                                // dd($data);

                                if($folderKey == "vftp0030"){
                                    $dataValue = explode('|', $data[0]);
                                }else{
                                    $dataValue =  $data;
                                }   
                                 
 
                                $insertData = array(

                                    // 'filename'=>$folderKey,

                                     'partno'=>($fields['partno']!=null)?$dataValue[$fields['partno']]:null,                         //PartNo

                                     'vendor_partno'=>($fields['vendor_partno']!=null)?$dataValue[$fields['vendor_partno']]:null,        //VendorPartNo

                                     'mpn'=>($fields['mpn']!=null)?$dataValue[$fields['mpn']]:null,                 //MPN

                                     'description'=>($fields['description']!=null)?$dataValue[$fields['description']]:null,         //Description

                                     'brand'=>($fields['brand']!=null)?$dataValue[$fields['brand']]:null,               //Brand

                                     'model'=>($fields['model']!=null)?$dataValue[$fields['model']]:null,               //Model

                                     'location_code'=>($fields['location_code']!=null)?trim($dataValue[$fields['location_code']]," "):null,       //Location Code

                                     'price'=>($fields['price']!=null)?$dataValue[$fields['price']]:0,               //Price
                                );  
                                if($insertData['partno'] == '' || $insertData['partno'] == null  ){
                                    continue;
                                }

                                // dd($dataValue);
                                // $insertData['price'] = $this->clean($insertData['price']);

                                if(gettype($fields['available_qty']) != 'array'){

                                        $insertData['available_qty']=($fields['available_qty']!=null)?$dataValue[$fields['available_qty']]:0; 


                                } 
                                    // dd($insertData);

                                if($folderKey == "vftp0010" || $folderKey == "vftp0015"  || $folderKey == "vftp0023" || $folderKey == "vftp0030" || $folderKey == "vftp0032"){

                                    $insertData['drop_shipper']=$vendor_info[$folderKey][$insertData['location_code']][0];
                                    $insertData['ds_vendor_code']=$vendor_info[$folderKey][$insertData['location_code']][1];
                                    $insertData['location_name']=$vendor_info[$folderKey][$insertData['location_code']][2];
                                    $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);

                                }elseif($folderKey == "vftp0011" || $folderKey == "vftp0016" || $folderKey == "vftp0017" ||  $folderKey == "vftp0018" ||   $folderKey == "vftp0031" ||   $folderKey == "vftp0033"  ||   $folderKey == "vftp0043" ||   $folderKey == "vftp0049" || $folderKey == "vftp0054" ){ 
                                    $insertDataArray=[];
                                    foreach ($vendor_info[$folderKey] as $key => $vendor) { 

                                    
                                        $insertData['available_qty']=$dataValue[$fieldsArray[$folderKey]['available_qty'][$key]]?:0; 
                                        $insertData['location_code']=$key; 

                                        $insertData['drop_shipper']=$vendor[0];
                                        $insertData['ds_vendor_code']=$vendor[1];
                                        $insertData['location_name']=$vendor[2]; 

                                        $insertDataArray[]=$insertData;
                                        // dd($insertData);

                                    }
                                     // dd($insertDataArray);

                                    $this->inventoryFeedUpdate($currentFolder,$insertDataArray,$db_ext);

                                }elseif($folderKey == "vftp0012" || $folderKey == "vftp0029"  ){

                                        $fullfile = explode('/', $selectedFile);
                                        $filename = explode(".",end($fullfile));
                                        $locName = $filename[0];

                                        if($folderKey == "vftp0029"){
                                            $filenameArray = explode('_',$locName);
                                            $locName = $filenameArray[2];
                                        }

                                        $insertData['location_code']=$locName;
                                        $insertData['drop_shipper']=$vendor_info[$folderKey][$locName][0];
                                        $insertData['ds_vendor_code']=$vendor_info[$folderKey][$locName][1];
                                        $insertData['location_name']=$vendor_info[$folderKey][$locName][2]; 

                                    $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);                                    

                                }elseif($folderKey == "vftp0013" || $folderKey == "vftp0014" || $folderKey == "vftp0019" || $folderKey == "vftp0027" || $folderKey == "vftp0036" || $folderKey == "vftp0037" || $folderKey == "vftp0040" || $folderKey == "vftp0042" || $folderKey == "vftp0044" || $folderKey == "vftp0045"  || $folderKey == "vftp0047" || $folderKey == "vftp0048" || $folderKey == "vftp0050" || $folderKey == "vftp0051" || $folderKey == "vftp0053"  || $folderKey == "vftp0055"  ){

                                    $insertData['drop_shipper']=$vendor_info[$folderKey][0];
                                    $insertData['ds_vendor_code']=$vendor_info[$folderKey][1];
                                    $insertData['location_name']=$vendor_info[$folderKey][2];
                                     
                                    $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);

                                }elseif($folderKey == "vftp0028"){ 

     
                                    $insertData['partno'] = preg_replace("/[^A-Za-z0-9]/", '',$insertData['partno']);
                                     $insertDataArray=[];

                                    foreach ($vendor_info[$folderKey] as $key => $vendor) { 
                                        $insertData['available_qty']=$dataValue[$fieldsArray[$folderKey]['available_qty'][$key]]; 
                                        $insertData['location_code']=$key; 

                                        $insertData['price']=$dataValue[($fieldsArray[$folderKey]['available_qty'][$key])+1];

                                        $insertData['drop_shipper']=$vendor[0];
                                        $insertData['ds_vendor_code']=$vendor[1];
                                        $insertData['location_name']=$vendor[2]; 


                                        $insertDataArray[]=$insertData;

                                    }
                                    
                                    $this->inventoryFeedUpdate($currentFolder,$insertDataArray,$db_ext);
                                }elseif($folderKey == "vftp0022"){ 
 
                                       
                                    $insertData['drop_shipper']=$vendor_info[$folderKey][0];
                                    $insertData['ds_vendor_code']=$vendor_info[$folderKey][1];
                                    $insertData['location_name']=$vendor_info[$folderKey][2];

                                    if(is_numeric($dataValue[4])&&is_numeric($dataValue[5])){

                                        $insertData['price']=(float)($dataValue[4])+(float)( $dataValue[5] );
                                    }else{
                                        $insertData['price']=(float)$dataValue[4];
                                    } 


                                    // dd($insertData);

                                    $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);
                                }elseif($folderKey == "vftp0046"){
  
                                        $locName = $insertData['location_code'];
                                        $insertData['drop_shipper']=$vendor_info[$folderKey][$locName][0];
                                        $insertData['ds_vendor_code']=$vendor_info[$folderKey][$locName][1];
                                        $insertData['location_name']=$vendor_info[$folderKey][$locName][2]; 
                                        $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);                                    

                                }elseif($folderKey == "vftp0052"){

                                        $stocks = [
                                            "In stock"=>"20",
                                            "Low stock"=>"4",
                                            "No stock"=>"0"
                                        ];

                                        $insertData['available_qty']=$stocks[$insertData['available_qty']];
                                        $insertData['drop_shipper']=$vendor_info[$folderKey][0];
                                        $insertData['ds_vendor_code']=$vendor_info[$folderKey][1];
                                        $insertData['location_name']=$vendor_info[$folderKey][2]; 

                                        $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);                                    

                                }elseif($folderKey == "vftp0024"){

                                        $insertData['price'] = ($this->clean($dataValue[3])+$this->clean($dataValue[4]))??0; 

                                        $insertData['drop_shipper']=$vendor_info[$folderKey][$insertData['location_code']][0];
                                        $insertData['ds_vendor_code']=$vendor_info[$folderKey][$insertData['location_code']][1];
                                        $insertData['location_name']=$vendor_info[$folderKey][$insertData['location_code']][2]; 
                                        // dd($insertData);
                                        // dd($insertData);
                                        $this->inventoryFeedUpdate($currentFolder,$insertData,$db_ext);                                    

                                } 
                            }
                            $flag=1;
                        }


                    }

                    $migratedFile = InventoryMigration::where('foldername',$folderKey)->where('filename',$selectedFileName)->first();
                    if($migratedFile){
                        
                        $migratedFile->foldername = $folderKey;
                        $migratedFile->filename = $selectedFileName;
                        $migratedFile->save();

                    }else{
                        InventoryMigration::create(['foldername'=>$folderKey,'filename'=>$selectedFileName]);
                    }
                }

            
            // }
        } 
    }
}
