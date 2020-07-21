@extends('layouts.app')
@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}">
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('metakeywords')
<?=@MetaViewer('About');?>
@endsection
@section('content')

<style>
    .container-fluid.home-page {
        padding: 0px 0px !important;
        background: #f1f1f1 !important;
    }
    .blog-view-left
    {
      text-align: left;
    }
    .blog-view-right
    {
      text-align: right;
    }
    .blog-view-right p
    {
      margin:0px;
    }
    .post .btn.btn-success.post-button
    {
      margin: 23px 0px !important;
    }
    .post .btn.btn-success.post-button:hover
    {
      background: transparent !important;
      color: #0e1661 !important;
      border: 1px solid #000 !important;
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


        <div class="blog-border2">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 wheel-blog">
                    <div class="thumbnail">
                      <div class="row">
                       <div class="col-sm-6 blog-view-left"><h1><a href="">{{$post->title}}</a></h1></div>
                       <div class="col-sm-6 blog-view-right"><p>Posted <a href="">{{$post->created_at}} By <a href="">Dww</a></p></div>
                      </div>
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
                            <h1>Post Comments</h1>
                        </div>
                        <div class="row">
                            <!--       <div class="col-sm-2 post-img">
              <img src="image/default-profile.png">
            </div> -->
                            <div class="col-sm-12">
                                <!-- <h1>Discounted Wheel Warehouse <span>2 Weeks ago</span></h1> -->
                                <!-- <p>Niche Road Wheels designs high-quality custom wheels to upgrade your ride. Robust and well-built, Niche Elan custom wheels provide today's SUVs with stylish, impassive looks for the street.</p> -->
                                @include('blogcomments', ['comments' => $post->comments, 'post' => $post])


                                <div class="row">
                                    <div class="col-sm-12">

                                      @if(@Auth::user() || @Auth::guard('admin')->user())
                                        <form id="comment-form" action="{{route('comment.store')}}" method="post" novalidate="true">
                                            {{@csrf_field()}}
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <div class="controls col-md-12">
                                                <div class="form-group">
                                                    <label for="form_message">Add Comment</label>
                                                    <textarea id="form_message" name="content" class="form-control" placeholder="Your Comments" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="form_name">Name</label>
                                                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Enter your fullname" required="required" data-error="Name is required.">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="row">
                                                  <div class="col-lg-5">
                                                      <div class="form-group">
                                                          <label for="form_name"> Recaptcha:</label>
                                                          {!! NoCaptcha::renderJs() !!}
                                                          {!! NoCaptcha::display() !!}
                                                          <div class="help-block with-errors alert alert-danger" id="human-verify"> Please verify you are human!! </div>
                                                      </div>
                                                  </div>

                                                    <div class="col-lg-7 post">
                                                      <div class="col-lg-6">
                                                          <!-- <div class="form-group">
                                                              <label for="form_name">Name</label>
                                                              <input id="form_name" type="text" name="name" class="form-control" placeholder="Enter your fullname" required="required" data-error="Name is required.">
                                                              <div class="help-block with-errors"></div>
                                                          </div> -->
                                                      </div>
                                                      <div class="col-lg-6">
                                                          <input type="submit" class="btn btn-success post-button" value="Post Comment">
                                                      </div>
                                                    </div>
                                                </div>

                                                <!--                          <div class="captcha form-group">
                              <img src="image/captcha.png" alt="captcha code">
                              <div class="help-block with-errors"><a href="">Can't read the code? Click on the image to get a new one.</a></div>
                          </div> -->
                                                <!-- <input type="submit" class="btn btn-success post-button" value="Post Comment"> -->
                                            </div>
                                        </form>
                                      @else

                                    <div class="col-sm-6 blog-view-left"><h1>To post your comments , <a href="{{url('/login')}}" >login here</a></h1></div> 
                                      @endif
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
<script type="text/javascript">
    $('#human-verify').hide();
    document.getElementById("comment-form").addEventListener("submit", function(evt) {

        var response = grecaptcha.getResponse();
        if (response.length == 0) {
            //reCaptcha not verified
            // alert("please verify you are humann!");

            $('#human-verify').show();

            evt.preventDefault();
            return false;
        } else {

            $('#human-verify').hide();
        }
        //captcha verified
        //do the rest of your validations here

    });
</script>
@endsection
