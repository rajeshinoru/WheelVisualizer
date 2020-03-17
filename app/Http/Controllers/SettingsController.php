<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Setting;
class SettingsController extends Controller
{

    public function index($category='setting')
    {
        if($category != 'setting'){

            return view('admin.cms.'.$category);
        }else{

            return view('admin.cms.setting');
        }

    }

    public function store(Request $request,$category='setting')
    {

        if($category == 'home'){

            $this->validate($request,[
                'homepage_content1' => 'required',
                'homepage_content2' => 'required',
            ]);

            Setting::set('homepage_content1', $request->homepage_content1);
            Setting::set('homepage_content2', $request->homepage_content2);

        }else{

            $this->validate($request,[
                'site_title' => 'required',
                'site_contact' => 'required',
                'site_email' => 'required',
                'site_logo' => 'mimes:jpg,jpeg,png',
            ]);
            Setting::set('site_title', $request->site_title);
            Setting::set('site_contact', $request->site_contact);
            Setting::set('site_email', $request->site_email);
            Setting::set('header_content', $request->header_content);
            Setting::set('footer_content', $request->footer_content);
            if($request->has('site_logo'))
                Setting::set('site_logo', upload_file('storage/admin/site/',$request->site_logo,10)); 

        }

        Setting::save();
        
        return back()->with('flash_success','Settings Updated Successfully');

    }

}
