<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viflist;
use App\Btlist;
use App\CarImage;
use App\CarColour;
use App\Wheel;
use App\Tire;
use App\WheelProduct;
use Artisan;
use Symfony\Component\Process\Process;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $Wheels = Wheel::select('brand', 'image', 'wheeldiameter', 'wheelwidth', 'style')->inRandomOrder()->paginate(12); ;
        $years = Viflist::select('yr')->distinct('yr')->orderBy('yr','Desc')->limit(10)->get(); 

        return view('home',compact('Wheels','years'));
    }
    public function forms()
    {
        return view('forms');
    } 
    public function newsletter()
    {
        $Wheels = Wheel::select('brand','image','wheeldiameter','wheelwidth','style')->inRandomOrder()->paginate(12); ;
        return view('forms',compact('Wheels')); 
    }
    public function wheelview(Request $request,$wheel_id='')
    {

        $wheel = WheelProduct::where('id',$product_id)->first(); 

        $wheelproducts = WheelProduct::select('prodbrand','prodmodel','prodimage','wheeldiameter','wheelwidth','prodtitle','prodfinish','boltpattern1','boltpattern2','boltpattern3','offset1','offset2','hubbore','width','height','partno','price','price2','saleprice','qtyavail','salestart','proddesc');
 
        $products = $wheelproducts->where('prodbrand',$wheel->prodbrand)->where('prodmodel',$wheel->prodmodel)->where('prodimage',$wheel->prodimage)->where('prodfinish',$wheel->prodfinish)->get()->unique('wheeldiameter');
        $similar_products = WheelProduct::select('prodbrand','prodmodel','prodimage','wheeldiameter','wheelwidth','prodtitle','prodfinish','boltpattern1','boltpattern2','boltpattern3','offset1','offset2','hubbore','width','height','partno','price','price2','saleprice','qtyavail','salestart','proddesc')->where('prodbrand',$wheel->prodbrand)->get()->unique('prodtitle');
        // dd($products);
        return view('wheel_view',compact('wheel','products','similar_products'));
    }
    public function wheels(Request $request)
    {
        try{ 
            $years = Viflist::select('yr')->distinct('yr')->orderBy('yr','Desc')->get(); 

            $Wheels = Wheel::select('brand','image','wheeldiameter','wheelwidth','style'); 
    
            if(isset($request->brand) && $request->brand) 
                $Wheels = $Wheels->whereIn('brand',json_decode(base64_decode($request->brand)));

            if(isset($request->diameter) && $request->diameter)
                $Wheels = $Wheels->whereIn('wheeldiameter',json_decode(base64_decode($request->diameter)));

            if(isset($request->width) && $request->width)
                $Wheels = $Wheels->whereIn('wheelwidth',json_decode(base64_decode($request->width)));

            if(isset($request->search))
                $Wheels = $Wheels->where('brand', 'LIKE', '%'.json_decode(base64_decode($request->search)).'%');  

            $Wheels = $Wheels->inRandomOrder()->paginate(9); 

            ///Brand with count
            $brands = Wheel::select('brand', \DB::raw('count(*) as total'))->groupBy('brand')->get()->sortBy('brand'); 

            ///wheeldiameter with count 
            if(isset($request->brand) && $request->brand)
                $wheeldiameter = Wheel::select('wheeldiameter', \DB::raw('count(*) as total'))->whereIn('brand',json_decode(base64_decode($request->brand)))->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter');
            else 
                $wheeldiameter = Wheel::select('wheeldiameter', \DB::raw('count(*) as total'))->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter'); 

            ///wheelwidth with count  
            if(isset($request->brand) && $request->brand)
                $wheelwidth = Wheel::select('wheelwidth', \DB::raw('count(*) as total'))->whereIn('brand',json_decode(base64_decode($request->brand)))->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 
            else
                $wheelwidth = Wheel::select('wheelwidth', \DB::raw('count(*) as total'))->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 

            ///Color based cars 
            if(isset($request->car_id) && $request->car_id){

                $car_id = json_decode(base64_decode($request->car_id)); 

                $car_images = CarImage::select('car_id','image','color_code')->wherecar_id($car_id)
                ->with(['CarViflist' => function($query) {
                    $query->select('vif', 'yr','make','model','body','drs','whls');

                },'CarColor'])->first();

            }else{
                $car_images = ''; 
            }
                
            return view('wheels',compact('years','Wheels','car_images','brands','wheeldiameter','wheelwidth')); 
            
        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    } 
    public function vehicledetails(Request $request)
    { 
        try{
            $viflist = new Viflist; 

            // Make change or Loading filter
            if(isset($request->make) && $request->changeBy == 'make' || $request->changeBy == '')
                $allData['year'] = $data = $viflist->select('yr')->distinct('yr')->wheremake($request->make)->orderBy('yr','DESC')->get();

            // Make change  or Loading Filter
            if(isset($request->make) && isset($request->year) && $request->changeBy == 'year' || $request->changeBy == '')
                $allData['model'] = $data = $viflist->select('model')->distinct('model')->whereyr($request->year)->wheremake($request->make)->get();

            // Model change  or Loading Filter
            if(isset($request->year) && isset($request->make) && isset($request->model) && $request->changeBy == 'model' || $request->changeBy == ''){
                $data = $viflist->select('vif','body','drs','whls')->whereyr($request->year)->wheremake($request->make)->wheremodel($request->model)->get()->unique('body','drs','whls')->toArray();
                $dummy = array_values($data);
                $allData['driverbody'] = $data = $dummy;
            }
            // dd($data);
            if($request->changeBy == ''){    
                return response()->json(['data' => $allData]);
            }
            return response()->json(['data' => $data]);

        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    }
    public function wheelbrand(Request $request)
    {
        try{ 
            $years = Viflist::select('yr')->distinct('yr')->orderBy('yr','Desc')->get(); 

            $Wheels = Wheel::select('brand','image','wheeldiameter','wheelwidth','style'); 
    
            if(isset($request->brand) && $request->brand) 
                $Wheels = $Wheels->whereIn('brand',json_decode(base64_decode($request->brand)));

            if(isset($request->diameter) && $request->diameter)
                $Wheels = $Wheels->whereIn('wheeldiameter',json_decode(base64_decode($request->diameter)));

            if(isset($request->width) && $request->width)
                $Wheels = $Wheels->whereIn('wheelwidth',json_decode(base64_decode($request->width)));

            if(isset($request->search))
                $Wheels = $Wheels->where('brand', 'LIKE', '%'.json_decode(base64_decode($request->search)).'%');  

            $Wheels = $Wheels->inRandomOrder()->paginate(9); 
            ///Brand with count
            $brands = Wheel::select('brand', \DB::raw('count(*) as total'))->groupBy('brand')->get()->sortBy('brand'); 

            ///wheeldiameter with count 
            if(isset($request->brand) && $request->brand)
                $wheeldiameter = Wheel::select('wheeldiameter', \DB::raw('count(*) as total'))->whereIn('brand',json_decode(base64_decode($request->brand)))->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter');
            else 
                $wheeldiameter = Wheel::select('wheeldiameter', \DB::raw('count(*) as total'))->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter'); 

            ///wheelwidth with count  
            if(isset($request->brand) && $request->brand)
                $wheelwidth = Wheel::select('wheelwidth', \DB::raw('count(*) as total'))->whereIn('brand',json_decode(base64_decode($request->brand)))->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 
            else
                $wheelwidth = Wheel::select('wheelwidth', \DB::raw('count(*) as total'))->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 

            ///Color based cars 
            if(isset($request->car_id) && $request->car_id){

                $car_id = json_decode(base64_decode($request->car_id)); 

                $car_images = CarImage::select('car_id','image','color_code')->wherecar_id($car_id)
                ->with(['CarViflist' => function($query) {
                    $query->select('vif', 'yr','make','model','body','drs','whls');

                },'CarColor'])->first();

            }else
                $car_images = ''; 
                
            return view('wheelbrand',compact('years','Wheels','car_images','brands','wheeldiameter','wheelwidth')); 
            
        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    } 
    // public function vehicledetails(Request $request)
    // { 
    //     try{
    //         $viflist = new Viflist; 

    //         // Make change or Loading filter
    //         if(isset($request->make) && $request->changeBy == 'make' || $request->changeBy == '')
    //             $allData['year'] = $data = $viflist->select('yr')->distinct('yr')->wheremake($request->make)->orderBy('yr','DESC')->get();

    //         // Make change  or Loading Filter
    //         if(isset($request->make) && isset($request->year) && $request->changeBy == 'year' || $request->changeBy == '')
    //             $allData['model'] = $data = $viflist->select('model')->distinct('model')->whereyr($request->year)->wheremake($request->make)->get();

    //         // Model change  or Loading Filter
    //         if(isset($request->year) && isset($request->make) && isset($request->model) && $request->changeBy == 'model' || $request->changeBy == ''){
    //             $data = $viflist->select('vif','body','drs','whls')->whereyr($request->year)->wheremake($request->make)->wheremodel($request->model)->get()->unique('body','drs','whls')->toArray();
    //             $dummy = array_values($data);
    //             $allData['driverbody'] = $data = $dummy;
    //         }
    //         // dd($data);
    //         if($request->changeBy == ''){    
    //             return response()->json(['data' => $allData]);
    //         }
    //         return response()->json(['data' => $data]);

    //     }catch(ModelNotFoundException $notfound){
    //         return response()->json(['error' => $notfound->getMessage()]); 
    //     }catch(Exception $error){
    //         return response()->json(['error' => $error->getMessage()]); 
    //     }
    // }

    // Select the cars by vif and color code
    public function selectCarByColor(Request $request)
    { 
        try{
            ///// Based On Car color 
            $data = CarImage::select('image','car_id')->wherecar_id($request->vif)->wherecolor_code($request->code)->first();
            return response()->json(['data' => $data]);

        }catch(ModelNotFoundException $notfound){
            return response()->json(['error' => $notfound->getMessage()]); 
        }catch(Exception $error){
            return response()->json(['error' => $error->getMessage()]); 
        }
    }

    public function carimages()
    {

        $imagesjpg = glob("/var/www/html/cars/*.jpg");
        $imagespng = glob("/var/www/html/cars/*.png");
        // $imagespng = glob("storage/cars/*.png"); 
        $images = array_merge($imagesjpg,$imagespng);  
        foreach ($images as $key => $value) {

            $path_remove = str_replace('/var/www/html/cars/', '', $value);
            $imagename ="storage/cars/".$path_remove;
            // dd($imagename) ;
            $getvalue_array = explode('_', $path_remove); 
            if(!CarImage::where('image',$imagename)->first()){

                if(count($getvalue_array) == 4)
                {
                    $color_code = explode('.', $getvalue_array[3]);
                    CarImage::insert(['car_id' => $getvalue_array[0],'cc' => $getvalue_array[1],'color_code'=> $color_code[0],'image'=>$imagename]);
                }
                elseif(count($getvalue_array) == 5){
                    $color_code = explode('.', $getvalue_array[4]);
                    CarImage::insert(['car_id' => $getvalue_array[1],'cc' => $getvalue_array[2],'color_code'=> $color_code[0],'image'=>$imagename]);
                } 
            }
        }
        return 'success';
    }

    public function carimagestosqlLive()
    {

        $imagesjpg = glob("/var/www/html/WheelVisualizer/storage/app/public/cars/*.jpg");
        $imagespng = glob("/var/www/html/WheelVisualizer/storage/app/public/cars/*.png");
        // $imagespng = glob("storage/cars/*.png"); 
        $images = array_merge($imagesjpg,$imagespng);  
        foreach ($images as $key => $value) {

            $path_remove = str_replace('/var/www/html/WheelVisualizer/storage/app/public/cars/', '', $value);
            $imagename ="storage/cars/".$path_remove;
            // dd($imagename) ;
            $getvalue_array = explode('_', $path_remove); 
            if(!CarImage::where('image',$imagename)->first()){

                if(count($getvalue_array) == 4)
                {
                    $color_code = explode('.', $getvalue_array[3]);
                    CarImage::insert(['car_id' => $getvalue_array[0],'cc' => $getvalue_array[1],'color_code'=> $color_code[0],'image'=>$imagename]);
                }
                elseif(count($getvalue_array) == 5){
                    $color_code = explode('.', $getvalue_array[4]);
                    CarImage::insert(['car_id' => $getvalue_array[1],'cc' => $getvalue_array[2],'color_code'=> $color_code[0],'image'=>$imagename]);
                } 
            }
        }
        return 'success';
    }
    public function wheels_data()
    {

        $wheels = Wheel::get();
        foreach ($wheels as $key => $wheel) {
            $fileName ='storage/wheels/'.$wheel->image; 
            if(file_exists($fileName)){ 
                Wheel::where('id',$wheel->id)->update([
                    'image'=>$fileName
                ]); 
            }
        } 
    }
    public function wheelsNameChange()
    {
        
        // $imagesjpg = glob("storage/wheels/*.jpg");
        // $imagespng = glob("storage/wheels/*.png"); 
        // $images = array_merge($imagesjpg,$imagespng);  
        // sort($images);
        // foreach ($images as $key => $image) {

        //     // if($key == 0){

        //     $path_remove = str_replace('storage/wheels/', '', $image);

        //     $path_remove = str_replace('-', '_', $path_remove);

        //     $getvalue_array = explode('_', $path_remove); 


        //     $split_extensions = explode('.', $path_remove);
 
        //     $diameter = rand(10,25);
        //     $boldpattern1 = rand(4010,6999);
        //     $boldpattern2 = rand(4010,6999);
        //     $boldpattern3 = rand(4010,6999);
        //     $offset1 = rand(10,40);
        //     $arr =array("High", "Low");
        //     $simpleoffset =$arr[array_rand($arr)];

        //     $arr1 =array("H", "O");
        //     $wheeltype =$arr1[array_rand($arr1)];
 
        //     $wheelwidth = $this->rand_float(9,10,20);
            
        //     $hub = $this->rand_float(87,106,20);
            
        //     $part_no_prefix = strtoupper(substr($getvalue_array[0], 0, 2));

        //     $random_part_no = $part_no_prefix.$this->generateRandomCode(10);

        //     $fileName = 'wheels/'.$split_extensions[0].'_'.$random_part_no.'_'.$diameter.'.'.$split_extensions[1];
            
        //     // \Storage::move(str_replace('storage/', '', $image),$fileName);
        //     \Storage::disk('public')->move(str_replace('storage/', '', $image), $fileName);

        //     Wheel::create([
        //         'part_no' => $random_part_no,
        //         'brand' => $getvalue_array[0],
        //         'style' => $getvalue_array[0].' '.$getvalue_array[1],
        //         'finish' => $getvalue_array[1],
        //         'image' => 'storage/'.$fileName,
        //         'boldpattern1' => $boldpattern1,
        //         'boldpattern2' => $boldpattern2,
        //         'boldpattern3' => $boldpattern3,
        //         'offset1' => $offset1,
        //         'simpleoffset' => $simpleoffset,
        //         'wheeltype' => $wheeltype,
        //         'wheeldiameter' => $diameter,
        //         'wheelwidth' => $wheelwidth,
        //         'hub' => $hub
        //     ]);
             
        //     // }

        //     // dd($image, 'storage/'.$fileName,$getvalue_array,$simpleoffset,$random_part_no);


        // }
    }

    function generateRandomCode($limit){
        $code = '';
        for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
        return $code;
    }


    function rand_float($st_num=0,$end_num=1,$mul=1000000)
    {
        if ($st_num>$end_num) return false;
        return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
    }


    function csv_upload(Request $request)
    {
        $filepath = public_path('/storage/table_data/viflist_editorial.csv');
         $file = fopen($filepath, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            if($getData[0] !='VIF #'){
               $insert = new Viflist;
               $insert->vif = $getData[0];
               $insert->org = $getData[1];
               $insert->send = $getData[2];
               $insert->yr = $getData[3];
               $insert->make = $getData[4];
               $insert->model = $getData[5];
               $insert->trim = $getData[6];
               $insert->drs = $getData[7];
               $insert->body = $getData[8];
               $insert->cab = $getData[9];
               $insert->whls = $getData[10];
               $insert->vin = $getData[11];
               $insert->date_delivered = $getData[12];
               $insert->save();
            } 

           } 
           fclose($file);  

        return 'success';
    }



    function csv_upload_color(Request $request)
    {
        $filepath = public_path('/storage/table_data/ail_altcolors.csv');
         $file = fopen($filepath, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           { 
            if($getData[0] !='VIFNUM'){
               $insert = new CarColour;
               $insert->vif = $getData[0];
               $insert->code = $getData[1];
               $insert->evoxcode = $getData[2];
               $insert->name = $getData[3];
               $insert->rgb1 = $getData[4];
               $insert->rgb2 = $getData[5]; 
               $insert->simple = $getData[6]; 
               $insert->shot = $getData[7]; 
               $insert->save();
            } 

           } 
           fclose($file); 
            
        return 'success';
    }

    function fold_fil(Request $request)
    {  
        try{ 
            exec('rm -rf /var/www/html/demo'); 
            return 'success';
        }catch(Exception $e){
            dd($e);
        }
    }

    public $storeArr=array();

    public function recursiveScan($dir,$storeArr,$destinationPath) {
        $tree = glob(rtrim($dir, '/') . '/*');
        if (is_array($tree)) {
            foreach($tree as $file) {
                if(is_dir($file)) {
                    // array_push($this->storeArr,$file);
                    $this->recursiveScan($file,$this->storeArr,$destinationPath);
                    // dd($storeArr);
                }elseif (is_file($file)) {

                    $folders= explode('/', $file);
                    $lastPart = $folders[count($folders)-1];

            if(!file_exists($destinationPath.$lastPart)){ 
                    copy($file, $destinationPath.$lastPart);
            }

                    // echo count(glob($destinationPath."/*.*"))." - ".$destinationPath.$lastPart." <br> ";
                    // array_push($this->storeArr,$file);
                }
            }
        }

        return $this->storeArr;
    }

    public function tiredetailimages()
    {
        $tireimages = $this->recursiveScan('storage/tires/models/*',$this->storeArr);
    
        // $tireimages = glob("storage/tires/models/*/*/*");
        // $tireimages  =  glob("storage/tires/models/*") ;

        foreach ($tireimages as $key => $value) {
            if(!(strpos($value, 'Thumbs.db') !== false ||
                 strpos($value, '.xlsx') !== false || 
                 strpos($value, '.zip') !== false || 
                 strpos($value, '.pdf') !== false)){
                $path = str_replace("storage/tires/models/","",$value);
                $folders= explode('/', $value);
                $lastPart = $folders[count($folders)-1];

                Tire::where('benefitsimage1','like', '%' . $lastPart. '%')->update([
                    'benefitsimage1'=>$path,
                ]);

                Tire::where('benefitsimage2','like', '%' . $lastPart. '%')->update([
                    'benefitsimage2'=>$path,
                ]);

                Tire::where('benefitsimage3','like', '%' . $lastPart. '%')->update([
                    'benefitsimage3'=>$path,
                ]);

                Tire::where('benefitsimage4','like', '%' . $lastPart. '%')->update([
                    'benefitsimage4'=>$path,
                ]);

                Tire::where('prodimage1','like', '%' . $lastPart. '%')->update([
                    'prodimage1'=>$path,
                ]);

                Tire::where('prodimage2','like', '%' . $lastPart. '%')->update([
                    'prodimage2'=>$path,
                ]);

                Tire::where('prodimage3','like', '%' . $lastPart. '%')->update([
                    'prodimage3'=>$path,
                ]);
                echo $lastPart."<br>";
            }
        }
        // dd($arr);

        return 'success';
    }

    public function carImagesMovingToFolder()
    {     
        $destinationPath = '/var/www/html/mergedImages/';
        $carimagesArray = $this->recursiveScan('/var/www/html/imgs/color2400png/color_2400_032_png/MY2006/*',$this->storeArr,$destinationPath);
  
        return 'success';
    }
    public function carImagesMovingToFolderLive()
    {     
        $destinationPath = '/var/www/html/WheelVisualizer/storage/app/public/cars/';
        $carimagesArray = $this->recursiveScan('/var/www/html/WheelVisualizer/storage/app/public/cars_all/*',$this->storeArr,$destinationPath);
  
        return 'success';
    }
    public function renameFrontBackImages()
    {

        $images = glob("storage/wheels/optimised_front_back/*");
        
        $destinationPath = 'storage/wheels/new_front_back/';

        foreach ($images as $key => $value) {

                    $folders= explode('/', $value);
                    $lastPart = $folders[count($folders)-1];

                    $path_remove = str_replace('-min_optimized.png', '.png', $lastPart);
                    $path_remove = str_replace('_optimized.png', '.png', $path_remove);

                    copy($value, $destinationPath.$path_remove);
        }
        return 'success';
    }


    function csv_vftp0016_test(Request $request)
    {
        $filepath = public_path('/storage/vftp/vftp0016/WheelPros_USAWheel.csv');
        $destpath1 = public_path('/storage/vftp/vftp0016/combined-invent-vftp0016-1.csv');
        $destpath2 = public_path('/storage/vftp/vftp0016/combined-invent-vftp0016-2.csv');
        $destpath3 = public_path('/storage/vftp/vftp0016/combined-invent-vftp0016-3.csv');
        $destpath4 = public_path('/storage/vftp/vftp0016/combined-invent-vftp0016-4.csv');
         $inpfile = fopen($filepath, "r");
         $outfile1 = fopen($destpath1, "w+");
         $outfile2 = fopen($destpath2, "w+");
         $outfile3 = fopen($destpath3, "w+");
         $outfile4 = fopen($destpath4, "w+");
         $data = []; // Empty Data
            
 // Open and Read individual CSV file
        if (($inpfile = fopen($filepath, 'r')) !== false) {
            // Collect CSV each row records

            $loc =array(
'DenverCO' =>  '3',  
'DallasTX' =>  '4',  
'HoustonTX' =>  '5',  
'KansasCityMO' =>  '6',  
'NewOrleansLA' =>  '7',  
'PhoenixAZ' =>  '8',  
'OKCityOK' =>  '9',  
'ElkGroveCA' =>  '10', 
'SanAntonioTX' =>  '11', 
'LosAngelesCA' =>  '12', 
'SeattleWA' =>  '13', 
'AtlantaGA' =>  '14', 
'ChicagoIL' =>  '15'
            );

// , 
// 'OrlandoFL' =>  '16', 
// 'MiamiFL' =>  '17', 
// 'ClevelandOH' =>  '18', 
// 'CincinattiOH' =>  '19', 
// 'CharlotteNC' =>  '20', 
// 'CranburyNJ' =>  '21', 
// 'NashvilleTN' =>  '22', 
// 'SaltLakeUT' =>  '23', 
// 'ManchesterCT' =>  '24', 
// 'MinneapolisMN' =>  '25', 
// 'JacksonvilleFL' =>  '26', 
// 'RichmondVA' =>  '27', 
// 'CoronaCA' =>  '28', 
// 'PortlandOR' =>  '29', 
// 'BaltimoreMD' =>  '30', 
// 'MfgBuenaParkCA' =>  '31', 
// 'DistBuenaParkCA' =>  '32'



                        $data = []; // Empty Data
                while (($dataValue = fgetcsv($inpfile, 20000)) !== false) {

                    if($dataValue[1] != 'ItemNumber'){
                        foreach ($loc as $locName => $colnValue) {
                                $newRow = array(
                                 $dataValue[1],
                                 null,
                                 null,
                                 $dataValue[2],
                                 null,
                                 null,
                                 $locName,
                                 $dataValue[$colnValue],
                                 $dataValue[34]
                                );

                                $data[$locName][] = $newRow;
                                // if($colnValue > 24){
                                //     fputcsv($outfile4, $newRow, ",", "'");//24-32
                                // }elseif($colnValue > 16){
                                //     fputcsv($outfile3, $newRow, ",", "'");//16-24
                                // }elseif($colnValue > 8){
                                //     fputcsv($outfile2, $newRow, ",", "'");//8-16
                                // }else{
                                //     fputcsv($outfile1, $newRow, ",", "'");//3-8
                                // }
                        }
                    // dd($data);
                   
                    }
                }
                // dd($data);
                 foreach ($data as $key =>  $locationData) {
                    // dd($locationData);
                    foreach ($locationData as $key1 => $value) {
                            try {
                               // Insert record into master CSV file
                               // fputcsv($outfile1, $value, ",", "'");
                                if($key <= 10){
                                    fputcsv($outfile1, $value, ",", "'");//24-32
                                }elseif($key <= 20){
                                    fputcsv($outfile2, $value, ",", "'");//16-24
                                }elseif($key <= 30){
                                    fputcsv($outfile3, $value, ",", "'");//8-16
                                }
                                // else{
                                //     fputcsv($outfile1, $value, ",", "'");//3-8
                                // }
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        
                        # code...
                    }
                }
        }

        fclose($inpfile); // Close individual CSV file 
// Close master CSV file 
fclose($outfile1);
// fclose($outfile2);
// fclose($outfile3);
// fclose($outfile4);
        return 'success';
    }



    function csv_vftp0017(Request $request)
    {
        $filepath = public_path('/storage/vftp/vftp0017/TSW-Wheels-inventory_2020-03-06-1583534287.csv');
        $destpath = public_path('/storage/vftp/vftp0017/combined-invent-vftp0017.csv');
         $inpfile = fopen($filepath, "r");
         $outfile = fopen($destpath, "w+");
         $data = []; // Empty Data
        if (($inpfile = fopen($filepath, 'r')) !== false) {
            // Collect CSV each row records

                $loc =array(
                'CA' =>  '1',  
                'FL' =>  '2',  
                'GA' =>  '3',  
                'IL' =>  '4',  
                'PA' =>  '5',  
                'TX' =>  '6',  
                'UT' =>  '7',  
                'WA' =>  '8', 
                            );

                while (($dataValue = fgetcsv($inpfile, 1000)) !== false) {

                    if($dataValue[0] != 'Item Number'){
                $data = []; // Empty Data
                foreach ($loc as $locName => $colnValue) {
                        $newRow = array(
                         $dataValue[0],
                         null,
                         null,
                         null,
                         null,
                         null,
                         $locName,
                         $dataValue[$colnValue],
                         null,
                        );
                        fputcsv($outfile, $newRow, ",", "'");
                        // $data[] = $newRow;
                }
                    }
            }
        }

        // Close master CSV file 
        fclose($outfile);
                return 'success';
    }

    function csv_vftp0016(Request $request)
    {

        $filepath = public_path('/storage/vftp/vftp0016/WheelPros_USAWheel.csv');
        $destpath1 = public_path('/storage/vftp/vftp0016/combined-invent-vftp0016-part1.csv');
        $destpath2 = public_path('/storage/vftp/vftp0016/combined-invent-vftp0016-part2.csv');
         $inpfile = fopen($filepath, "r");
         $outfile1 = fopen($destpath1, "w+");
         $outfile2 = fopen($destpath2, "w+");
         $data = []; // Empty Data
        if (($inpfile = fopen($filepath, 'r')) !== false) {
            // Collect CSV each row records

                $loc =array(

            'DenverCO' => '3',
            'DallasTX' => '4',
            'HoustonTX' => '5',
            'KansasCityMO' => '6',
            'NewOrleansLA' => '7',
            'PhoenixAZ' => '8',
            'OKCityOK' => '9',
            'ElkGroveCA' => '10',
            'SanAntonioTX' => '11',
            'LosAngelesCA' => '12',
            'SeattleWA' => '13',
            'AtlantaGA' => '14',
            'ChicagoIL' => '15',
            'OrlandoFL' => '16',
            'MiamiFL' => '17',
            'ClevelandOH' => '18',
            'CincinattiOH' => '19',
            'CharlotteNC' => '20',
            'CranburyNJ' => '21',
            'NashvilleTN' => '22',
            'SaltLakeUT' => '23',
            'ManchesterCT' => '24',
            'MinneapolisMN' => '25',
            'JacksonvilleFL' => '26',
            'RichmondVA' => '27',
            'CoronaCA' => '28',
            'PortlandOR' => '29',
            'BaltimoreMD' => '30',
            'MfgBuenaParkCA' => '31',
            'DistBuenaParkCA' => '32'

                            );

                while (($dataValue = fgetcsv($inpfile, 2000)) !== false) {

                    if($dataValue[0] != 'BrandCode'){
                $data = []; // Empty Data
                foreach ($loc as $locName => $colnValue) {
                        $newRow = array(
                         $dataValue[1],                         //PartNo
                         null,                         //VendorPartNo
                         null,                                  //MPN
                         $dataValue[2],                         //Description
                         null,                                  //Brand
                         null,                                  //Model
                         $locName,                              //Location Code
                         $dataValue[$colnValue],                //Available QTY
                         $dataValue[34],                                   //Price
                        );
                        if($colnValue < 15){

                            fputcsv($outfile1, $newRow, ",", "'");
                        }else{

                            fputcsv($outfile2, $newRow, ",", "'");
                        }
                        // $data[] = $newRow;
                }
                    }
            }
        }

        // Close master CSV file 
        fclose($outfile1);
        // fclose($outfile2);
                return 'success';
    }
}