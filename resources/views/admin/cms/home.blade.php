@extends('admin.layouts.app')

@section('content')

<?php
$is_read_access = VerifyAccess('cms','read');
$is_write_access = VerifyAccess('cms','write');
?>

        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Home Page Details</a></li>
                                <!-- <li><a href="#reviews"> Acount Information</a></li> -->
                                <!-- <li><a href="#INFORMATION">Social Information</a></li> -->
                            </ul>
                           
<!-- form class dropzone dropzone-custom -->
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form action="{{url('admin/cms/home')}}" class=" needsclick addcourse" method="POST" id="demo1-upload"  enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Home Page Content - I </div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="homepage_content1" rows="5">
                                                                            {{Setting::get('homepage_content1','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Home Page Content - II </div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="homepage_content2" rows="5">
                                                                            {{Setting::get('homepage_content2','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        @if($is_write_access)
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="payment-adress">
                                                                    <a href="{{url('/admin/home')}}" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!--                                 <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Phone">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Confirm Password">
                                                            </div>
                                                            <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Facebook URL">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Twitter URL">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Google Plus">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Linkedin URL">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection