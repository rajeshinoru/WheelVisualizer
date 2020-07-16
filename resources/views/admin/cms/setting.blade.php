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
                                <li class="active"><a href="#description">Application Details</a></li>
                            </ul>
                           
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form action="{{url('admin/cms/setting')}}" class=" needsclick addcourse" method="POST" id="demo1-upload"  enctype="multipart/form-data">
                                                         <!-- onsubmit="return summernoteForm($('#test123'))" -->
                                                        {{csrf_field()}}
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-4">Site Logo</div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <input type="file" accept="image/*" name="site_logo" class="dropify form-control-file" aria-describedby="fileHelp"  data-default-file="{{asset(Setting::get('site_logo'))}}">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-4">Site Title</div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <input name="site_title" type="text" class="form-control" placeholder="Site Title" value="{{Setting::get('site_title','')}}">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-4">Site Contact</div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <input name="site_contact" type="text" class="form-control" placeholder="+91" value="{{Setting::get('site_contact','')}}">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-4">Site Email</div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <input name="site_email" type="text" class="form-control" placeholder="Enter the email" value="{{Setting::get('site_email','')}}">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <br>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-4">Header </div>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control summernote" name="header_content" rows="5">
                                                                            {{Setting::get('header_content','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                            <br>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-4">Footer </div>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control summernote" name="footer_content" rows="5">
                                                                            {{Setting::get('footer_content','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>

                                                            <br>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-4">Shipping Rules </div>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control summernote" name="shipping_rule" rows="5">
                                                                            {{Setting::get('shipping_rule','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                            <br>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-4">Wheel Tire Package </div>
                                                                    <div class="col-md-8">
                                                                        <textarea class="form-control summernote" name="wheelpackage" rows="5">
                                                                            {{Setting::get('wheelpackage','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
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