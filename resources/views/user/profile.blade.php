@extends('user.layouts.app') @section('content')
<style type="text/css">
    
.profile-img{
    text-align: center;
}

</style>
 
<!-- Start -->
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
       <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid" >

                <div class="row" style="min-height: 680px;">   
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">             
                    <div class="product-status-wrap drp-lst">
                    <h3>My Profile</h3> 
                    </div>
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <img src="{{url('/user/img/no-user.png')}}" alt="" />
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Name</b><br /> {{@$user->fname}} {{@$user->lname}}</p>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Email ID</b><br /> {{@$user->email}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Phone</b><br /> {{@$user->phone?:'-'}}</p>
                                        </div>
                                    </div>  
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Address</b><br /> {{@$user->address?:'-'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                             <!--    <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <h3>500</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <h3>900</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <h3>600</h3>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    </div>
                    <!-- <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

                        <div class="profile-info-inner">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Name</b><br /> Fly Zend</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Designation</b><br /> Head of Dept.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Email ID</b><br /> fly@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Phone</b><br /> +01962067309</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="address-hr">
                                            <p><b>Address</b><br /> E104, catn-2, Chandlodia Ahmedabad Gujarat, UK.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <h3>500</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <h3>900</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <h3>600</h3>
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
<br>

@endsection