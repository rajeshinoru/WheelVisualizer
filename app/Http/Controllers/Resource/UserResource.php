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
        $user  = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => @$request->phone, 
            'password' => Hash::make('123456'),
        ]);
        return back()->with('flash_success','Successfully Created');
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
            $user = User::find($id);
            if($user){

                $user  = $user->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'phone' => @$request->phone, 
                ]);
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
