@extends('layouts.app') @section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> @endsection @section('content')

<div class="header-content-title">
</div>

<br>
<!-- New Design Start -->
<style>
    .ban-ser {
        border: 1px solid #ddd9d9 !important;
    }

    .wheel-list {
        column-width: 15em;
        padding: 10px 15px !important;
    }

    .wheel-list li a {
        color: #474646;
        display: block;
        font-size: 12px !important;
        text-align: center;
        font-family: Montserrat !important;
    }

    .wheel-list ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .wheel-list li {
        padding: 3px;
        margin: 3px;
        margin-top: 3px;
        margin-top: 3px;
        border: 1px solid #ccc;
        box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, .05);
        background-color: #fff;
        border-radius: 2px !important;
    }

    .wheel-list ul li:first-child {
        margin-top: 0;
    }

    #heading h1 {
        font-family: Montserrat;
        color: #121214;
        font-size: 18px !important;
        text-align: center;
        font-weight: 700 !important;
    }

    .col-sm-3.payments3-card img {
        width: 100% !important;
    }

    .col-sm-3.payments-card {
        text-align: center !important;
    }

    .prod-headinghome p {
        margin: 10px 0px;
        color: #121214;
        line-height: 30px;
        font-family: poppins !important;
        font-size: 12px !important;
    }

    .col-sm-4.wheel-img {
        text-align: center !important;
    }

    /* pro Start */

    .hometabled {
        display: table;
        text-align: center;
        width: 100%;
        background: #fff;
        box-shadow: 0 2px 3px 0 rgba(180, 180, 180, .6) !important;
        border: 1px solid #d8d7d7;
        margin-bottom: 15px;
        padding: .5%;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
    }

    .pTopBar {
        display: table;
        width: 100%;
        padding: .5% 1%;
        margin-bottom: 1%;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        background: #0e1661 !important;
    }

    .pTopCell {
        display: table-cell;
        width: 50%;
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .75);
        font-size: 12px;
        font-family: Montserrat !important;
    }

    .pTopCell.Phone a {
        color: #fff;
        text-decoration: none;
    }

    .asItems {
        border: 0px;
    }

    .asItems {
        padding: 0;
        padding-top: 0px;
        width: 100%;
        padding-top: 5px;
        text-align: center;
        margin: 0 auto 10px;
        background: #fff;
        border: 1px solid #cecece;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        box-shadow: 0 0 3px rgba(0, 0, 0, .125);
        font-family: open sans, Arial, sans-serif;
    }

    .asItems {
        text-align: center;
        font-family: open sans, Arial, sans-serif;
    }

    .gridList {
        margin: 0 auto;
        padding: 0;
        width: auto;
        display: table;
    }

    .gridItem {
        display: inline-block;
        width: 210px;
        text-align: center;
        padding: 5px;
    }

    .homecelld b {
        color: #222 !important;
        font-size: 12px !important;
        font-family: Montserrat !important;
    }

    .hometabled {
        margin: 25px 0px !important;
    }

    .gridList.wheels.suggested .gridItem homeapge1 {
        height: 180px;
    }

    .asItems {
        border: 0px;
    }

    .prod-headinghome h2 {
        color: #0e1661 !important;
        text-align: center;
        font-family: Montserrat !important;
        font-size: 18px !important;
        font-weight: 700 !important;
    }

    .prod-headinghome b {
        color: #0e1661 !important;
        font-family: Montserrat !important;
        font-size: 12px !important;
    }

    .prod-heading-center {
        text-align: center;
    }

    .prod-headinghome h3 {
        width: 100%;
        font-size: medium;
        font-family: open sans, Arial, sans-serif;
        color: #000 !important;
        font-weight: 600 !important;
        text-align: center;
    }

    .prod-heading-center p {
        color: #0e1661 !important;
        font-size: 15px;
        line-height: 30px !important;
        font-family: Montserrat !important;
        font-weight: 700 !important;
    }

    #produst,#special-product,footer,#bott,.container.brand-logo {
        display: none !important;
    }

    .container-fluid.home-page {
        padding: 0px 0px !important;
        background: #f1f1f1 !important;
    }
</style>
<!-- New Design End -->
<div class="banner-search">
    <div class="container">
        <div class="wheel-list ban-ser">
            <ul>
                <li><a href="">17 inch Specials</a></li>
                <li><a href="">18 inch Specials</a></li>
                <li><a href="">20 inch Specials</a></li>
                <li><a href="">22 inch Specials</a></li>
                <li><a href="">24 inch Specials</a></li>
                <li><a href="">26 inch Specials</a></li>
                <li><a href="">Black Wheels</a></li>
                <li><a href="">Tuner Wheels</a></li>
                <li><a href="">3-Piece Wheels</a></li>
                <li><a href="">Off Road Wheels</a></li>
                <li><a href="">8-Lug Wheels</a></li>
                <li><a href="">Dually Wheels</a></li>
                <li><a href="">Classic Wheels</a></li>
                <li><a href="">Vehicle Gallery</a></li>
                <li><a href="">Videos</a></li>
                <li><a href="">Reviews</a></li>
                <li><a href="">Bolt Patterns</a></li>
                <li><a href="">Canada Shipping</a></li>
                <li><a href="">Feedback</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Return Policy</a></li>
                <li><a href="">Shipping Info</a></li>
                <li><a href="">Order Status</a></li>
            </ul>
        </div>
    </div>
</div>


<section class="shopping-cart-page">
    <div class="container">
        <div class="shopping-page title-header">
            <div id="heading" class="title">
                <h1>Checkout</h1>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-9" id="heading2"><h1> Order Items</h1></div>
        <div class="col-sm-3" id="heading2"><h1>Your Cart</h1></div>
      </div>
      <div class="row">
      <div class="col-sm-9">
        <div class="shop-cart">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr class="shop-head">
                    <th></th>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Price Each</th>
                    <th>Item Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="shopping-cart-image"><img src="../image/wheel.jpg" class="shop-img"></td>
                    <td>
                      <div class="shop-mar">
                        <div class="form-group product-quantity">
                            <input type="number" name="quantity" value="1" size="2" id="qty-" class="form-control">
                            <input type="hidden" name="product_id" value="15">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="shop-mar">
                        <h1>H123-Lyon-1353</h1>
                        <h2>HTR Wheels H123 Lyon 17x7.5 Gloss Black Machine 35mm Offset</h2>
                        <span><a href="">Remove</a></span>
                      </div>
                    </td>
                    <td><div class="shop-mar"><h1>$101.00</h1></div></td>
                    <td><div class="shop-mar"><h1>$2,424.00</h1></div></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="shop-cart">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr class="shop-head">
                      <th>Price Details</th>
                      <th>Item Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><div class="shop-mar2"><h1>Sub Total</h1></div></td>
                      <td><div class="shop-mar2"><h1>$3,380.00</h1></div></td>
                    </tr>
                    <tr>
                      <td><div class="shop-mar2"><h1>Fees</h1></div></td>
                      <td><div class="shop-mar2"><h1>$0.00</h1></div></td>
                    </tr>
                    <tr>
                      <td><div class="shop-mar2"><h1>Tax</h1></div></td>
                      <td><div class="shop-mar2"><h1>TBD</h1></div></td>
                    </tr>
                    <tr>
                      <td><div class="shop-mar2"><h1>Shipping</h1></div></td>
                      <td><div class="shop-mar2"><h1>TBD</h1></div></td>
                    </tr>
                    <tr>
                      <td><div class="shop-mar2"><h1><b>Total</b></h1></div></td>
                      <td><div class="shop-mar2"><h1><b>$3,380.00</b></h1></div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>

      <section class="shopping-cart-page">
          <div class="container">
            <div class="row">
              <div class="col-sm-9" id="heading2"><h1>Billing Address</h1></div>
              <div class="col-sm-3" id="heading2"><h1></h1></div>
            </div>
            <div class="row">
              <div class="col-sm-9">
                <div class="shop-cart bill-page">
                      <form class="needs-validation" novalidate>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="First name" value="" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Last name" value="" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="firstName">Company Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Company Name" value="" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="firstName">Day Phone</label>
                            <input type="tel" class="form-control" id="firstName" placeholder="Day Phone" value="" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="lastName">Cell Phone</label>
                            <input type="tel" class="form-control" id="lastName" placeholder="Cell Phone" value="" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="firstName">Address</label>
                            <input type="text" class="form-control" id="firstName" placeholder="1234 Main St" value="" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" required>
                              <option value="">Choose...</option>
                              <option>United States</option>
                            </select>
                          </div>
                          <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="form-control" id="state" required>
                              <option value="">Choose...</option>
                              <option>California</option>
                            </select>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                          </div>
                        </div>

                      </form>
                  </div>
                </div>

              <div class="col-sm-3"></div>
              </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col-sm-9" id="heading2"><h1>Shipping Address</h1></div>
                  <div class="col-sm-3" id="heading2"><h1></h1></div>
                </div>
                <div class="row">
                  <div class="col-sm-9">
                    <div class="shop-cart bill-page">
                           <label class="checkbox-inline"><input type="checkbox" value=""> Same as billing</label>
                      </div>
                    </div>

                  <div class="col-sm-3"></div>
                  </div>
                  </div>


                  <div class="container">
                    <div class="row">
                      <div class="col-sm-9" id="heading2"><h1>Payment Method</h1></div>
                      <div class="col-sm-3" id="heading2"><h1></h1></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="shop-cart bill-page">
                              <form class="needs-validation" novalidate>
                                <div class="row">
                                  <div class="col-md-6 mb-3">
                                    <label for="country">Payment Method</label>
                                    <select class="form-control" id="country" required>
                                      <option value="">Choose...</option>
                                      <option>Visa</option>
                                    </select>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="firstName">Card Number</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Card Number" value="" required>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 mb-3">
                                    <label for="country">Expiration Date</label>
                                    <select class="form-control" id="country" required>
                                      <option value="">Choose...</option>
                                      <option>April</option>
                                    </select>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="state">Expiration Year</label>
                                    <select class="form-control" id="state" required>
                                      <option value="">Choose...</option>
                                      <option>2020</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 mb-3">
                                    <label for="firstName">Card Verification Code</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Card Verification Code" value="" required>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="lastName">Bank Phone Number on Back of Card</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Bank Phone Number on Back of Card" value="" required>
                                  </div>
                                </div>
                              </form>
                          </div>
                        </div>

                      <div class="col-sm-3"></div>
                      </div>
                      </div>

                      <div class="container">
                        <div class="row">
                          <div class="col-sm-9" id="heading2"><h1>Vehicle Information</h1></div>
                          <div class="col-sm-3" id="heading2"><h1></h1></div>
                        </div>
                        <div class="row">
                          <div class="col-sm-9">
                            <div class="shop-cart bill-page">
                                  <form class="needs-validation" novalidate>
                                    <div class="row">
                                      <div class="col-md-6 mb-3">
                                        <label for="country">Select Make</label>
                                        <select class="form-control" id="country" required>
                                          <option value="">Choose...</option>
                                          <option>Product</option>
                                        </select>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                        <label for="country">Select Year</label>
                                        <select class="form-control" id="country" required>
                                          <option value="">Choose...</option>
                                          <option>2020</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6 mb-3">
                                        <label for="country">Select Model</label>
                                        <select class="form-control" id="country" required>
                                          <option value="">Choose...</option>
                                          <option>Model</option>
                                        </select>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                        <label for="state">Select Trim</label>
                                        <select class="form-control" id="state" required>
                                          <option value="">Choose...</option>
                                          <option>Trim</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-4 mb-3">
                                        <label for="country">Is Vehicle Modified?</label>
                                        <select class="form-control" id="country" required>
                                          <option value="">Choose...</option>
                                          <option>Yes</option>
                                          <option>No</option>
                                        </select>
                                      </div>
                                      <div class="col-md-4 mb-3">
                                        <label for="country">Big Brake Kit?</label>
                                        <select class="form-control" id="country" required>
                                          <option value="">Choose...</option>
                                          <option>Yes</option>
                                          <option>No</option>
                                        </select>
                                      </div>
                                      <div class="col-md-4 mb-3">
                                        <label for="country">Raised or Lowered?</label>
                                        <select class="form-control" id="country" required>
                                          <option value="">Choose...</option>
                                          <option>Yes</option>
                                          <option>No</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12 mb-3">
                                        <label for="comment">Modified Please Explain :</label>
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                      </div>
                                    </div>
                                  </form>
                              </div>
                            </div>

                          <div class="col-sm-3"></div>
                          </div>
                          </div>

                          <div class="container">
                            <div class="row">
                              <div class="col-sm-9" id="heading2"><h1>Notes</h1></div>
                              <div class="col-sm-3" id="heading2"><h1></h1></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-9">
                                <div class="shop-cart bill-page">
                                      <form class="needs-validation" novalidate>

                                        <div class="row">
                                          <div class="col-md-12 mb-3">
                                            <label for="comment">Notes for this order :</label>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
                                          </div>
                                        </div>
                                      </form>
                                  </div>
                                </div>

                              <div class="col-sm-3"></div>
                              </div>
                              </div>

                              <div class="container">
                                <div class="row">
                                  <div class="col-sm-9" id="heading2"><h1>Notes</h1></div>
                                  <div class="col-sm-3" id="heading2"><h1></h1></div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-9 agree-check">
                                    <p class="agree-para">I agree to the Terms and Conditions of the Return Policy. On Tire Orders no contact with the customer is necessary, tracking numbers will be sent to the supplied email address. On all Wheel orders we must contact all customers by phone to confirm vehicle details and verify payment method. This order will only ship out after verbal contact has been made with the customer by phone. Expect a call today or the next business day during business hours. I am aware if I am trying to use a fraudulent Credit Card I will be prosecuted to the full extent of the law. Choice of Law; Jurisdiction; Venue: You agree that your purchase of goods shall be construed in accordance with, and governed by, the laws of the State of California as applied to contracts signed, delivered, and performed solely within that State. You agree that any action or proceeding commenced as the result of claims arising from or relating to your purchase of goods shall be brought and filed in the County of Orange, State of California.</p>
                                     <label class="checkbox-inline"><input type="checkbox" value=""> I agree to the above Terms & Conditions</label>
                                     <br>
                                     <button class="btn btn-info checkout-btn" type="button"><i class="fa fa-shopping-cart"></i> Place Your Order</button>
                                    </div>

                                  <div class="col-sm-3"></div>
                                  </div>
                                  </div>

            </section>






@endsection
@section('custom_scripts')
<!--  -->
@endsection
