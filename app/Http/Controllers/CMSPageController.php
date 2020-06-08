<?php

namespace App\Http\Controllers;

use App\CMSPage;
use Illuminate\Http\Request;

class CMSPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = CMSPage::paginate(10);
        return view('admin.cms.index',compact('pages'));
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
            'title'=>'required|max:255',
            'content'=>'required|min:1', 
            'routename'=>'required|min:1', 
        ]);
        try{  

                $data = $request->except(['_token']);
                $data['pagecategory']='topnav';

                $post = CMSPage::create($data);  
                  
                return back()->with('success','Page Created Successfully!!');

            }catch(Exception $e){
                return back()->withInput(Input::all())->with('error',$e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CMSPage  $cMSPage
     * @return \Illuminate\Http\Response
     */
    public function show(CMSPage $cMSPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CMSPage  $cMSPage
     * @return \Illuminate\Http\Response
     */
    public function edit(CMSPage $cMSPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CMSPage  $cMSPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'title'=>'required|max:255',
            'content'=>'required|min:1', 
            'routename'=>'required|min:1', 
        ]);
        try{  
            
                $data = $request->except(['_token']); 

                $page = CMSPage::find($id);
                $page->update($data);  
                  
                return back()->with('success','Page Updated Successfully!!');

            }catch(Exception $e){
                return back()->withInput(Input::all())->with('error',$e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CMSPage  $cMSPage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{  
            
            $cMSPage = CMSPage::find($id); 
            $cMSPage->delete();

            return back()->with('success','Page Deleted Successfully!!');

        }catch(Exception $e){
            return back()->withInput(Input::all())->with('error',$e->getMessage());
        }
        //
    }
}
