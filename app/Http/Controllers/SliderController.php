<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('admin.slider.index',compact('sliders'));
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
            'image'=>'required', 
            'title'=>'max:255',
            'description'=>'max:255',
            'page'=>'required|max:255',
            'order'=>'required|max:255',
        ]);
        try{  

                $data = $request->except(['_token']); 

                $slider = Slider::create($data);  
                
                if($request->image){
                    $slider->image = $request->image->store('sliders');
                }

                $slider->save();

                return back()->with('success','Slider Created Successfully!!');

            }catch(Exception $e){
                return back()->withInput(Input::all())->with('error',$e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        // dd($post,$request->all());

        $this->validate($request, [ 
            // 'image'=>'required', 
            'title'=>'max:255',
            'description'=>'max:255',
            'page'=>'required|max:255',
            'order'=>'required|max:255',
        ]);
        try{   
                
                $data = $request->except(['_token']); 

                $slider->fill($data);  

                // dd($slider);
                if(@$request->image){
                    $slider->image = $request->image->store('sliders');
                }
                
                $slider->save();

                return back()->with('success','Slider Updated Successfully!!');

            }catch(Exception $e){
                return back()->withInput(Input::all())->with('error',$e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try{  
            
            $post->delete();

            return back()->with('success','Post Deleted Successfully!!');

        }catch(Exception $e){
            return back()->withInput(Input::all())->with('error',$e->getMessage());
        }
    }
}
