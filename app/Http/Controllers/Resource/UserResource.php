<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
class UserResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(10);
        return view('admin.user.index',compact('users'));
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
            'fname'=>'required|max:255',
            'lname'=>'required|min:1', 
            'email'=>'required|email', 
        ]);

        try {  

            $data = $request->all(); 
            // dd($data,$request->profileimage);
            $data['password'] = Hash::make('123456');

            if($request->profileimage){
                $data['profileimage'] = $request->profileimage->store('userprofile'); 
            }
                
            $user  = User::create($data);
            if($user){
                return back()->with('flash_success','User Added Successfully');
            }else{
                return back()->with('flash_error','User cannot be added!!');
            }
        } catch (Exception $e) {
            return back()->with('flash_error','User add failed!!');
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
            'fname'=>'required|max:255',
            'lname'=>'required|min:1', 
            'email'=>'required|email', 
        ]);

        try {
            $user = User::find($id);
            if($user){
                $data = $request->all(); 
                if($request->profileimage){
                    $data['profileimage'] = $request->profileimage->store('userprofile'); 
                }
                
                $user  = $user->update($data);
                
                return back()->with('flash_success','User Details Updated');
            }else{
                return back()->with('flash_error','User Details not found!!');
            }
        } catch (Exception $e) {
            return back()->with('flash_error','User Updation failed!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{  
            
            $user->delete();

            return back()->with('success','User  Deleted Successfully!!');

        }catch(Exception $e){
            return back()->withInput(Input::all())->with('error',$e->getMessage());
        }
    }
}
