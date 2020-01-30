<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Setting;
class SettingsController extends Controller
{

    public function index()
    {
    	return view('admin.setting.index');

    }

    public function store(Request $request)
    {
    	$this->validate($request,[
                'site_title' => 'required',
                'site_contact' => 'required',
                'site_email' => 'required',
                'site_logo' => 'mimes:jpg,jpeg,png',
            ]);

        Setting::set('site_title', $request->site_title);
        Setting::set('site_contact', $request->site_contact);
        Setting::set('site_email', $request->site_email);
        if($request->has('site_logo'))
            Setting::set('site_logo', upload_file('storage/admin/site/',$request->site_logo,10)); 
        
        Setting::save();
        
        return back()->with('flash_success','Settings Updated Successfully');

    }
}
