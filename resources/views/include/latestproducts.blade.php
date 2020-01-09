
<!-- New Latest Start -->
<section id="special-product">
    <div class="container">
        <div class="col-sm-12 sub-head">
            <h1>Latest News</h1>
        </div>
        <div class="col-md-12">
            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel2">
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#myCarousel2" data-slide="prev"></a>
                    <a class="right fa fa-chevron-right btn btn-success" href="#myCarousel2" data-slide="next"></a>
                </div>
                <div class="carousel-inner">

                    @forelse(wheelbrands($arraysplit=3) as $key => $brandImages)
                    <div class="item {{$key==0? 'active' : ''}}">
                        @foreach($brandImages as $branddetail)
                        <div class="col-sm-4 news-pro">
                            <div class="col-sm-6 news-img"><img src="{{asset($branddetail['image'])}}" style="width: 100%;"></div>
                            <div class="col-sm-6">
                                <a href="{{route('wheels')}}?brand={{base64_encode(json_encode(array($branddetail['brand'])))}}">
                                    <h2 class="news-title"><b>{{$branddetail['style']}}</b></h2>
                                    <h2 class="news-title">{{'Diameter : '.$branddetail['wheeldiameter']}}</h2>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @empty
                    <div class="item active">
                        <div class="row">
                            <div class="col-sm-4 news-pro">
                                <div class="col-sm-6 news-img"><img src="image/product.png"></div>
                                <div class="col-sm-6">
                                    <h1 class="news-date">01 JAN 2019</h1>
                                    <h2 class="news-title">Wheel</h2>
                                    <p class="news">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-sm-4 news-pro">
                                <div class="col-sm-6 news-img"><img src="image/product.png"></div>
                                <div class="col-sm-6">
                                    <h1 class="news-date">01 JAN 2019</h1>
                                    <h2 class="news-title">Wheel</h2>
                                    <p class="news">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-sm-4 news-pro">
                                <div class="col-sm-6 news-img"><img src="image/product.png"></div>
                                <div class="col-sm-6">
                                    <h1 class="news-date">01 JAN 2019</h1>
                                    <h2 class="news-title">Wheel</h2>
                                    <p class="news">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- New Latest End -->