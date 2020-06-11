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
<script type="text/javascript">
    
$('img').each(function(){

    if($(this).data('filename')){
        $(this).attr('style','');
        // $(this).attr('style','width:100%;');
    }
})

</script>
@endsection
