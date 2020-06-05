<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WheelProduct;
use Exception;
use Illuminate\Support\Facades\Storage;

class WheelProductResource extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {        

        $selectFields=['id','prodbrand', 'prodmodel', 'prodimage', 'wheeldiameter', 'wheelwidth', 'prodtitle','detailtitle', 'prodfinish', 'proddesc'];

        $wheelproducts = WheelProduct::get($selectFields)->unique('prodmodel');
        // dd($tires);
        $wheelproducts = MakeCustomPaginator($wheelproducts, $request, 5);
        return view('admin.wheelproduct.index',compact('wheelproducts'));
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
            'prodbrand'=>'required',
            'prodtitle'=>'required',
            'prodmodel'=>'required',
            'prodfinish'=>'required',
            'prodimage'=>'required|mimes:jpg,jpeg,png',
            'partno'=>'required',
            'wheeltype'=>'required',
            'wheeldiameter'=>'required',
            'wheelwidth'=>'required',
            'weight'=>'required',
            'length'=>'required',
            'width'=>'required',
            'height'=>'required',
            'price'=>'required',
            'saleprice'=>'required',
            'qtyavail'=>'required',
        ]);
            $product = WheelProduct::create($request->all());
            // dd($product);
            if($request->hasFile('prodimage') ){
                $imagename = $request->prodimage->getClientOriginalName();  
                $request->prodimage->move(public_path('/storage/wheel_products'), $imagename); 
                $product->prodimage = $imagename; 
            } 
            if($request->hasFile('prodimagedually') ){
                $imagename = $request->prodimagedually->getClientOriginalName();  
                $request->prodimagedually->move(public_path('/storage/wheel_products'), $imagename); 
                $product->prodimagedually = $imagename; 
            } 
            $product->save(); 

            return back()->with('flash_success','Wheel Product Added successfully');
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
            'prodbrand'=>'required',
            'prodtitle'=>'required',
            'prodmodel'=>'required',
            'prodfinish'=>'required',
            'prodimage'=>'required|mimes:jpg,jpeg,png',
            'partno'=>'required',
            'wheeltype'=>'required',
            'wheeldiameter'=>'required',
            'wheelwidth'=>'required',
            'weight'=>'required',
            'length'=>'required',
            'width'=>'required',
            'height'=>'required',
            'price'=>'required',
            'saleprice'=>'required',
            'qtyavail'=>'required',
        ]);
            $product = WheelProduct::find($id);
            // dd($product);
            $updateData=$request->all();

            if($request->hasFile('prodimage') ){
                $imagename = $request->prodimage->getClientOriginalName();  
                $request->prodimage->move(public_path('/storage/wheel_products'), $imagename); 
                $updateData['prodimage'] = $imagename; 
            } 
            if($request->hasFile('prodimagedually') ){
                $imagename = $request->prodimagedually->getClientOriginalName();  
                $request->prodimagedually->move(public_path('/storage/wheel_products'), $imagename); 
                $updateData['prodimagedually'] = $imagename; 
            } 
            $product->update($updateData);

            return back()->with('flash_success','Wheel Product Updated successfully');
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
     
        try {

            $viflist = WheelProduct::find($id); 

            foreach ($viflist->CarImages as $key => $car) {

                if(file_exists(url($car->image))){
                    unlink(url($car->image));
                }
                $car->delete();
            }
            CarColor::where('vif',$viflist->vif)->delete();

            $viflist->delete();
            return back()->with('flash_sucess', 'Car deleted successfully');
        } 
        catch (Exception $e) {

            return back()->with('flash_error', 'Car Not Found');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProductsByModel($id)
    {
        try {
            $wheelproduct = WheelProduct::find(base64_decode($id));
            $wheelproducts = WheelProduct::where('prodbrand',$wheelproduct->prodbrand)->where('prodmodel',$wheelproduct->prodmodel)->paginate(5);
            // dd($tires);
            return view('admin.wheelproduct.model',compact('wheelproducts','wheelproduct'));
        } 
        catch (Exception $e) {
            dd($e);
            return back()->with('flash_error', 'Tire Not Found');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setCarImages(Request $request,$id)
    { 
        try{  

        $this->validate($request, [
            'cc.*' => 'required|max:255',
            'color_code.*' => 'required|max:255',
            'evoxcode.*' => 'required|max:255',
            'name.*' => 'required|max:255',
            'simple.*' => 'required|max:255',
            'rgb1.*' => 'required|max:255',
            'car_image.*' => 'required|mimes:jpg,png|max:5242880',
        ]);
            $viflist = WheelProduct::find($id);

            foreach ($request->car_image as $key => $image) {
                $ext = $request->car_image[$key]->getClientOriginalExtension();
                $image_full_name = $viflist->vif.'_'.$request->cc[$key].'_032_'.$request->color_code[$key].'.'.$ext;
                $request->car_image[$key]->move(public_path('/storage/cars'), $image_full_name);
                $image_stored_path = 'storage/cars/'.$image_full_name;
                
                // Create a new record for the car images 
                $car_image = CarImage::create([
                    'car_id' => $viflist->vif,
                    'cc' => $request->cc[$key],
                    'color_code' => $request->color_code[$key],
                    'image' => $image_stored_path,
                ]);

                // Create a new record for the car colors 
                $car_color = CarColor::create([
                    'vif' => $viflist->vif,
                    'code' => $request->color_code[$key],
                    'evoxcode' => $request->evoxcode[$key],
                    'name' => $request->name[$key],
                    'rgb1' => $request->rgb1[$key],
                    'simple' => $request->simple[$key],
                ]);
            }

            return back()->with('flash_success','Car Images Added successfully');
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
    public function updateCarImages(Request $request,$id)
    {  
        $this->validate($request, [
            'cc' => 'required|max:255',
            'color_code' => 'required|max:255',
            'evoxcode' => 'required|max:255',
            'name' => 'required|max:255',
            'simple' => 'required|max:255',
            'rgb1' => 'required|max:255',
            'car_image' => 'required|mimes:jpg,png|max:5242880',
        ]);

        try{  
                $car = CarImage::find($id);
                $car_color = CarColor::where('code',$car->color_code)->where('vif',$car->car_id)->first(); 

                if($request->hasFile('car_image')){

                    //Remove the existing image in the folder
                    if(file_exists(public_path($car->image))){
                        unlink(public_path($car->image));
                    }

                    $ext = $request->car_image->getClientOriginalExtension();
                    $image_full_name = $car->car_id.'_'.$request->cc.'_032_'.$request->color_code.'.'.$ext;
                    $request->car_image->move(public_path('/storage/cars'), $image_full_name);
                    $image_stored_path = 'storage/cars/'.$image_full_name;


                    // Update the New Image 
                    $car->image = $image_stored_path;
                    $car->save();

                }
                
                // Updtae the record for the car images 
                $car->update([
                    'cc' => $request->cc,
                    'color_code' => $request->color_code,
                    'image' => $image_stored_path,
                ]);

                // Create a new record for the car colors 
                $car_color->update([ 
                    'code' => $request->color_code,
                    'evoxcode' => $request->evoxcode,
                    'name' => $request->name,
                    'rgb1' => $request->rgb1,
                    'simple' => $request->simple,
                ]);
            return back()->with('flash_success','Car Images & Colors Updated successfully');
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
    public function destroyCarImages($id)
    {
     
        try {
            $car_image = CarImage::find($id);
            if(file_exists(url($car_image->image))){
                unlink(url($car_image->image));
            }
            CarColor::where('vif',$car_image->car_id)->where('code',$car_image->color_code)->delete();
            $car_image->delete();

            return back()->with('flash_sucess', 'Car Images deleted successfully');
        } 
        catch (Exception $e) {
            return back()->with('flash_error', 'Car Images Not Found');
        }   
    }

}