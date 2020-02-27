<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tire;
use Exception;
use Illuminate\Support\Facades\Storage;

class TireResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tires = Tire::select('partno','prodtitle','prodbrand','prodmodel','prodimage','tiresize','tirewidth','tireprofile','tirediameter','speedrating','loadindex','ply','utqg','price','qtyavail','prodmetadesc','proddesc','id')->get()->unique('prodtitle');
        // dd($tires);
        $tires = MakeCustomPaginator($tires, $request, 10);
        return view('admin.tire.index',compact('tires'));
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
            'brand' => 'required|max:255', 
            'wheeltype' => 'required|max:255',
            'part_no' => 'required|unique:wheels,part_no',
            'style' => 'required|max:255',
            'finish' => 'required|max:255',
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
            $wheel = Tire::create($request->all());
            $wheel->image = 'storage/wheels/'.$imagename;
            $wheel->frontimage = 'storage/wheels/front_back/'.$front_back_image;
            $wheel->rearimage = 'storage/wheels/front_back/'.$front_back_image;
            $wheel->save();

            return back()->with('flash_success','Tire Added successfully');
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
            
            $wheel = Tire::find($id);
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
        // dd($request->all());
        $this->validate($request, [
            // 'year' => 'required|max:255',
            'brand' => 'required|max:255', 
            'wheeltype' => 'required|max:255',
            'part_no' => 'required',
            'style' => 'required|max:255',
            'finish' => 'required|max:255',
            'wheeldiameter' => 'required|max:255',
            'wheelwidth' => 'required|max:255',
            // 'image' => 'required|mimes:jpg,png|max:5242880', 
            // 'front_back_image' => 'required|mimes:png|max:5242880', 
            // 'image' => 'required|mimes:jpg,png|max:5242880', 
            // 'front_back_image' => 'required|mimes:png|max:5242880', 
        ]);
        try{   
            $data = request()->except(['_token','_method']);
            $wheel = Tire::whereid($id)->first();
            $wheel->update($data);
            if($request->hasFile('image') && $request->hasFile('front_back_image') ){
                // $imagename = $request->image->getClientOriginalName();  
                // $split_name = explode('.', $imagename);
                // $front_back_image = $split_name[0].'.png';
                // $request->image->move(public_path('/storage/wheels'), $imagename);
                // $request->front_back_image->move(public_path('/storage/wheels/front_back'), $front_back_image); 

                // $wheel->image = 'storage/wheels/'.$imagename;
                // $wheel->frontimage = 'storage/wheels/front_back/'.$front_back_image;
                // $wheel->rearimage = 'storage/wheels/front_back/'.$front_back_image; 
            } 
            $wheel->save(); 

            return back()->with('flash_success','Tire Updated successfully');
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
            Tire::find($id)->delete();
            return back()->with('flash_sucess', 'Tire deleted successfully');
        } 
        catch (Exception $e) {
            return back()->with('flash_error', 'Tire Not Found');
        }
    }

    public function getTiresByModel($id)
    {
        try {
            $tire = Tire::find(base64_decode($id));
            $tires = Tire::where('prodbrand',$tire->prodbrand)->where('prodmodel',$tire->prodmodel)->paginate(10);
            // dd($tires);
            return view('admin.tire.model',compact('tires','tire'));
        } 
        catch (Exception $e) {
            dd($e);
            return back()->with('flash_error', 'Tire Not Found');
        }
    }
}
