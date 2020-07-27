<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class ZipcodeController extends Controller
{
    
    public static function getZipcodesByRadius($zipcode,$miles=150){ 
    	$url = "https://zipcodedownload.com/Radius?firstzipcode=".$zipcode."&radiuscoverage=".$miles."&format=json&key=DEMOAPIKEY";
        $response = Curl::to($url)->get();
        // dd($response);
        $data=[];
        if($response != false){

            $data = collect(json_decode($response));
            $data = $data->pluck('ZipCode','Distance'); 
        }
        // dd($data);
        return $data;
    }


    public static function getCityState($data){

        $url = "http://production.shippingapis.com/ShippingApi.dll?API=CityStateLookup&XML=%3CCityStateLookupRequest%20USERID=%22502THEWH6849%22%3E%3CZipCode%20ID=%220%22%3E%3CZip5%3E".$data['zipcode']."%3C/Zip5%3E%3C/ZipCode%3E%3C/CityStateLookupRequest%3E";

        /**** Sample Reponse


        """
        <?xml version="1.0" encoding="UTF-8"?>
        <CityStateLookupResponse>
            <ZipCode ID="0">
                <Zip5>20024</Zip5>
                <City>WASHINGTON</City>
                <State>DC</State>
            </ZipCode>
        </CityStateLookupResponse>
        """

        ***/




        $response = Curl::to($url)->get();

        return $response;
    }
}
