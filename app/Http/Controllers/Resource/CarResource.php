<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wheel;
use App\CarImage;
use App\CarColor;
use App\Viflist;
use Exception;
use Illuminate\Support\Facades\Storage;

class CarResource extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $cars = Viflist::has('CarImages')->orderBy('id','DESC')->paginate(10); 
        // $cars = Viflist::with('CarImages')->paginate(10);
        $brands = Wheel::select('brand')->distinct('brand')->get();
        $makes = Viflist::select('make')->distinct('make')->get();
        $models = Viflist::select('model')->distinct('model')->get();
        $trims = Viflist::select('trim')->distinct('trim')->where('trim','!=','')->get();
        $wheels = Viflist::select('whls')->distinct('whls')->get();
        $bodies = Viflist::select('body')->distinct('body')->get();
        return view('admin.car.index',compact('cars','brands','makes','models','trims','wheels','bodies'));
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


        try{  

        $this->validate($request, [
            'vif' => 'required|max:255|unique:viflists,vif', 
            'yr' => 'required|max:255',
            'make' => 'required|max:255',
            'model' => 'required|max:255',
            'trim' => 'required|max:255',
            'whls' => 'required|max:255',
            'body' => 'required|max:255',
            'drs' => 'required|max:255',
            'vin' => 'required|max:255',
            'org' => 'required|max:255',
            'send' => 'required|max:255',
            'cc.*' => 'required|max:255',
            'color_code.*' => 'required|max:255',
            'evoxcode.*' => 'required|max:255',
            'name.*' => 'required|max:255',
            'simple.*' => 'required|max:255',
            'rgb1.*' => 'required|max:255',
            'car_image.*' => 'required|mimes:jpg,png|max:5242880',
        ]);
            $viflist = Viflist::create($request->all());

            foreach ($request->car_image as $key => $image) {
                $ext = $request->car_image[$key]->getClientOriginalExtension();
                $image_full_name = $request->vif.'_'.$request->cc[$key].'_032_'.$request->color_code[$key].'.'.$ext;
                $request->car_image[$key]->move(public_path('/storage/cars'), $image_full_name);
                $image_stored_path = '/storage/cars/'.$image_full_name;
                
                // Create a new record for the car images 
                $car_image = CarImage::create([
                    'car_id' => $request->vif,
                    'cc' => $request->cc[$key],
                    'color_code' => $request->color_code[$key],
                    'image' => $image_stored_path,
                ]);

                // Create a new record for the car colors 
                $car_color = CarColor::create([
                    'vif' => $request->vif,
                    'code' => $request->color_code[$key],
                    'evoxcode' => $request->evoxcode[$key],
                    'name' => $request->name[$key],
                    'rgb1' => $request->rgb1[$key],
                    'simple' => $request->simple[$key],
                ]);
            }

            return back()->with('flash_success','Car Added successfully');
        }catch(Exception $e){
            return back()->with('flash_error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try{  

        $this->validate($request, [
            'vif' => 'required|max:255|unique:viflists,vif', 
            'yr' => 'required|max:255',
            'make' => 'required|max:255',
            'model' => 'required|max:255',
            'trim' => 'required|max:255',
            'whls' => 'required|max:255',
            'body' => 'required|max:255',
            'drs' => 'required|max:255',
            'vin' => 'required|max:255',
            'org' => 'required|max:255',
            'send' => 'required|max:255',
            'cc.*' => 'required|max:255',
            'color_code.*' => 'required|max:255',
            'evoxcode.*' => 'required|max:255',
            'name.*' => 'required|max:255',
            'simple.*' => 'required|max:255',
            'rgb1.*' => 'required|max:255',
            'car_image.*' => 'required|mimes:jpg,png|max:5242880',
        ]);
            $viflist = Viflist::create($request->all());

            foreach ($request->car_image as $key => $image) {
                $ext = $request->car_image[$key]->getClientOriginalExtension();
                $image_full_name = $request->vif.'_'.$request->cc[$key].'_032_'.$request->color_code[$key].'.'.$ext;
                $request->car_image[$key]->move(public_path('/storage/cars'), $image_full_name);
                $image_stored_path = '/storage/cars/'.$image_full_name;
                
                // Create a new record for the car images 
                $car_image = CarImage::create([
                    'car_id' => $request->vif,
                    'cc' => $request->cc[$key],
                    'color_code' => $request->color_code[$key],
                    'image' => $image_stored_path,
                ]);

                // Create a new record for the car colors 
                $car_color = CarColor::create([
                    'vif' => $request->vif,
                    'code' => $request->color_code[$key],
                    'evoxcode' => $request->evoxcode[$key],
                    'name' => $request->name[$key],
                    'rgb1' => $request->rgb1[$key],
                    'simple' => $request->simple[$key],
                ]);
            }

            return back()->with('flash_success','Car Updated successfully');
        }catch(Exception $e){
            return back()->with('flash_error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCarImages($id)
    {
        $viflist = Viflist::find($id);
        $cars =CarImage::where('car_id',$viflist->vif)->paginate(10);
        // dd($cars[0],$cars[0]->CarColor->where('code',$cars[0]->color_code)->first()->simple);
        $brands = Wheel::select('brand')->distinct('brand')->get();
        return view('admin.car.images',compact('cars','brands'));
    }
}
