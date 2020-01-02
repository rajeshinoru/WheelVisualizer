<?php

use App\Wheel; 


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