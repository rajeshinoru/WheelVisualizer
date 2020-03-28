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

before: <img src="{{asset('storage/demo_cars/0777_cc1280_032_KH3.jpg')}}"/>
<hr />
after : <img id="image" src="{{asset('storage/demo_cars/0777_cc1280_032_KH3.jpg')}}" style="background-color: yellow" />
<hr />
<!-- <button>clear white</button> -->


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
          pixel[p+r] >= 240 &&
          pixel[p+g] >= 240 &&
          pixel[p+b] >= 240) // if white then change alpha to 0
        {

            pixel[p+a] = 0;
        }
      //   else{
      //       console.log(p+a);
      //   }

        if (pixel[p+a] !== 0) {
            x = (p+a / 4) % c.width;
            y = ~~((p+a / 4) / c.width);

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

            if(bound.left < 50){
                bound.left = null;
            }
            if(bound.top < 50){
                bound.top = null;
            }
        }

    }
    ctx.putImageData(imageData,0,0);


  //   // console.log(bound)
  // // Calculate the height and width of the content
    var trimHeight = bound.bottom - bound.top,
        trimWidth = bound.right - bound.left;


  //   console.log(bound.left, bound.top, trimWidth, trimHeight)
  //   var trimmed = ctx.getImageData(bound.left, bound.top, trimWidth, trimHeight);
  //   // c.width = trimWidth;
  //   // c.height = trimHeight;
  //   // ctx.putImageData(trimmed, 0, 0);
  //   c.style.border = "1px solid";



    // var ctx = c.getContext('2d');
    

    return  c1.toDataURL('image/png');
}

</script>
@endsection