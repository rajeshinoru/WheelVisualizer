@extends('admin.layouts.app')

@section('content')
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Information Tab Details</a></li>
                                <!-- <li><a href="#reviews"> Acount Information</a></li> -->
                                <!-- <li><a href="#INFORMATION">Social Information</a></li> -->
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form action="{{url('admin/cms/information')}}" class=" needsclick addcourse" method="POST" id="demo1-upload"  enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Information All Page</div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="information" rows="2">
                                                                            {{Setting::get('information','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <br>                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Package Deal Page</div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="packagedeal" rows="2">
                                                                            {{Setting::get('packagedeal','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Shipping Info Page</div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="shippinginfo" rows="5">
                                                                            {{Setting::get('shippinginfo','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Return Policy Page</div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="returnpolicy" rows="5">
                                                                            {{Setting::get('returnpolicy','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Feedback Page</div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="feedback" rows="5">
                                                                            {{Setting::get('feedback','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Privacy Policy Page</div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="privacypolicy" rows="5">
                                                                            {{Setting::get('privacypolicy','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Lip Sizes Page</div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="lipsizes" rows="5">
                                                                            {{Setting::get('lipsizes','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-3">Wheel Configuration Page</div>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control summernote" name="wheelconfig" rows="5">
                                                                            {{Setting::get('wheelconfig','')}}
                                                                        </textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
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