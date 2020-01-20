<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wheel;
use Exception;
use Illuminate\Support\Facades\Storage;

class WheelResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wheels = Wheel::select('id','part_no','brand','style','image','wheeltype','wheeldiameter','wheelwidth')->paginate(10); 
        $brands = Wheel::select('brand')->distinct('brand')->get();
        return view('admin.wheel.index',compact('wheels','brands'));
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
        // dd($request->all());
        $this->validate($request, [
            // 'year' => 'required|max:255',
            'brand' => 'required|max:255', 
            'wheeltype' => 'required|max:255',
            'part_no' => 'required|unique:wheels,part_no',
            'style' => 'required|max:255',
            'wheeltype' => 'required|max:255',
            'wheeldiameter' => 'required|max:255',
            'wheelwidth' => 'required|max:255',
            'image' => 'required|mimes:jpg,png|max:5242880', 
            'front_back_image' => 'required|mimes:png|max:5242880', 
        ]);
        try{  

            $imagename = $request->image->getClientOriginalName();  
            $split_name = explode('.', $imagename);

            $front_back_image = $split_name[0].'.png';
            $request->image->move(public_path('/storage/wheels'), $imagename);
            $request->front_back_image->move(public_path('/storage/wheels/front_back'), $front_back_image);  

            $wheel  = Wheel::create([
                // 'year' => $request->year,
                'brand' => $request->brand,
                'wheeltype' => $request->wheeltype, 
                'part_no' => $request->part_no, 
                'style' => $request->style, 
                'wheeltype' => $request->wheeltype, 
                'wheeldiameter' => $request->wheeldiameter, 
                'wheelwidth' => $request->wheelwidth, 
                'image' => 'storage/wheels/'.$imagename,
                'frontimage' => 'storage/wheels/front_back/'.$front_back_image,
                'rearimage' => 'storage/wheels/front_back/'.$front_back_image
            ]);
            return back()->with('flash_success','Wheel Added successfully');
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
        try {
            
            $wheel = Wheel::find($id);
            return response()->json(['status' => true,'data'=>$wheel]); 
        } catch (Exception $e) {
            return response()->json(['status' => fasle,'data'=>$wheel]); 
        }
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
        $this->validate($request, [
            // 'year' => 'required|max:255',
            'brand' => 'required|max:255', 
            'wheeltype' => 'required|max:255',
            'part_no' => 'required|max:255',
            'style' => 'required|max:255',
            'wheeltype' => 'required|max:255',
            'wheeldiameter' => 'required|max:255',
            'wheelwidth' => 'required|max:255',
            // 'image' => 'required|mimes:jpg,png|max:5242880', 
            // 'front_back_image' => 'required|mimes:png|max:5242880', 
        ]);
        try{  
            if($request->hasFile('image') && $request->hasFile('front_back_image') ){
                $imagename = $request->image->getClientOriginalName();  
                $split_name = explode('.', $imagename);
                $front_back_image = $split_name[0].'.png';
                $request->image->move(public_path('/storage/wheels'), $imagename);
                $request->front_back_image->move(public_path('/storage/wheels/front_back'), $front_back_image);  
            }

            $wheel  = Wheel::whereid($id)->first();
            // $wheel->year = $request->year;
            $wheel->brand = $request->brand;
            $wheel->wheeltype = $request->wheeltype; 
            $wheel->part_no = $request->part_no; 
            $wheel->style = $request->style; 
            $wheel->wheeltype = $request->wheeltype; 
            $wheel->wheeldiameter = $request->wheeldiameter; 
            $wheel->wheelwidth = $request->wheelwidth;  
            if($request->hasFile('image') && $request->hasFile('front_back_image') ){
                $wheel->image = $imagename;
                $wheel->frontimage = $front_back_image;
                $wheel->rearimage = $front_back_image;
            }
            $wheel->save(); 

            return back()->with('flash_success','Wheel Updated successfully');
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
            Wheel::find($id)->delete();
            return back()->with('flash_sucess', 'Wheel deleted successfully');
        } 
        catch (Exception $e) {
            return back()->with('flash_error', 'Wheel Not Found');
        }
    }
}
