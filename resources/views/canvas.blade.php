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


                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">    
                                    <div class="row main-model-body" >
                                        <div class="col-sm-8 model-car modal_canvas" id="modal_canvas_1">

                                            <img id="car_image_1" class="car_image_1 car_image_responsive" src="http://localhost:8000/storage/cars/10900_cc2400_032_17U.png">

                                        </div>
                                        <div class="car-wheel">
                                            <div class="front" >
                                                <img class="frontimg" src="storage/wheels/front_back/Xcess_X03_BFS_XC4624299918_18.png" id="image-diameter-front-1" >
                                            </div>
                                            <div class="back">
                                                <img src="storage/wheels/front_back/Xcess_X03_BFS_XC4624299918_18.png" id="image-diameter-back-1">
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

<script type="text/javascript">
    LoadImageToCanvas(1);
function LoadImageToCanvas(key){
    var width = 520;//$("#car_image_"+key).width() ;
    var height = 520;//$("#car_image_"+key).height() ;

    var canvas = document.createElement('canvas');
    var angleInRadians = 45;
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

    var ctx = canvas.getContext("3d");

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