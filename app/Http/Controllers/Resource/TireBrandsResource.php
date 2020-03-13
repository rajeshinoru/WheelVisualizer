<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TireBrand;

class TireBrandsResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $brands = TireBrand::orderBy('created_at','desc')->paginate(10);
            return view('admin.brands.index', compact('brands'));
        } catch (\Throwable $th) {
            return back()->with('flash_error', 'Oops Something went wrong. Please try again later');
        }
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
        $this->validate($request, [
            'manufacture'   =>  'required|max:255',
            'description'   =>  'required',
            'logo'          =>  'required|image|mimes:jpeg,bmp,png|max:500000', 
            'banner'        =>  'required|image|mimes:jpeg,bmp,png|max:500000',
        ]);
        try {
            $brand = new TireBrand;
            $brand->manufacturer = $request->manufacture;
            $brand->manudesc = $request->description;
            if($request->has('logo'))
                $brand->manulogo = $request->logo->store('manufacture_logo');            
            if($request->has('banner'))
                $brand->manubanner = $request->banner->store('manufacture_banner');
            $brand->save();
            
            return back()->with('flash_success', 'Brand added successfully');
        } catch (\Throwable $th) {
            return back()->with('flash_error', 'Oops!... Unable to add brand.');
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
        $this->validate($request, [
            'manufacture'   =>  'required|max:255',
            'description'   =>  'required'
        ]);
        try {
            $brand = TireBrand::find($id);
            $brand->manufacturer = $request->manufacture;
            $brand->manudesc = $request->description;
            if($request->has('logo'))
                $brand->manulogo = $request->logo->store('manufacture_logo');            
            if($request->has('banner'))                
                $brand->manubanner = $request->banner->store('manufacture_banner');            
            $brand->save();
            return back()->with('flash_success', 'Brand Updated Successfully');
        } catch (\Throwable $th) {
            return back()->with('flash_error', 'Oops!... Unable to update brand');
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
            TireBrand::find($id)->delete();   
            return back()->with('flash_success', 'Brand deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('flash_error', 'Unable to delete brand. Please try again later');
        }        
    }
}
