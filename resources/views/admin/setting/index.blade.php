@extends('admin.layouts.app')

@section('content')
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Application Details</a></li>
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
                                                    <form action="{{url('admin/setting/store')}}" class=" needsclick addcourse" method="POST" id="demo1-upload"  enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-4">Site Logo</div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <input type="file" accept="image/*" name="site_logo" class="dropify form-control-file" aria-describedby="fileHelp" required="" data-default-file="{{asset(Setting::get('site_logo'))}}">
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
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- tinymce Start-->
        <div class="tinymce-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="tinymce-single responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Basic Summernote WYSIWYG editor</h2>
                                <p>The fastest way to get Summernote WYSIWYG editor is powerfull JavaScript plugin. you can easily maintance typography system.</p>
                            </div>
                            <div id="summernote1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="tinymce-single">
                            <div class="alert-title">
                                <h2>Typography Summernote WYSIWYG editor</h2>
                                <p>The fastest way to get Summernote WYSIWYG editor is powerfull JavaScript plugin. you can easily maintance typography system.</p>
                            </div>
                            <div id="summernote2">
                                <div class="note-editable panel-body" contenteditable="true" style="height: 200px;">
                                    <h2 style="font-family: &quot;Open Sans&quot;, sans-serif; font-size: 20px;">
                                        <span style="font-weight: bold;">Summernote WYSIWYG editor</span>
                                    </h2>
                                    <p style="color:rgb(51, 51, 51);font-size: 14px;line-height: 24px;">The fastest way to get Summernote WYSIWYG editor is powerfull JavaScript plugin. you can easily maintance typography system</p>
                                    <p style="font-size: 14px; line-height: 24px;"><span style="color: rgb(206, 0, 0);">The fastest way to get Summernote WYSIWYG editor is powerfull JavaScript plugin. you can easily maintance typography system</span>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="tinymce-single mg-t-30">
                            <div class="alert-title">
                                <h2>Table Summernote WYSIWYG editor</h2>
                                <p>The fastest way to get Summernote WYSIWYG editor is powerfull JavaScript plugin. you can easily maintance typography system.</p>
                            </div>
                            <div id="summernote3">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>9</td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>12</td>
                                            <td>13</td>
                                            <td>14</td>
                                            <td>15</td>
                                            <td>16</td>
                                            <td>17</td>
                                            <td>18</td>
                                            <td>19</td>
                                            <td>20</td>
                                        </tr>
                                        <tr>
                                            <td>21</td>
                                            <td>22</td>
                                            <td>23</td>
                                            <td>24</td>
                                            <td>25</td>
                                            <td>26</td>
                                            <td>27</td>
                                            <td>28</td>
                                            <td>29</td>
                                            <td>30</td>
                                        </tr>
                                        <tr>
                                            <td>31</td>
                                            <td>32</td>
                                            <td>33</td>
                                            <td>34</td>
                                            <td>35</td>
                                            <td>36</td>
                                            <td>37</td>
                                            <td>38</td>
                                            <td>39</td>
                                            <td>40</td>
                                        </tr>
                                        <tr>
                                            <td>41</td>
                                            <td>42</td>
                                            <td>43</td>
                                            <td>44</td>
                                            <td>45</td>
                                            <td>46</td>
                                            <td>47</td>
                                            <td>48</td>
                                            <td>49</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                            <td>
                                                <br>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="tinymce-single mg-t-30">
                            <div class="alert-title">
                                <h2>Images Summernote WYSIWYG editor</h2>
                                <p>The fastest way to get Summernote WYSIWYG editor is powerfull JavaScript plugin. you can easily maintance typography system.</p>
                            </div>
                            <div id="summernote4">
                                <ul>
                                    <li style="text-align: center; ">
                                        <br>
                                    </li>
                                    <li style="text-align: center; ">
                                        <h2 style="text-align: center; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(51, 51, 51); font-size: 20px;">Summernote WYSIWYG editor</h2>
                                        <p style="text-align: center; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(51, 51, 51); font-size: 20px;"><span style="font-size: 14px; text-align: start;">The fastest way to get Summernote WYSIWYG editor is powerfull JavaScript plugin. you can easily maintance typography system.</span>
                                            <br>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tinymce End-->
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