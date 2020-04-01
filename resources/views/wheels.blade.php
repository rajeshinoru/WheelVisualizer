@extends('layouts.app')

@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{asset('choosen/css/chosen.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">
@endsection
@section('content')

<style>
.modal_canvas{
    min-height: 427px !important;
}
.col-sm-12.wheel-des p
{
    font-family: poppins !important;
    font-size: 12px !important;
    line-height: 30px !important;
    color: #000 !important;
    margin: 0px 0px !important;
    text-align:justify;
}
.col-sm-12.wheel-des b a
{
  font-size: 12px !important;
  font-family: Montserrat !important;
  color: #0e1661 !important;
}
.wheel-des
{
    padding: 20px 20px !important;
}
</style>
<?php

    // $widthArray = array(
    //     'Audi'=>array('width'=>'84px','top'=>'41.7%','left'=>'40%'),
    // );

?>

@if(@$car_images->CarViflist->yr == "2020"  && @$car_images->CarViflist->make =="Acura"  && @$car_images->CarViflist->model =="MDX"  )
<style type="text/css">
.front img {
width: 78px;
top: 46.5%;
left: 39%;
transform: perspective(0px) rotateY(40deg);
}
.back img{
width: 63px;
top: 46%;
left: 70.9%;
transform: perspective(405px) rotateY(54deg);
}
</style>
@endif

@if(@$car_images->CarViflist->yr == "2019"  && @$car_images->CarViflist->make =="Acura"  && @$car_images->CarViflist->model =="TLX"  )
<style type="text/css">
.front img {
    width: 69px;
    top: 45.5%;
    left: 39%;
    transform: perspective(0px) rotateY(37deg);

}
.back img{
    width: 61px;
    top: 44%;
    left: 70.9%;
    transform: perspective(405px) rotateY(54deg);
}
</style>
@endif

@if(@$car_images->CarViflist->yr == "2019"  && @$car_images->CarViflist->make =="Volvo"  && @$car_images->CarViflist->model =="S90"  )
<style type="text/css">
.front img {
    width: 68px;
    top: 45.7%;
    left: 37%;
    transform: perspective(0px) rotateY(44deg);

}
.back img{

    width: 53px;
    top: 44.5%;
    left: 70.7%;
    transform: perspective(405px) rotateY(57deg);
}
</style>
@endif

<!-- BAnner Down Sestion Start -->
<section id="produst">
    <div class="container pro">
        <div class="row">
            <div class="col-sm-12 sub-head">
                <h1>{{implode(', ',json_decode(base64_decode(@Request::get('brand')?:''))?:[])}} Wheels</h1>
            </div>
        </div>


            <div class="row main-pro">
                <div class="col-sm-3">
                    <div class="header-bottom col-sm-12">
                        <aside id="header-bottom">
                            <div class="main-category-list left-main-menu">
                                <div class="cat-menu">
                                    <div class="OT-panel-heading active">ACCESSORIES</div>
                                    <div class="menu-category-" style="display: block;">
                                        <ul class="dropmenu">
                                            <li class="OT-Sub-List dropdown">
                                                <select class="form-control chosen-select Make" name="make">
                                                    <option disabled selected>Select Make</option>

                                                    @foreach(getMakeList() as $make)
                                                        <option value="{{$make}}" {{(@$car_images->CarViflist)?((@$car_images->CarViflist->make == $make)?'selected':''):''}}
                                                        >{{$make}}</option>
                                                    @endforeach

                                                </select>
                                            </li>
                                           <li class="OT-Sub-List dropdown">
                                                <select class="form-control chosen-select Year" name="year">
                                                    <option value="" disabled selected>Select Year</option>
                                                    @if(@$car_images->CarViflist)
                                                    <option value="{{@$car_images->CarViflist->yr}}" selected="">{{@$car_images->CarViflist->yr}}</option>
                                                    @endif
                                                </select>
                                            </li>
                                            <li class="OT-Sub-List dropdown">
                                                <select class="form-control chosen-select Model" name="model">
                                                    <option disabled selected>Select Model</option>
                                                    @if(@$car_images->CarViflist)
                                                    <option value="{{@$car_images->CarViflist->model}}" selected="">{{@$car_images->CarViflist->model}}</option>
                                                    @endif
                                                </select>
                                            </li>

                                            <li class="OT-Sub-List dropdown">
                                                <select class="form-control chosen-select DriveBody" name="drivebody">
                                                    <option disabled selected>Select Drive/Body</option>
                                                    @if(@$car_images->CarViflist)
                                                    <option value="{{@$car_images->CarViflist->vif}}" selected="">{{@$car_images->CarViflist->whls}} {{@$car_images->CarViflist->drs}} {{@$car_images->CarViflist->body}}</option>
                                                    @endif
                                                </select>
                                            </li>
                                            {{--<li class="OT-Sub-List dropdown">
                                                <select class="form-control chosen-select SubModel" name="subodel">
                                                    <option disabled selected>Select Sub Model</option>
                                                </select>
                                            </li>
                                            <li class="OT-Sub-List dropdown">
                                                <select class="form-control chosen-select Size" name="size">
                                                    <option disabled selected>Select Size</option>
                                                </select>
                                            </li>--}}

                                    </ul>
                                </div>
                            </div>
                        </aside>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="price-heading">SIZE</div>
                                <!--  -->
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a  role="button" data-toggle="collapse" data-parent="#accordion-DISABLED" href="#collapseOne" class="{{(@Request::get('diameter'))?'':'collapsedDISABLED'}}" aria-expanded="{{(@Request::get('diameter'))?'true':'false'}}" aria-controls="collapseOne">
                                                    Diameter
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($wheeldiameter as $diameter)
                                                    <li><input type="checkbox" name="wheeldiameter[]" class="wheeldiameter" value="{{$diameter->wheeldiameter}}" @if(in_array($diameter->wheeldiameter,json_decode(base64_decode(@Request::get('diameter')?:''))?:[])) checked @endif> {{$diameter->wheeldiameter.'('.$diameter->total.')'}}
                                                    </li>
                                                    @empty
                                                    <li><input type="checkbox" name="wheeldiameter[]" value=""> 13</li>
                                                    <li><input type="checkbox" name="wheeldiameter[]" value=""> 20</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion-DISABLED" href="#collapseTwo" class="{{(@Request::get('width'))?'':'collapsedDISABLED'}}" aria-expanded="{{(@Request::get('width'))?'true':'false'}}" aria-controls="collapseTwo">
                                                  Width
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($wheelwidth as $width)
                                                    <li><input type="checkbox" name="wheelwidth[]" class="wheelwidth" value="{{$width->wheelwidth}}" @if(in_array($width->wheelwidth,json_decode(base64_decode(@Request::get('width')?:''))?:[])) checked @endif> {{$width->wheelwidth.'('.$width->total.')'}} </li>
                                                    @empty
                                                    <li><input type="checkbox" name="wheelwidth[]" value=""> 7</li>
                                                    <li><input type="checkbox" name="wheelwidth[]" value=""> 8</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion-DISABLED" href="#collapseThree" class="{{(@Request::get('brand'))?'':'collapsedDISABLED'}}" aria-expanded="{{(@Request::get('brand'))?'true':'false'}}" aria-controls="collapseThree">
                                                    Brand
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @forelse($brands as $brand)
                                                    <li><input type="checkbox" name="brand[]" class="brand" value="{{$brand->brand}}" @if(in_array($brand->brand,json_decode(base64_decode(@Request::get('brand')?:''))?:[])) checked @endif> {{$brand->brand.'('.$brand->total.')'}}
                                                    </li>
                                                    @empty
                                                    <li><input type="checkbox" name="brand[]" value=""> 7</li>
                                                    <li><input type="checkbox" name="brand[]" value=""> 8</li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            <div class="col-sm-9 col-sm-9 main-pro-inner">
                <div class="row">
                    @forelse($Wheels as $key => $wheel)
                    <div class="col-sm-4">
                        <div class="product-layouts">
                            <div class="product-thumb transition">
                                <div class="image">
                                    <img class="wheelImage image_thumb" src="{{asset($wheel->image)}}" title="{{$wheel->brand}}" alt="{{$wheel->brand}}">
                                    <img class="wheelImage image_thumb_swap" src="{{asset($wheel->image)}}" title="{{$wheel->brand}}" alt="{{$wheel->brand}}">
                                    <div class="sale-icon"><a>Sale</a></div>
                                </div>

                                <div class="thumb-description">
                                    <div class="caption">
                                        <h4><a href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($wheel->brand)))}}">{{$wheel->style}} <br> {{'Diameter : '.$wheel->wheeldiameter}} </a></h4>
                                        <!-- <h6><a href="">Accessories</a></h6> -->
                                        <!-- <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star off fa-stack-2x"></i></span>
                                            </div> -->
                                        <br>
                                        <!-- <div class="price">
                                                <span class="price-new">$104.00</span> <span class="price-old">$1,202.00</span>
                                                <span class="price-tax">Ex Tax: $85.00</span>
                                            </div> -->
                                        @if($car_images)
                                        <button class="btn btn-primary {{(!file_exists(front_back_path($wheel->image)))?'disabled':''}}" {{(!file_exists(front_back_path($wheel->image)))?'':'data-toggle=modal'}} data-target="#myModal{{$key}}" onclick="getWheelPosition('{{$key}}')" >See On Your Car</button>
                                        @endif
                                    </div>
                                    <div class="button-group">
                                        <button class="btn-cart" type="button" title="Add to Cart" onclick="cart.add('46');"><i class="fa fa-shopping-cart"></i>
                                            <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                        </button>
                                        <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('46');"><i class="fa fa-heart"></i>
                                            <span title="Add to Wish List">Add to Wish List</span>
                                        </button>
                                        <button class="btn-compare" title="Add to compare" onclick="compare.add('46');"><i class="fa fa-exchange"></i>
                                            <span title="Add to compare">Add to compare</span>
                                        </button>

                                        <button class="btn-quickview" type="button" title="Quick View"> <i class="fa fa-eye"></i>
                                            <span>Quick View</span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($car_images)
                    <!-- Model Car Start -->

                    <div class="modal fade" id="myModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        @if(@$car_images->CarViflist)
                                        {{@$car_images->CarViflist->yr}} -
                                        {{@$car_images->CarViflist->make}} -
                                        {{@$car_images->CarViflist->model}} -
                                        {{@$car_images->CarViflist->whls}}
                                        {{@$car_images->CarViflist->drs}}
                                        {{@$car_images->CarViflist->body}} 
                                        @else
                                        Your Car
                                        @endif
                                    </h4>
                                </div>
                                <div class="modal-body">    
                                    <div class="row main-model-body" >
                                        <div class="col-sm-8 model-car modal_canvas" id="modal_canvas_{{$key}}">

                                            <img id="car_image_{{$key}}" class="car_image_{{$key}} car_image_responsive" src="{{asset($car_images->image)}}" data-imagename="{{$car_images->image}}">

                                        </div>
                                        @if(file_exists(front_back_path($wheel->image)))
                                        <div class="car-wheel">
                                            <div class="front" >
                                                <img class="frontimg" src="{{front_back_path($wheel->image)}}" id="image-diameter-front-{{$key}}" >
                                            </div>
                                            <div class="back">
                                                <img src="{{front_back_path($wheel->image)}}" id="image-diameter-back-{{$key}}">
                                            </div>
                                        </div>
                                        @endif



                                    </div>

                                    <div class="row model-car-body">

                                        <div class="col-sm-4">
                                            <h1 class="model-car">Vechicle Color</h1>
                                            <ul class="list-color">
                                                @if(@$car_images->CarColor()->count() > 0)
                                                @foreach(@$car_images->CarColor()->get()->unique('rgb1') as $key1 => $color)
                                                @if(strlen($color->rgb1) ==6)
                                                <li class="color-radius car_color {{($color->code ==$car_images->color_code )?'color-selected':''}}" style="background:#{{$color->rgb1}};" title="{{$color->name}}" data-code="{{$color->code}}" data-vif="{{$color->vif}}"></li>
                                                @endif
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <h1 class="model-car">Wheel Diameter</h1>
                                            <button class="model-button diameter-up" data-id="{{$key}}">Zoom In</button>
                                            <button class="model-button diameter-down" data-id="{{$key}}">Zoom Out</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <h1 class="model-car">Share :</h1>
                                            <ul class="model-list-unstyled">
                                                <li class="facebook">
                                                    <a target="_blank" class="_blank" href="#" title="Facebook">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="twitter">
                                                    <a target="_blank" class="_blank" href="#" title="Twitter">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>

                                                <li class="google-plus">
                                                    <a target="_blank" class="_blank" href="#" rel="publisher" title="Google Plus">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                                <li class="pinterest">
                                                    <a target="_blank" class="_blank" href="#" rel="publisher" title="pinterest">
                                                        <i aria-hidden="true" class="fa fa-pinterest-p"></i>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Model Car End -->
                    @endif
                    @empty
                    {{'Not Found'}}
                    @endforelse
                    {{$Wheels->appends(['diameter' => @Request::get('diameter'),'width' => @Request::get('width'),'brand' => @Request::get('brand'),'car_id' => @Request::get('car_id'),'page' => @Request::get('page')])->links()}}
                </div>
            </div>
        </div>
      </div>
      </div>
    </section>

<script type="text/javascript">
    function imgSize(key){
        var myImg = document.querySelector("#car_image_"+key);
        var realWidth = myImg.naturalWidth;
        var realHeight = myImg.naturalHeight;
        alert("Original width=" + realWidth + ", " + "Original height=" + realHeight);
    }
    function getWheelPosition(key){ 
        // console.log(img.naturalWidth);
        // imgSize(key);
        // alert($('#car_image_'+key).width());
        imagePath = "{{public_path()}}/"+$('#car_image_'+key).attr('data-imagename');
        // alert(imagePath)
        // alert(imagePath);
        // console.log("python3 {{public_path().'/js/detect-wheel.py'}}");
        // var regex = new RegExp(); 
        // var res = regex.exec("python3 {{public_path().'/js/detect-wheel.py'}}");
        // console.log(res);
        $.ajax({url: "/runPython",data:{'image':imagePath}, success: function(result){
            setWheelPosition(JSON.parse(result),key);
        }});
    }
    function setWheelPosition(coordinates,key){
        // console.log(coordinates);
        var x = coordinates[0][0];
        var y = coordinates[0][1];
        var r = coordinates[0][2];
        var w = coordinates[1];
        var h = coordinates[2];
        var front = $('#image-diameter-front-'+key);
        front.css('left',x-r+'px');
        front.css('top',y-r+'px');
        
    }

// function LoadCar(id) {
//     let imgElement = document.getElementById('car_image_'+id);
//         let image = cv.imread(imgElement);
//         console.log('CarCanvas_'+id)
//         cv.imshow('CarCanvas_'+id, image);
//         let srcMat = cv.imread('CarCanvas_'+id);
//         let displayMat = srcMat.clone();
//         let gaussMat = srcMat.clone();
//         let circlesMat = new cv.Mat();

//         cv.cvtColor(srcMat, srcMat, cv.COLOR_RGBA2GRAY);
        
//         cv.GaussianBlur( srcMat, gaussMat,{width : 9, height : 9}, 2, 2 );
//         // cv.HoughCircles(srcMat, circlesMat, cv.HOUGH_GRADIENT, 1, 45, 75, 40, 0, 0);
//         cv.HoughCircles(srcMat, circlesMat, cv.HOUGH_GRADIENT, 1, 45, 75, 40, 0, 0);

//         for (let i = 0; i < circlesMat.cols; ++i) {
//             let x = circlesMat.data32F[i * 3];
//             let y = circlesMat.data32F[i * 3 + 1];
//             let radius = circlesMat.data32F[i * 3 + 2];
//             console.log(x,y)
//             let center = new cv.Point(x, y);
//             cv.circle(displayMat, center, radius, [0, 255, 250, 255], 3);
//         }

//         cv.imshow('CarCanvas_'+id, gaussMat);

//         srcMat.delete();
//         displayMat.delete();
//         circlesMat.delete();  
// };



// function onOpenCvReady() {
//   document.body.classList.remove("loading");
// }


function trimCanvas(c) {
    var ctx = c.getContext('2d'),
        copy = document.createElement('canvas').getContext('2d'),
        pixels = ctx.getImageData(0, 0, c.width, c.height),
        l = pixels.data.length,
        i,
        bound = {
            top: null,
            left: null,
            right: null,
            bottom: null
        },
        x, y;
    
    // Iterate over every pixel to find the highest
    // and where it ends on every axis ()
    for (i = 0; i < l; i += 4) {
        if (pixels.data[i + 3] !== 0) {
            x = (i / 4) % c.width;
            y = ~~((i / 4) / c.width);

            if (bound.top === null) {
                bound.top = y;
            }

            if (bound.left === null) {
                bound.left = x;
            } else if (x < bound.left) {
                bound.left = x;
            }

            if (bound.right === null) {
                bound.right = x;
            } else if (bound.right < x) {
                bound.right = x;
            }

            if (bound.bottom === null) {
                bound.bottom = y;
            } else if (bound.bottom < y) {
                bound.bottom = y;
            }
        }
    }
    
    // Calculate the height and width of the content
    var trimHeight = bound.bottom - bound.top,
        trimWidth = bound.right - bound.left,
        trimmed = ctx.getImageData(bound.left, bound.top, trimWidth, trimHeight);

    copy.canvas.width = trimWidth;
    copy.canvas.height = trimHeight;
    copy.putImageData(trimmed, 0, 0);


    // Return trimmed canvas
    return copy.canvas;
}

function LoadImageToCanvas(key){
    var width = 520;//$("#car_image_"+key).width() ;
    var height = 520;//$("#car_image_"+key).height() ;

    var canvas = document.createElement('canvas');

    canvas.id = "CursorLayer";
    canvas.width = width;
    canvas.height = height;
    canvas.class = 'car_image_responsive';  
    canvas.style.zIndex = 0;
    canvas.style.position = "absolute";
    // canvas.style.border = "1px solid";
    var x = canvas.width / 2;
    var y = canvas.height / 2;
    canvas.translate(x, y);
    canvas.rotate(angleInRadians);
    canvas.drawImage(image, -width / 2, -height / 2, width, height);
    canvas.rotate(-angleInRadians);
    canvas.translate(-x, -y);

    var loc = document.getElementById("modal_canvas_"+key);
    loc.prepend(canvas);

    var ctx = canvas.getContext("2d");

    var car = document.getElementById("car_image_"+key);
    // var frontWheel = document.getElementById("image-diameter-front-"+key);
    // var backWheel = document.getElementById("image-diameter-back-"+key);

    ctx.drawImage(car, 0, 0,width,height);
    // ctx.drawImage(frontWheel,10 0,0,50,50);
    // ctx.drawImage(backWheel,300+100,250,100,100);

    $("#car_image_"+key).hide();
    // $("#image-diameter-front-"+key).hide();
    // $("#image-diameter-back-"+key).hide();

    // var trimmedCanvas = trimCanvas(ctx);
   
}

</script>

@endsection
@section('custom_scripts')
    <script src="{{ asset('js/ajax/jquery.min.js') }}"></script>
    <script src="{{ asset('choosen/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script  src="{{ asset('js/opencv/opencv-3.3.1.js') }}" async></script>


@endsection
