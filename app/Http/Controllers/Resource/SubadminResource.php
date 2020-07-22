<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\SubAdminRole;
use Hash;
class SubadminResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subadmins = Admin::where('is_super',0)->orderBy('id','DESC')->paginate(10);
        return view('admin.subadmin.index',compact('subadmins'));
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

        try {
            $data = $request->all(); 

            $readData = array_keys($data['read']??[])??array();
            $writeData = array_keys($data['write']??[])??array();

            $admin  = Admin::create([ 
                'name' => $request->name,
                'email' => $request->email,
                'phone' => @$request->phone, 
                'password' => Hash::make('123456'),
            ]);

            if($admin){
                $role = SubAdminRole::create([
                    'adminid'=>$admin->id,
                    'read'=>json_encode($readData??array()),
                    'write'=>json_encode($writeData??array()),
                ]);
            }

            return back()->with('flash_success','Subadmin Successfully Created');
        } catch (Exception $e) {
            return back()->with('flash_error','Subadmin Creation failed!!');
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
        try {
            $admin = Admin::with('Roles')->where('is_super',0)->find($id);
            $data = $request->all(); 

            $readData = array_keys($data['read'])??array();
            $writeData = array_keys($data['write'])??array();


            if($admin){
                if($admin->Roles){

                    $role = $admin->Roles->update([
                        'adminid'=>$admin->id,
                        'read'=>json_encode($readData),
                        'write'=>json_encode($writeData),
                    ]);
                }else{

                    $role = SubAdminRole::create([
                        'adminid'=>$admin->id,
                        'read'=>json_encode($readData),
                        'write'=>json_encode($writeData),
                    ]);
                }
            }

            if($admin){

                $admin  = $admin->update([
                    'name' => $request->name, 
                    'email' => $request->email,
                    'phone' => @$request->phone, 
                ]);
                return back()->with('flash_success','Subadmin Details Updated');
            }else{
                return back()->with('flash_error','Subadmin Details not found!!');
            }
        } catch (Exception $e) {
            return back()->with('flash_error','Subadmin Updation failed!!');
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
        try{  
            // dd($id);
            $admin = Admin::where('is_super',0)->find($id);
            $admin->delete();

            return back()->with('success','Admin  Deleted Successfully!!');

        }catch(Exception $e){
            return back()->withInput(Input::all())->with('error',$e->getMessage());
        }
    }
}
