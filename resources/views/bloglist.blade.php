@extends('layouts.app')
@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">
@endsection
@section('metakeywords')
<?=@MetaViewer('About');?>
@endsection
@section('content')

<style>

.container-fluid.home-page{padding: 0px 0px !important;background: #f1f1f1 !important;}
.caption{
    overflow: hidden;
    white-space: normal;
    height: 10.5em; /* exactly 2 lines */
    text-overflow: -o-ellipsis-lastline;
}
</style>
<br>

@include('include.sizelinks')

<!-- Blog Section Start -->
<section id="blog" class="blog-page">
  <div class="container">
    <div class="blog-page title-header">
      <div id="blog-heading" class="title">
        <h1>Discounted Wheel Warehouse - Blog</h1>
      </div>
    </div>
    <div class="blog-border">
            <div class="row">
              @foreach(@$posts as $key => $post)
              <div class="col-md-3 wheel-blog">
                <div class="thumbnail">
                	  <h1><a href="">{{@$post->title}}</a></h1>
                    <p>Posted <a href="">{{$post->created_at}} By <a href="">Dww</a></p>
                    <img src="{{asset('storage/'.@$post->image)}}" alt="Blog" style="width:40%">
                    <div class="caption">
                      <p class="para"><?=@$post->content?></p>
                    </div>
                    <button class="blog btn"><a href="{{url('/blogview')}}/{{base64_encode($post->id)}}">Read More</a></button>
                    <p> Posted in: <a href="">Wheels and Rims</a> | <a href="">Post a Comments</a></p>
                </div>
              </div>
              @endforeach 
    </div>
  </div>
</section>
<!-- Blog Section End -->


@endsection
@section('custom_scripts')
<!--  -->
@endsection
