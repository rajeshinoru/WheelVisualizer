@extends('layouts.app') 
@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> 
@endsection  
@section('content')
 

@include('include.sizelinks')
<style type="text/css">
    body{
        background-color: #f1f1f1;
    }
</style>
<!-- About Section Start -->
<section id="about-us" class="about-page">
    <div class="container">
        <div class="content">
            <?=viewCMSPage($routename)?>
        </div>
    </div>
</section>
<!-- About Section End -->


@endsection
@section('custom_scripts')
<!--  -->
@endsection
