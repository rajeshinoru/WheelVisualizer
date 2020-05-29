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


    <div class="blog-border2">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2 wheel-blog">
          <div class="thumbnail">
              <h1><a href="">{{$post->title}}</a></h1>
              <p>Posted <a href="">{{$post->created_at}} By <a href="">Dww</a></p>
              <div class="caption"> 
                <?=$post->content?>
              </div>
              <!-- <p> Posted in: <a href="">Wheels and Rims</a> | <a href="">Post a Comments</a></p> -->
          </div>
        </div>
      </div>
    </div>


    <div class="blog-border2">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2 wheel-blog-comment">
          <div class="thumbnail">
          <div id="blog-heading text-left" class="title">
            <h1>Post Your comment</h1>
          </div>
          <div class="row">
      <!--       <div class="col-sm-2 post-img">
              <img src="image/default-profile.png">
            </div> -->
            <div class="col-sm-12">
              <h1>Discounted Wheel Warehouse <span>2 Weeks ago</span></h1>
              <!-- <p>Niche Road Wheels designs high-quality custom wheels to upgrade your ride. Robust and well-built, Niche Elan custom wheels provide today's SUVs with stylish, impassive looks for the street.</p> -->
              @include('blogcomments', ['comments' => $post->comments, 'post' => $post])
              <div class="row">
                <div class="col-sm-12">
                  <form id="contact-form" action="{{route('comment.store')}}" method="post" novalidate="true">
                    {{@csrf_field()}}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                      <div class="controls col-md-12">
                          <div class="form-group">
                              <label for="form_message">Comment</label>
                              <textarea id="form_message" name="content" class="form-control" placeholder="Message for me" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                              <div class="help-block with-errors"></div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <label for="form_name">Name</label>
                                      <input id="form_name" type="text" name="name" class="form-control" placeholder="Enter your fullname" required="required" data-error="Name is required.">
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                    }
                    }
              
<!--                               <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_name"> Security Code</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your Security Code" required="required" data-error="Name is required.">
                                    <div class="help-block with-errors"> (Enter the code shown in the image below) </div>
                                </div>
                              </div> -->
                          </div>
 <!--                          <div class="captcha form-group">
                              <img src="image/captcha.png" alt="captcha code">
                              <div class="help-block with-errors"><a href="">Can't read the code? Click on the image to get a new one.</a></div>
                          </div> -->
                          <input type="submit" class="btn btn-success post-button" value="Post Comment">
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>


  </div>
</section>
<!-- Blog Section End -->


@endsection
@section('custom_scripts')
<!--  -->
@endsection
