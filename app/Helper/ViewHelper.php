<?php

use App\Wheel; 
use App\Viflist;
use App\Tire;
use App\Vehicle;

//// All Wheel Brands
function wheelbrands($splitarray = '') {
	$wheels = Wheel::select('brand');
	if($splitarray){
		if($splitarray == 3 || $splitarray == 4)
	 		$wheels = array_chunk($wheels->addSelect('image','style','wheeldiameter')->inRandomOrder()->take($splitarray*5)->get()->unique('brand')->toArray(), $splitarray); 
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
function getVehicleMakeList(){

        $make = Vehicle::select('make')->distinct('make')->orderBy('make','Asc')->pluck('make');
        return $make;
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