<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viflist;
use App\Btlist;
use App\CarImage;
use App\CarColour;
use App\Wheel;
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
        $Wheels = Wheel::select('brand','image','wheeldiameter','wheelwidth','style')->inRandomOrder()->paginate(12); ;
        return view('home',compact('Wheels'));
    }
    public function forms()
    {
        return view('forms');
    }
    public function wheels(Request $request)
    {
        try{ 
            $years = Viflist::select('yr')->distinct('yr')->orderBy('yr','Desc')->get(); 

            $Wheels = Wheel::select('brand','image','wheeldiameter','wheelwidth','style'); 
 
            if(isset($request->brand) && $request->brand)
                $Wheels = $Wheels->where('brand',$request->brand);

            if(isset($request->diameter) && $request->diameter)
                $Wheels = $Wheels->where('wheeldiameter',$request->diameter);

            if(isset($request->width) && $request->width)
                $Wheels = $Wheels->where('wheelwidth',$request->width);

            if(isset($request->search))
                $Wheels = $Wheels->where('brand', 'LIKE', '%'.$request->search.'%'); 


            $Wheels = $Wheels->inRandomOrder()->paginate(9); 
            
            ///Brand with count
            $brands = Wheel::select('brand', \DB::raw('count(*) as total'))->groupBy('brand')->get()->sortBy('brand'); 

            ///wheeldiameter with count 
            if(isset($request->brand) && $request->brand)
                $wheeldiameter = Wheel::select('wheeldiameter', \DB::raw('count(*) as total'))->wherebrand($request->brand)->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter');
            else 
                $wheeldiameter = Wheel::select('wheeldiameter', \DB::raw('count(*) as total'))->groupBy('wheeldiameter')->get()->sortBy('wheeldiameter'); 

            ///wheelwidth with count  
            if(isset($request->brand) && $request->brand)
                $wheelwidth = Wheel::select('wheelwidth', \DB::raw('count(*) as total'))->wherebrand($request->brand)->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 
            else
                $wheelwidth = Wheel::select('wheelwidth', \DB::raw('count(*) as total'))->groupBy('wheelwidth')->get()->sortBy('wheelwidth'); 

            ///Color based cars 
            if(isset($request->car_id) && $request->car_id){

                $car_id = base64_decode($request->car_id); 

                $car_images = CarImage::select('car_id','image','color_code')->wherecar_id($car_id)
                ->with(['CarViflist' => function($query) {
                    $query->select('vif', 'yr','make','model','body','drs','whls');

                },'CarColor'])->first();

            }else
                $car_images = ''; 

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

            // Year change or Loading filter
            if(isset($request->year) && $request->changeBy == 'year' || $request->changeBy == '')
                $allData['make'] = $data = $viflist->select('make')->distinct('make')->whereyr($request->year)->get();

            // Make change  or Loading Filter
            if(isset($request->year) && isset($request->make) && $request->changeBy == 'make' || $request->changeBy == '')
                $allData['model'] = $data = $viflist->select('model')->distinct('model')->whereyr($request->year)->wheremake($request->make)->get();

            // Model change  or Loading Filter
            if(isset($request->year) && isset($request->make) && isset($request->model) && $request->changeBy == 'model' || $request->changeBy == '')
                $allData['driverbody'] = $data = $viflist->select('vif','body','drs','whls')->whereyr($request->year)->wheremake($request->make)->wheremodel($request->model)->get()->unique('body','drs','whls');
            
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

    // Select the cars by vif and color code
    public function selectCarByColor(Request $request)
    { 
        try{
            
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

        $imagesjpg = glob("storage/cars/*.jpg");
        $imagespng = glob("storage/cars/*.png"); 
        $images = array_merge($imagesjpg,$imagespng);  
        foreach ($imagesjpg as $key => $value) {

            $path_remove = str_replace('storage/cars/', '', $value);
            $getvalue_array = explode('_', $path_remove); 
            if(count($getvalue_array) == 4)
            {
                $color_code = explode('.', $getvalue_array[3]);
                CarImage::insert(['car_id' => $getvalue_array[0],'cc' => $getvalue_array[1],'color_code'=> $color_code[0],'image'=>$value]);
            }
            elseif(count($getvalue_array) == 5){
                $color_code = explode('.', $getvalue_array[4]);
                CarImage::insert(['car_id' => $getvalue_array[1],'cc' => $getvalue_array[2],'color_code'=> $color_code[0],'image'=>$value]);
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

}
