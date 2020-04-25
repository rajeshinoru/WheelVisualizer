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

.front img {
    width: 72px;
    position: absolute;
    content: '';
    top: 52%;
    left: 38.5%;
    bottom: 121%;
    right: 0;
    transform: perspective(0px) rotateY(37deg);
    object-fit: cover;
}
.back img {
    width: 45px;
    position: absolute;
    content: '';
    top: 54%;
    left: 69.9%;
    bottom: 0;
    right: 0;
    transform: perspective(405px) rotateY(54deg);
    object-fit: cover;
}
</style>

    @foreach(@$images as $key => $img )
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">    
                                    <div class="row main-model-body" >
                                        <div class="col-sm-8 model-car modal_canvas" id="modal_canvas_{{$key}}">
                                            <canvas id="CursorLayer{{$key}}"  ></canvas>
                                            <img id="car_image_{{$key}}" class="car_image_{{$key}} car_image_responsive" src="{{asset($img)}}">

                                        </div>
                                        <div class="car-wheel">
                                            <div class="front" >
                                                <img class="frontimg" src="{{asset('storage/wheels/front_back/Xcess_X03_BFS_XC4624299918_18.png')}}" id="image-diameter-front-{{$key}}" >
                                            </div>
                                            <div class="back">
                                                <img src="{{asset('storage/wheels/front_back/Xcess_X03_BFS_XC4624299918_18.png')}}" id="image-diameter-back-{{$key}}">
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

    @endforeach

<script type="text/javascript">
function LoadImageToCanvas(key){

    var car = document.getElementById("car_image_"+key);
    var width = car.width;//$("#car_image_"+key).width() ;
    var height = car.height;//$("#car_image_"+key).height() ;
    
    // var canvas = document.createElement('canvas');
    var canvas = document.getElementById("CursorLayer"+key);
    
    canvas.id = "CursorLayer"+key;
    canvas.width = width;
    canvas.height = height;
    canvas.class = 'car_image_responsive';  
    canvas.style.zIndex = 10;
    canvas.style.position = "relative";
    canvas.style.border = "1px solid";
    // var x = canvas.width / 2;
    // var y = canvas.height / 2;
    // canvas.translate(x, y);
    // canvas.rotate(angleInRadians);
    // canvas.drawImage(image, -width / 2, -height / 2, width, height);
    // canvas.rotate(-angleInRadians);
    // canvas.translate(-x, -y);

    var loc = document.getElementById("modal_canvas_"+key);
    loc.prepend(canvas);

    var ctx = canvas.getContext("2d");

    // var frontWheel = document.getElementById("image-diameter-front-"+key);
    // var backWheel = document.getElementById("image-diameter-back-"+key);

    ctx.drawImage(car, 0, 0,width,height);
    // ctx.drawImage(frontWheel,10 0,0,50,50);
    // ctx.drawImage(backWheel,300+100,250,100,100);

    // $("#car_image_"+key).hide();
    // car.style.visibility = 'hidden';
    // $("#image-diameter-front-"+key).hide();
    // $("#image-diameter-back-"+key).hide();

    // var trimmedCanvas = trimCanvas(ctx);
}
</script>

<script type="text/javascript">
    LoadImageToCanvas(0);
    // LoadImageToCanvas(1);
    // LoadImageToCanvas(2);
    // LoadImageToCanvas(3);
    // LoadImageToCanvas(4);
</script>

@endsection