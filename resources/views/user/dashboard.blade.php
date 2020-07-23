@extends('user.layouts.app') @section('content')

<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30 dash">
                    <div class="analytics-content">
                        <h5>Wheel Visualizer</h5>
                        <h2>$<span class="counter">5000</span> <span class="tuition-fees">Tuition Fees</span></h2>
                        <span class="text-success">20%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30 dash">
                    <div class="analytics-content">
                        <h5>Wheel Visualizer</h5>
                        <h2>$<span class="counter">3000</span> <span class="tuition-fees">Tuition Fees</span></h2>
                        <span class="text-danger">30%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30 dash">
                    <div class="analytics-content">
                        <h5>Wheel Visualizer</h5>
                        <h2>$<span class="counter">2000</span> <span class="tuition-fees">Tuition Fees</span></h2>
                        <span class="text-info">60%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30 dash">
                    <div class="analytics-content">
                        <h5>Wheel Visualizer</h5>
                        <h2>$<span class="counter">3500</span> <span class="tuition-fees">Tuition Fees</span></h2>
                        <span class="text-inverse">80%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Start -->
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>Visualizer Earnings</b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp graph-rp-dl">
                                    <p>All Earnings are in million $</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline cus-product-sl-rp">
                        <li>
                            <h5><i class="fa fa-circle" style="color: #222;"></i>Wheel</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #ccc;"></i>Car</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #222;"></i>Wheel</h5>
                        </li>
                    </ul>
                    <div id="morris-bar-chart" style="height: 356px;"></div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                    <div class="single-review-st-hd">
                        <h2>Recent Wheel Products</h2>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/wheel1.jpg" alt="">
                        <div class="review-ctn-hf">
                            <h3>Wheel</h3>
                            <p>Diameter : 11</p>
                        </div>
                        <div class="review-item-rating">
                            <a href="">View</a>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/wheel2.png" alt="">
                        <div class="review-ctn-hf">
                            <h3>Wheel</h3>
                            <p>Diameter : 12</p>
                        </div>
                        <div class="review-item-rating">
                            <a href="">View</a>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/wheel3.png" alt="">
                        <div class="review-ctn-hf">
                            <h3>Wheel</h3>
                            <p>Diameter : 13</p>
                        </div>
                        <div class="review-item-rating">
                            <a href="">View</a>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/wheel4.png" alt="">
                        <div class="review-ctn-hf">
                            <h3>Wheel</h3>
                            <p>Diameter : 14</p>
                        </div>
                        <div class="review-item-rating">
                            <a href="">View</a>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/wheel5.png" alt="">
                        <div class="review-ctn-hf">
                            <h3>Wheel</h3>
                            <p>Diameter : 15</p>
                        </div>
                        <div class="review-item-rating">
                            <a href="">View</a>
                        </div>
                    </div>
                    <div class="single-review-st-text">
                        <img src="img/notification/wheel6.jpg" alt="">
                        <div class="review-ctn-hf">
                            <h3>Wheel</h3>
                            <p>Diameter : 16</p>
                        </div>
                        <div class="review-item-rating">
                            <a href="">View</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- End -->
<br>
<div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu">
                            <i class="fa fa-facebook"></i>
                            <div class="social-edu-ctn">
                                <h3>50k Likes</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                            <i class="fa fa-twitter"></i>
                            <div class="social-edu-ctn">
                                <h3>30k followers</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <i class="fa fa-linkedin"></i>
                            <div class="social-edu-ctn">
                                <h3>7k Connections</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <i class="fa fa-youtube"></i>
                            <div class="social-edu-ctn">
                                <h3>50k Subscribers</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Users List</h4>
                    <div class="add-product">
                        <a data-toggle="modal" data-target="#myModal-disabled">Add User</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Setting</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td></td>
                                    <td>dinesh@inoru.com</td>
                                    <td>2019-12-11 18:08:11</td>
                                    <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed user_edit" data-value="1" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td></td>
                                    <td>david@inoru.com</td>
                                    <td>2019-12-11 20:27:20</td>
                                    <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed user_edit" data-value="2" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td></td>
                                    <td>bala.b@inoru.com</td>
                                    <td>2019-12-17 16:42:31</td>
                                    <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed user_edit" data-value="3" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td></td>
                                    <td>krish@inoru.com</td>
                                    <td>2019-12-19 16:44:00</td>
                                    <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed user_edit" data-value="4" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td></td>
                                    <td>krish@demo.com</td>
                                    <td>2020-01-13 00:51:41</td>
                                    <td>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed user_edit" data-value="5" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>

                    <!--  New Model Start-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog admin-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">User Information</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- New Model Content Start -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="product-payment-inner-st">
                                            <ul id="myTabedu1" class="tab-review-design">
                                                <li class="active"><a href="#description2">Basic Details</a></li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content custom-product-edit">
                                                <div class="product-tab-list tab-pane fade active in" id="description2">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="review-content-section">
                                                                <div id="dropzone1" class="pro-ad">
                                                                    <form action="http://127.0.0.1:8000/admin/user" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" method="POST">
                                                                        <input type="hidden" name="_token" value="7pQWRg57GuQR4T6YRqDQoSJU3gChRnPmu1G1Qsog">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="fname">First Name</label>
                                                                                    <input name="fname" type="text" class="form-control" placeholder="First Name" value="" required="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="lname">Last Name</label>
                                                                                    <input type="text" name="lname" class="form-control" placeholder="Last Name" value="" required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="lname">Mobile</label>
                                                                                    <input type="text" name="mobile" class="form-control" placeholder="(+91) Mobile Number " value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <label for="fname">Email</label>
                                                                                    <input name="email" type="email" class="form-control" placeholder="Email " value="" required="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="payment-adress">
                                                                                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit">

                                                                                </div>
                                                                            </div>
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

                                    <!-- New Model Content End -->
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--New Model End  -->

                </div>
            </div>
            
        </div>
    </div>
</div>
<br>

@endsection