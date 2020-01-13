@extends('admin.layouts.app')

@section('content')

        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Edit Basic Information</a></li>
                                <li><a href="#reviews"> Edit Acount Information</a></li>
                                <li><a href="#INFORMATION">Edit Social Information</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="#" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input name="number" type="text" class="form-control" placeholder="Fly Zend" value="Fly Zend">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="text" class="form-control" placeholder="E104, catn-2, UK." value="E104, catn-2, UK.">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="text" class="form-control" placeholder="12/10/1993" value="12/10/1993">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="number" class="form-control" placeholder="1213" value="1213">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="number" class="form-control" placeholder="01962067309" value="01962067309">
                                                                </div>
                                                                <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                        <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                        <h2 class="edudropnone">Drop image here or click to upload.</h2>
                                                                        <p class="edudropnone"><span class="note needsclick">(This is just a demo dropzone. Selected image is <strong>not</strong> actually uploaded.)</span>
                                                                        </p>
                                                                        <input name="imageico" class="hd-pro-img" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="text" class="form-control" placeholder="CSE" value="CSE">
                                                                </div>
                                                                <div class="form-group edit-ta-resize res-mg-t-15">
                                                                    <label for="fname">First Name</label>
                                                                    <textarea name="description">Lorem ipsum dolor sit amet of, consectetur adipiscing elitable. Vestibulum tincidunt est vitae ultrices accumsan.</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <select class="form-control">
                                                                        <option>Male</option>
                                                                        <option>Male</option>
                                                                        <option>Female</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <select class="form-control">
                                                                        <option>Nepal</option>
                                                                        <option>India</option>
                                                                        <option>Pakistan</option>
                                                                        <option>Amerika</option>
                                                                        <option>China</option>
                                                                        <option>Dubai</option>
                                                                        <option>Nepal</option>
                                                                    </select>
                                                                </div>
                                                                <label for="fname">First Name</label>
                                                                <div class="form-group">
                                                                    <select class="form-control">
                                                                        <option>Maharastra</option>
                                                                        <option>Gujarat</option>
                                                                        <option>Maharastra</option>
                                                                        <option>Rajastan</option>
                                                                        <option>Maharastra</option>
                                                                        <option>Rajastan</option>
                                                                        <option>Gujarat</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <select class="form-control">
                                                                        <option>Baroda</option>
                                                                        <option>Surat</option>
                                                                        <option>Baroda</option>
                                                                        <option>Navsari</option>
                                                                        <option>Baroda</option>
                                                                        <option>Surat</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="text" class="form-control" placeholder="www.uttara.com" value="www.uttara.com">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">

                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">Submit</button>



                                                                    <!--  New Model Start-->
                                                                    <div class="modal fade" id="myModal" role="dialog">
                                                                    <div class="modal-dialog admin-form">
                                                                      <div class="modal-content">
                                                                        <div class="modal-header">
                                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                          <h4 class="modal-title">Modal Header</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                          <!-- New Model Content Start -->


                                                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                          <div class="product-payment-inner-st">
                                                                              <ul id="myTabedu1" class="tab-review-design">
                                                                                  <li class="active"><a href="#description2">Edit Basic Information</a></li>
                                                                                  <li><a href="#reviews2"> Edit Acount Information</a></li>
                                                                                  <li><a href="#INFORMATION2">Edit Social Information</a></li>
                                                                              </ul>
                                                                              <div id="myTabContent" class="tab-content custom-product-edit">
                                                                                  <div class="product-tab-list tab-pane fade active in" id="description2">
                                                                                      <div class="row">
                                                                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                              <div class="review-content-section">
                                                                                                  <div id="dropzone1" class="pro-ad">
                                                                                                      <form action="#" class="dropzone dropzone-custom needsclick add-professors dz-clickable" id="demo1-upload" novalidate="novalidate">
                                                                                                          <div class="row">
                                                                                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                                  <div class="form-group">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <input name="number" type="text" class="form-control" placeholder="Fly Zend" value="Fly Zend">
                                                                                                                  </div>
                                                                                                                  <div class="form-group">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <input type="text" class="form-control" placeholder="E104, catn-2, UK." value="E104, catn-2, UK.">
                                                                                                                  </div>
                                                                                                                  <div class="form-group">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <input type="text" class="form-control" placeholder="12/10/1993" value="12/10/1993">
                                                                                                                  </div>
                                                                                                                  <div class="form-group state-success">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <input type="number" class="form-control valid" placeholder="1213" value="1213">
                                                                                                                  </div>
                                                                                                                  <div class="form-group">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <input type="number" class="form-control" placeholder="01962067309" value="01962067309">
                                                                                                                  </div>
                                                                                                                  <div class="form-group alert-up-pd">
                                                                                                                      <div class="dz-message needsclick download-custom state-error">
                                                                                                                          <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                                                                          <h2 class="edudropnone">Drop image here or click to upload.</h2>
                                                                                                                          <p class="edudropnone"><span class="note needsclick">(This is just a demo dropzone. Selected image is <strong>not</strong> actually uploaded.)</span>
                                                                                                                          </p>
                                                                                                                          <input name="imageico" class="hd-pro-img invalid" type="text">
                                                                                                                      </div><em for="imageico" class="invalid">Please upload image</em>
                                                                                                                  </div>
                                                                                                              </div>
                                                                                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                                  <div class="form-group">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <input type="text" class="form-control" placeholder="CSE" value="CSE">
                                                                                                                  </div>
                                                                                                                  <div class="form-group edit-ta-resize res-mg-t-15 state-success">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <textarea name="description" class="valid">Lorem ipsum dolor sit amet of, consectetur adipiscing elitable. Vestibulum tincidunt est vitae ultrices accumsan.</textarea>
                                                                                                                  </div>
                                                                                                                  <div class="form-group">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <select class="form-control">
                                                                                                                          <option>Male</option>
                                                                                                                          <option>Male</option>
                                                                                                                          <option>Female</option>
                                                                                                                      </select>
                                                                                                                  </div>
                                                                                                                  <div class="form-group">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <select class="form-control">
                                                                                                                          <option>Nepal</option>
                                                                                                                          <option>India</option>
                                                                                                                          <option>Pakistan</option>
                                                                                                                          <option>Amerika</option>
                                                                                                                          <option>China</option>
                                                                                                                          <option>Dubai</option>
                                                                                                                          <option>Nepal</option>
                                                                                                                      </select>
                                                                                                                  </div>
                                                                                                                  <label for="fname">First Name</label>
                                                                                                                  <div class="form-group">
                                                                                                                      <select class="form-control">
                                                                                                                          <option>Maharastra</option>
                                                                                                                          <option>Gujarat</option>
                                                                                                                          <option>Maharastra</option>
                                                                                                                          <option>Rajastan</option>
                                                                                                                          <option>Maharastra</option>
                                                                                                                          <option>Rajastan</option>
                                                                                                                          <option>Gujarat</option>
                                                                                                                      </select>
                                                                                                                  </div>
                                                                                                                  <div class="form-group">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <select class="form-control">
                                                                                                                          <option>Baroda</option>
                                                                                                                          <option>Surat</option>
                                                                                                                          <option>Baroda</option>
                                                                                                                          <option>Navsari</option>
                                                                                                                          <option>Baroda</option>
                                                                                                                          <option>Surat</option>
                                                                                                                      </select>
                                                                                                                  </div>
                                                                                                                  <div class="form-group">
                                                                                                                      <label for="fname">First Name</label>
                                                                                                                      <input type="text" class="form-control" placeholder="www.uttara.com" value="www.uttara.com">
                                                                                                                  </div>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                          <div class="row">
                                                                                                              <div class="col-lg-12">
                                                                                                                  <div class="payment-adress">
                                                                                                                      <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>

                                                                                                                  </div>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                      </form>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="product-tab-list tab-pane fade" id="reviews2">
                                                                                      <div class="row">
                                                                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                              <div class="review-content-section">
                                                                                                  <div class="row">
                                                                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                          <div class="devit-card-custom">
                                                                                                              <div class="form-group">
                                                                                                                  <label for="fname">First Name</label>
                                                                                                                  <input type="text" class="form-control" placeholder="Email" value="Admin@gmail.com">
                                                                                                              </div>
                                                                                                              <div class="form-group">
                                                                                                                  <label for="fname">First Name</label>
                                                                                                                  <input type="number" class="form-control" placeholder="Phone" value="01962067309">
                                                                                                              </div>
                                                                                                              <div class="form-group">
                                                                                                                  <label for="fname">First Name</label>
                                                                                                                  <input type="password" class="form-control" placeholder="Password" value="#123#123">
                                                                                                              </div>
                                                                                                              <div class="form-group">
                                                                                                                  <label for="fname">First Name</label>
                                                                                                                  <input type="password" class="form-control" placeholder="Confirm Password" value="#123#123">
                                                                                                              </div>
                                                                                                              <a href="#!" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="product-tab-list tab-pane fade" id="INFORMATION2">
                                                                                      <div class="row">
                                                                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                              <div class="review-content-section">
                                                                                                  <div class="row">
                                                                                                      <div class="col-lg-12">
                                                                                                          <div class="devit-card-custom">
                                                                                                              <div class="form-group">
                                                                                                                  <label for="fname">First Name</label>
                                                                                                                  <input type="url" class="form-control" placeholder="Facebook URL" value="http://www.facebook.com">
                                                                                                              </div>
                                                                                                              <div class="form-group">
                                                                                                                  <label for="fname">First Name</label>
                                                                                                                  <input type="url" class="form-control" placeholder="Twitter URL" value="http://www.twitter.com">
                                                                                                              </div>
                                                                                                              <div class="form-group">
                                                                                                                  <label for="fname">First Name</label>
                                                                                                                  <input type="url" class="form-control" placeholder="Google Plus" value="http://www.google-plus.com">
                                                                                                              </div>
                                                                                                              <div class="form-group">
                                                                                                                  <label for="fname">First Name</label>
                                                                                                                  <input type="url" class="form-control" placeholder="Linkedin URL" value="http://www.Linkedin.com">
                                                                                                              </div>
                                                                                                              <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                                                          </div>
                                                                                                      </div>
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
                                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                    <!--New Model End  -->








                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <label for="fname">First Name</label>
                                                                <input type="text" class="form-control" placeholder="Email" value="Admin@gmail.com">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fname">First Name</label>
                                                                <input type="number" class="form-control" placeholder="Phone" value="01962067309">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fname">First Name</label>
                                                                <input type="password" class="form-control" placeholder="Password" value="#123#123">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fname">First Name</label>
                                                                <input type="password" class="form-control" placeholder="Confirm Password" value="#123#123">
                                                            </div>
                                                            <a href="#!" class="btn btn-primary waves-effect waves-light">Submit</a>
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
                                                                <label for="fname">First Name</label>
                                                                <input type="url" class="form-control" placeholder="Facebook URL" value="http://www.facebook.com">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fname">First Name</label>
                                                                <input type="url" class="form-control" placeholder="Twitter URL" value="http://www.twitter.com">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fname">First Name</label>
                                                                <input type="url" class="form-control" placeholder="Google Plus" value="http://www.google-plus.com">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fname">First Name</label>
                                                                <input type="url" class="form-control" placeholder="Linkedin URL" value="http://www.Linkedin.com">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection