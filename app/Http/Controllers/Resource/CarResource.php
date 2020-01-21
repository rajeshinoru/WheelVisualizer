<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wheel;
use App\CarImage;
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
        $cars = Viflist::with('CarImages')->paginate(10); 
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
        //
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
        //
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
