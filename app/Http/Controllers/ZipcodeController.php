<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class ZipcodeController extends Controller
{
    
    public static function getZipcodesByRadius($zipcode){
    	$miles = 50;
    	$url = "https://zipcodedownload.com/Radius?firstzipcode=".$zipcode."&radiuscoverage=".$miles."&format=json&key=DEMOAPIKEY";
        $response = Curl::to($url)->get();
        // dd($response);
        $data=[];
        if($response != false){

            $data = collect(json_decode($response));
            $data = $data->pluck('ZipCode'); 
        }
        return $data;
    }
}
