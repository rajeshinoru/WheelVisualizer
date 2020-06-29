<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use Auth;
class UserController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('user.dashboard');
    }	

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }	

    public function orders()
    { 

        $user = User::find(Auth::user()->id);
        $orders = $user->Orders()->paginate(10);
        // dd($orders);

        return view('user.orders',compact('user','orders'));
    }
 
    
    public function guest()
    { 
        return view('user.dashboard');
    }   

}
