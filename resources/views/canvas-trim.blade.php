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
body{background-color:red;}
</style>

<!-- before: <img src="{{asset('storage/demo_cars/0777_cc1280_032_KH3.jpg')}}"/> -->
<!-- <hr /> -->
after : <img id="image" src="{{asset('storage/demo_cars/0777_cc1280_032_KH3.jpg')}}"/>
<hr />
<img style="display: none;" id="wheel" src="{{asset('storage/wheels/front_back/Azad_AZ22_MB_AZ3455405253_24.png')}}">

@endsection

@section('custom_scripts')
    <script src="{{ asset('js/ajax/jquery.min.js') }}"></script>
    <script src="{{ asset('choosen/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script  src="{{ asset('js/opencv/opencv-3.3.1.js') }}" async></script>


<script type="text/javascript">
    var after = $('#image')[0];
    after.crossOrigin = "Anonymous";
    after.src = white2transparent(after);

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
            } else if (bound.right < x && x < (c.width - 200)) {
                bound.right = x;
            }

            if (bound.bottom === null) {
                bound.bottom = y;
            } else if (bound.bottom < y && y < (c.height - 100)) {
                bound.bottom = y;
            }
        }
    }
    
    // Calculate the height and width of the content
    var trimHeight = bound.bottom - bound.top,
        trimWidth = bound.right - bound.left,
        trimmed = ctx.getImageData(bound.left, bound.top, trimWidth, trimHeight);
    // console.log(bound, trimWidth, trimHeight)
    copy.canvas.width = trimWidth;
    copy.canvas.height = trimHeight;
    copy.putImageData(trimmed, 0, 0);

 
    // Return trimmed canvas
    return copy.canvas;
}
function white2transparent(img)
{
    var c = document.createElement('canvas');
    
    var w = img.width, h = img.height;
    
    c.width = w;
    c.height = h;
        
    var ctx = c.getContext('2d');
    
    ctx.width = w;
    ctx.height = h;
    ctx.drawImage(img, 0, 0, w, h);
    var imageData = ctx.getImageData(0,0, w, h);
    var pixel = imageData.data;
    var bound = {
            top: null,
            left: null,
            right: null,
            bottom: null
        },
        x, y;
    var r=0, g=1, b=2,a=3;



    for (var p = 0; p<pixel.length; p+=4)
    {
      if (
          pixel[p+r] >= 216 &&
          pixel[p+g] >= 216 &&
          pixel[p+b] >= 216) // if white then change alpha to 0
        {

            pixel[p+a] = 0;
        }
      //   else{
      //       console.log(p+a);
      //   }

        // if (pixel[p+a] !== 0) {
        //     x = (p+a / 4) % c.width;
        //     y = ~~((p+a / 4) / c.width);

        //     if (bound.top === null) {
        //         bound.top = y;
        //     }

        //     if (bound.left === null) { 
        //             bound.left = x;
        //     } else if (x < bound.left) {
        //             bound.left = x;
        //     }

 

        //     if (bound.right === null) {
        //         bound.right = x;
        //     } else if (bound.right < x) {
        //         bound.right = x;
        //     }

        //     if (bound.bottom === null) {
        //         bound.bottom = y;
        //     } else if (bound.bottom < y && (y < (h * 4)-500)) {
        //         console.log(y , (h * 4)-500)
        //         bound.bottom = y;
        //     }



        //     if(bound.left < 500){
        //         bound.left = null;
        //     }
        //     if(bound.top < 50){
        //         bound.top = null;
        //     }
        // }

    }
    // console.log(bound ,imageData,pixel)
    
    // imageData.data = pixel;

    ctx.putImageData(imageData,0,0);


  //   // console.log(bound)
  // // Calculate the height and width of the content
    // var trimHeight = bound.bottom - bound.top,
    //     trimWidth = bound.right - bound.left;


  //   console.log(bound.left, bound.top, trimWidth, trimHeight)
    // var trimmed = ctx.getImageData(bound.left, bound.top, trimWidth, trimHeight);
    // console.log(trimmed)
    // c.width = trimWidth;
    // c.height = trimHeight;
    // ctx.putImageData(trimmed, 0, 0);
    // c.style.border = "1px solid";



    // var newctx = c.getContext('2d');
    
    // newctx.width = w;
    // newctx.height = h;
    
    // newctx.drawImage(img, bound.left, bound.top, trimWidth, trimHeight);
// var imageData = ctx.getImageData(bound.left, bound.top, trimWidth, trimHeight);
// Then create a secondary canvas with the desired sizes and use puImageData to set the pixels:

// var canvas1 = document.createElement("canvas");
// canvas1.width = 100;
// canvas1.height = 100;
// var ctx1 = canvas1.getContext("2d");
// ctx1.rect(0, 0, 100, 100);
// ctx1.fillStyle = 'black';
// ctx1.fill();
// ctx1.putImageData(trimmed, 0, 0);
// Finally use toDataURL to update the image:

// dstImg.src = canvas1.toDataURL("image/png");
    c = trimCanvas(c);

    ctx = c.getContext('2d');

    var frontWheel = document.getElementById("wheel");
    // frontWheel.style.display="block";
    // var backWheel = document.getElementById("image-diameter-back-"+key);
    ctx.drawImage(frontWheel,0,0,50,50);
    // frontWheel.style.display="none";
    // ctx.drawImage(backWheel,300+100,250,100,100);
    return  c.toDataURL('image/jpg');
}

</script>
@endsection