
@extends('admin.layouts.auth')
@section('styles')
<style>

    .help-block{
        color: red !important;
    }
    
    body {
        background: url('/image/slide.jpg') no-repeat !important;
        background-attachment: scroll;
        background-size: auto;
        background-attachment: fixed !important;
        background-size: 100% 100% !important;
    }

    .container {
        max-width: 400px;
    }

    .topMenu {
        text-align: right;
        top: 0;
        position: absolute;
        right: 0;
        padding: 50px;
    }

    .col-md-12.login-page {
        background:
            #fff !important;
        padding: 20px 50px !important;
        border-radius: 5px;
    }

    .topMenuul li {
        list-style: none;
        display: inline-block;
        font-weight: 400;
    }

    .topMenuul li a {
        color: #736B6B;
    }

    .topMenuul li select {
        border: none;
        color: #736B6B;
        background: transparent;
    }

    /* Menu End */
    /* Form Start */
    .loginSectionform label {
        display: block;
        position: relative;
        margin: 40px 0px;
    }

    .label-txt {
        position: absolute;
        top: -.6em;
        font-size: 15px;
        letter-spacing: 1px;
        color: #D3D3D3;
        font-weight: 400;
        transition: ease .3s;
    }

    .loginSectionform .input {
        width: 100%;
        background: transparent;
        border: none;
        outline: none;
    }

    .loginSectionform .line-box {
        position: relative;
        width: 100%;
        height: 2px;
        background: #BCBCBC;
    }

    .loginSectionform .line {
        position: absolute;
        width: 0%;
        height: 2px;
        top: 0px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--primary-color);
        transition: ease .6s;
    }

    .loginSectionform .input:focus+.line-box .line {
        width: 100%;
    }

    .loginSectionform .label-active {
        top: -2em;
    }

    .forgetSec {
        margin-top: -25px;
        display: flow-root;
    }

    .forgetSec a {
        font-size: 13px;
        color: #233BD5;
        font-weight: 600;
    }

    .logFormh6 {
        color: #000;
        padding: 10px 0;
        font-size: 14px;
    }

    .dontHave {
        color: #000;
        font-size: 13px;
        font-weight: 600;
        padding: 20px 0;
        text-align: center;
    }

    .dontHave a {
        color: #EC2438;
    }

    .weChart {
        background: #4CAF50;
        padding: 4px 7px;
        color: var(--light);
        font-size: 20px;
        border-radius: 50px;
        box-shadow: 0px 3px 4px rgba(0, 0, 0, .1);
        transition: all .3s ease-out;
        margin: auto 6px;
    }

    .weChart:hover {
        background: #4CAF50;
        opacity: .8;
        color: var(--white);
        box-shadow: 0px 3px 4px rgba(0, 0, 0, .1);
    }

    .qqChart {
        background: #344851;
        padding: 5px 10px;
        color: var(--light);
        font-size: 19px;
        border-radius: 50px;
        box-shadow: 0px 3px 4px rgba(0, 0, 0, .1);
        transition: all .3s ease-out;
        margin: auto 6px;
    }

    .qqChart:hover {
        background: #344851;
        opacity: .8;
        color: var(--white);
        box-shadow: 0px 3px 4px rgba(0, 0, 0, .1);
    }

    .weiBo {
        background: #EA533B;
        padding: 4px 8px;
        color: var(--light);
        font-size: 20px;
        border-radius: 50px;
        box-shadow: 0px 3px 4px rgba(0, 0, 0, .1);
        transition: all .3s ease-out;
        margin: auto 6px;
    }

    .weiBo:hover {
        background: #EA533B;
        opacity: .8;
        color: var(--white);
        box-shadow: 0px 3px 4px rgba(0, 0, 0, .1);
    }

    .readOnly {
        background: #F4F4F4 !important;
        padding: 5px;
    }

    .custom-control label {
        position: initial !important;
        margin: 0 !important;
    }

    .custom-control {
        margin-top: -25px;
        margin-bottom: 10px;
    }

    /* Form End */
    /* CopyRight Start */
    .copyRight {
        font-size: 12px;
        font-weight: 400;
    }

    /* CopyRight End */
    /* OTP Modal Start */
    .otpBox {
        padding: 20px;
    }

    .otpBox h6 {
        color: #BCBCBC;
        font-size: 17px;
    }

    .otpBox p {
        color: #000;
        display: block;
        font-weight: 500;
        font-size: 20px;
    }

    .otpBox a {
        color: #BCBCBC;
        font-weight: 400;
        display: block;
    }

    .otpBox input {
        margin: 20px 5px 10px 5px;
        border-radius: 3px;
    }

    .otpBoxicon {
        background: #E2F7F6;
        display: inline-block;
        padding: 20px;
        max-width: 100px;
        border-radius: 50px;
        margin-bottom: 10px;
    }

    .otpBox input[type=number] {
        height: 50px;
        width: 50px;
        font-size: 25px;
        text-align: center;
        border: 1px solid #dddddd;
    }

    .otpBox input[type=number]::-webkit-inner-spin-button,
    .otpBox input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .otpBox .modal-header {
        border-bottom: none;
        `
    }

    .otpBox .modal-header .close {
        padding: 0;
    }

    .row.main-login {
        padding: 25% 0px !important;
    }

    .submitBtn {
        background: #000 !important;
        color: #fff;
        border: none;
        letter-spacing: 1px;
        padding: 8px 50px;
        font-size: 14px;
        display: -webkit-inline-box;
        border-radius: 2px;
        line-height: 1.5;
        text-decoration: none;
        margin-top: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.10);
        transition: all 0.5s ease 0s;
        cursor: pointer;
    }
    .main-logo 
    {
        width: 200px !important;
        height: auto !important;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row main-login">
        <div class="col-md-12 login-page">
            <div class="text-center"><a href="{{url('login')}}">
              <img src="{{url(Setting::get('site_logo','/admin/img/logo/logo.png'))}}" class="main-logo">
            </a></div>
            <form class="loginSectionform" action="{{url('/admin/password/email')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="form-group">
                    <label>
                        <p class="label-txt">@lang('user.login.email')</p>
                        <input type="email" class="input" name="email" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                </div>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif  
                <br>
                <div class="form-group text-center">
                    <button type="submit" class="submitBtn">Send Reset Link</button>
                </div>
            </form>

            <p class="dontHave">@lang('user.register.have_account') <a href="{{url('/admin/login')}}">@lang('user.login.login')</a></p>
            <div class="copyRight text-center">
                <p>Wheel © 2019 . All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
@endsection