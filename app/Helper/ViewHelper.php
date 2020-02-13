<?php

use App\Wheel; 
use App\Viflist;
use App\Tire;
use App\Vehicle;
use App\WheelProduct;

//// All Wheel Brands
function wheelbrands($splitarray = '') {
	$wheels = Wheel::select('brand');
	if($splitarray){
		if($splitarray == 3 || $splitarray == 4)
	 		$wheels = array_chunk($wheels->addSelect('image','style','wheeldiameter')->inRandomOrder()->get()->unique('brand')->toArray(), $splitarray); 
	 	else
	 		$wheels = array_chunk($wheels->addSelect('brand','style')->inRandomOrder()->take(10)->get()->unique('brand')->toArray(), $splitarray); 
	}
 	else
		$wheels = $wheels->get()->unique('brand');
 	return $wheels; 
} 

///// Wheel front and back image path 
function front_back_path($imgPath){ 
	$imageArray = explode('/', $imgPath);
	$imageArrayname = explode('.', end($imageArray));  
	if($imageArray != null){
		return 'storage/wheels/front_back/'.current($imageArrayname).'.png';
	}else{
		return $imgPath;
	}
}


function ViewImage($url=''){
	if($url != ''){
		if(file_exists(public_path('/storage/'.$url))){
			return asset('/storage/'.$url);
		}else{
			return asset('image/no_image.jpg');
		}
	}else{
			return asset('image/no_image.jpg');
	}

}
function ViewBenefitImage($url=''){
	if($url != ''){
		if(file_exists(public_path('/storage/tires/models/'.$url))){
			return asset('/storage/tires/models/'.$url);
		}else{
			return asset('/storage/tires/models/Checkmark.png');
		}
	}else{
			return asset('/storage/tires/models/Checkmark.png');
	}

}
function ViewProductImage($url=''){
	if($url != ''){
		if(file_exists(public_path('/storage/tires/models/'.$url))){
			return asset('/storage/tires/models/'.$url);
		}else{
			return asset('image/no_image.jpg');
		}
	}else{
			return asset('image/no_image.jpg');
	}

}
// Rim size to Wheel Diameter Conversion
function getRimToWheelDiameter($rimSize=''){

		$rim = explode('x', $rimSize);
		$diameter = $rim[1]; 
        return $diameter;
}

function getMakeList(){

        $make = Viflist::select('make')->distinct('make')->orderBy('make','Asc')->pluck('make'); 
        return $make;
}

function getTireBrandList(){

        $tires = Tire::select('prodbrand')->distinct('prodbrand')->pluck('prodbrand')->toArray(); 
        sort($tires);
        return $tires;
}

function getTireWidthList(){
        $tires = Tire::select('tirewidth')->distinct('tirewidth')->pluck('tirewidth')->toArray(); 
        rsort($tires);
        return $tires;
}


// Discount Wheels - Products

// -------------> Shop By Size 
function getWheelDiameterList(){
        $wheels = WheelProduct::select('wheeldiameter')->distinct('wheeldiameter')->pluck('wheeldiameter')->toArray(); 
        rsort($wheels);
        return $wheels;
}
// -------------> Shop By Brand 
function getWheelBrandList(){

        $brand = WheelProduct::select('prodbrand')->distinct('prodbrand')->orderBy('prodbrand','Asc')->pluck('prodbrand'); 
        return $brand;
}
function ViewWheelProductImage($url=''){
	if($url != ''){
		if(file_exists(public_path($url))){
			return asset($url);
		}else{
			return asset('image/no_image.jpg');
		}
	}else{
			return asset('image/no_image.jpg');
	}

}

function getVehicleMakeList(){

        $make = Vehicle::select('make')->distinct('make')->orderBy('make','Asc')->pluck('make');
        return $make;
}


function embedYoutube($url){
	return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$url);
}

function random_strings($length_of_string) 
{ 
  
    // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
} 

function upload_file($path,$image,$sting_length){
	$imagename =random_strings($sting_length).'.png';
    $image->getClientOriginalName();
    $image->move(public_path($path),$imagename);
    return $path.$imagename;
}