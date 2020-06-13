@extends('layouts.app') 
@section('shop_by_vehicle_css')
<link rel="stylesheet" href="{{ asset('css/wheels.css') }}"> 
@endsection 
@section('metakeywords')
<?=@MetaViewer('About');?>
@endsection 
@section('content')

<style>
    .ban-ser{border: 1px solid #ddd9d9 !important;}
    .wheel-list{column-width: 15em;padding: 10px 15px !important;}
    .wheel-list li a{color: #474646;display: block;font-size: 12px !important;text-align: center;font-family: Montserrat !important;}
    .wheel-list ul{margin: 0;padding: 0;list-style-type: none;}
    .wheel-list li{padding: 3px;margin: 3px;margin-top: 3px;margin-top: 3px;border: 1px solid #ccc;box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, .05);background-color: #fff;border-radius: 2px !important;}
    .wheel-list ul li:first-child{margin-top: 0;}
    #heading h1{font-family: Montserrat;color: #121214;font-size: 18px !important;text-align: center;font-weight: 700 !important;margin:20px 0px;}
    .col-sm-3.payments3-card img{width: 100% !important;}
    .col-sm-3.payments-card{text-align: center !important;}
    .prod-headinghome p{text-align: justify;margin: 10px 0px;color: #121214;line-height: 30px;font-family: poppins !important;font-size: 12px !important;}
    .col-sm-4.wheel-img{text-align: center !important;}
    /* pro Start */
    .hometabled{display: table;text-align: center;width: 100%;background: #fff;box-shadow: 0 2px 3px 0 rgba(180, 180, 180, .6) !important;border: 1px solid #d8d7d7;margin-bottom: 15px;padding: .5%;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;}
    .pTopBar{display: table;width: 100%;padding: .5% 1%;margin-bottom: 1%;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;background: #0e1661 !important;}
    .pTopCell{display: table-cell;width: 50%;color: #fff;text-shadow: 0 1px 1px rgba(0, 0, 0, .75);font-size: 12px;font-family: Montserrat !important;}
    .pTopCell.Phone a{color: #fff;text-decoration: none;}
    .asItems{border: 0px;}
    .asItems{padding: 0;padding-top: 0px;width: 100%;padding-top: 5px;text-align: center;margin: 0 auto 10px;background: #fff;border: 1px solid #cecece;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;box-shadow: 0 0 3px rgba(0, 0, 0, .125);font-family: open sans, Arial, sans-serif;}
    .asItems{text-align: center;font-family: open sans, Arial, sans-serif;}
    .gridList{margin: 0 auto;padding: 0;width: auto;display: table;}
    .gridItem{display: inline-block;width: 210px;text-align: center;padding: 5px;}
    .homecelld b{color: #222 !important;font-size: 12px !important;font-family: Montserrat !important;}
    .hometabled{margin: 25px 0px !important;}
    .gridList.wheels.suggested .gridItem homeapge1{height: 180px;}
    .asItems{border: 0px;}
    .prod-headinghome h2{color: #0e1661 !important;text-align: center;font-family: Montserrat !important;font-size: 18px !important;font-weight: 700 !important;}
    .prod-heading p{color: rgb(18, 18, 20) !important;font-family: Montserrat !important;font-size: 12px !important;}
    .prod-heading-center{text-align: center;}
    .prod-headinghome h3{width: 100%;font-size: medium;font-family: open sans, Arial, sans-serif;color: #000 !important;font-weight: 600 !important;text-align: center;}
    .prod-heading-center p{color: #0e1661 !important;font-size: 15px;line-height: 30px !important;font-family: Montserrat !important;font-weight: 700 !important;}
    .prod-heading-bold{font-family: open sans,Arial,sans-serif;color: #121214;}
    b{font-weight: bold;}
    .h1-nl{font-size: 20px;}
    hr{border: 0.5px solid #ccc !important;}
    #produst,#special-product,footer,#bott,.container.brand-logo{display: none !important;}
    .container-fluid.home-page{padding: 0px 0px !important;background: #f1f1f1 !important;}
    .prod-heading-bold a{color: #337ab7 !important;}
    .prod-headinghome h1{font-family: Montserrat !important;font-size: 18px !important;font-weight: 700 !important;margin:20px 0px;}
    .prod-headinghome a{color: #0e1661;}
    .abt-img{text-align: center;}
    .abt-img .prod-heading-bold h1{font-family: Montserrat !important;font-size: 12px !important;font-weight: 700 !important;}
    .abt-img .prod-heading-bold h2{font-family: Montserrat !important;font-size: 12px !important;font-weight: 700 !important;}
    .prod-heading-bold{padding:94px 0px !important;}
    #about-us{padding: 20px 0px !important;}
</style>
<br>

@include('include.sizelinks')

<!-- About Section Start -->
<section id="about-us" class="about-page">
  <div class="container">
    <div class="about-page title-header">
      <div id="heading" class="title">
        <h1>Traction</h1>
        <p>When picking tires, it's important to consider the sort of road surfaces you drive on. Dry roads, wet roads, snow, and mud each require their own characteristics for a tire to provide effective traction. This guide will cover what characteristics to look for in a tire, and help you identify the best tires for your needs.</p>
      </div>
    </div>
    <div class="row main-about">
      <div class="col-sm-7 abt-cont">
        <div class="prod-headinghome">
            <h1>DRY</h1>
            <p>Assuming that you're driving on a dry, level road in warm weather, a tire's traction comes solely from its ability to put its tread in contact with the road. The frictional forces between tread rubber and the road surface provide the traction that a tire needs to react to braking, steering, or acceleration input. The more tread-to-road contact the tire has, the more traction a tire has.</p>

            <p>Traction depends on the size of its contact patch, or the rubber area touching the road. A smooth tread with a low void ratio and narrower spacing between blocks is ideal for dry traction and performance, as this gives the tire more rubber surface area and puts more tread against the road. Wide, short profile ratios are also ideal, as this gives the tire a wider tread and thus a larger contact patch.</p>

            <p>High performance tires generally have fewer lateral grooves and large, wide tread blocks for increased contact area, which in turn improves traction and handling response. Many have solid, rib-shaped blocks running all around the tire that provide continuous tread-to-road contact. Fewer grooves on the shoulders helps to improve cornering, while fewer grooves on the center of the tread helps to improve accelerating and decelerating.</p>

            <p>Dry traction also depends on the rubber compounds in the tire's tread. A tire's round shape compresses slightly against the road's flat surface, adhering to the shape of the road. This puts more of its tread in contact with the road than if the tire stayed perfectly round. If the rubber tread compounds are softer and more flexible, the tire compresses better and adheres to the road more firmly. Additionally, some rubber compounds have higher frictional coefficents with asphalt and are better for traction on dry roads.</p>
        </div>
      </div>
      <div class="col-sm-5 abt-img">
        <div class="prod-heading-bold">
            <img src="{{asset('image/Traction-Guide-1.png')}}" alt="About Us Discounted Wheel Warehouse" style="max-width: 100%; height: auto;" width="421" height="270">
        </div>
      </div>
    </div>    
    <div class="row main-about">

      <div class="col-sm-5 abt-img">
        <div class="prod-heading-bold">
            <img src="{{asset('image/Traction-Guide-2.png')}}"   style="max-width: 100%; height: auto;" width="421" height="270">
        </div>
      </div>
      <div class="col-sm-7 abt-cont">
        <div class="prod-headinghome">
            <h1>WET</h1>
            <p>Wet traction also relies on tread-to-road contact. The difference for wet roads is that tires push through water on the road faster than the water can flow aside, causing water to build up in front of the tires. Eventually, enough water builds up to push under the contact patch and lift the tires off the road, causing sudden loss of traction and control. This is called aquaplaning or hydroplaning. Wet traction is based on a tire's ability to resist aquaplaning and keep its tread touching the road.</p>

            <p>Tread depth is the most important contributor to aquaplane resistance and wet traction. The circumferential grooves in a tire's tread serve to channel water buildup away from the contact patch before it separates tread and road, preventing aquaplaning. As the tread wears, the grooves become shallower and can't evacuate water as effectively, diminishing the tire's capabilities in rainy weather.</p>

            <p>Wet traction capabilities rely on both the tread blocks touching the road and the tread void areas not touching the road. The grooves need to be deep and wide enough to allow water to drain away efficiently, but also small and narrow enough so the tire has plenty of tread-to-road contact area.</p>

            <p>At lower speeds or in milder wet conditions, aquaplane resistance depends on how well the tread rubber adheres to the road. The soft, flexible rubber compounds that are great on dry roads also stick well to wet pavement, making it harder for water buildup to separate the tread from the road. At higher driving speeds or in heavier wet conditions, wet traction depends more on how quickly the tread can disperse water buildup. This means that the tire's circumferential and lateral grooves are arranged in a pattern that allows water to evacuate more efficiently. For instance, directional tires are specially designed to channel water from the contact patch out through the shoulders as they roll, making them great for wet traction.</p>
        </div>
      </div>
    </div>

    <div class="row main-about">
      <div class="col-sm-7 abt-cont">
        <div class="prod-headinghome">
            <h1>SNOW</h1>
            <p>Snow traction depends on two factors. Firstly, the tire must be capable of functioning in cold temperatures. The rubber compounds in a summer tire that stick so well to wet and dry roads in warm weather also tend to freeze below 45°F (7°C), becoming hard and incapable of road adhesion. Snow traction requires a tire to have specialized tread compounds that stay soft and flexible in winter conditions. Many all-season and winter tires contain silica in their tread compounds, which lowers the rubber's freezing temperature and allows the tread to retain its flexibility in snow conditions.</p>

            <p>Additionally, a tire needs to overcome the instability of snowy surfaces. Snow traction benefits from densely placed lateral grooves and many small tread blocks, which form numerous block edges that can dig into soft snow or drag against slippery ice to gain a foothold. A tire designed for snow traction also features an extensive pattern of tiny slits, or sipes, across its tread. Sipes with zigzag or interlocking shapes provide biting edges to grip looser snow, while keeping the tread blocks stable on more compact snow surfaces.</p>

            <p>Due to slush and water buildup from melting snow, snow traction also benefits from tire characteristics that improve aquaplane resistance. Deep, wide circumferential grooves are necessary to channel away water and prevent aquaplaning on slushy or snow-covered roads. Tread groove patterns that are optimized for efficient water evacuation, such as directional treads, are also ideal for snow traction.</p>

            <p>Snow traction relies on the grooves and sipes filling with snow as the tire rolls. This allows the tire to not only gain traction from tread-to-snow contact, but also snow-to-snow contact. Deeper grooves are better for snow traction, as they allow the tire to pack more snow into the tread. Tall, narrow profile ratios are also preferable, as a narrower tire doesn't have to plow through as much snow.</p>
        </div>
      </div>
      <div class="col-sm-5 abt-img">
        <div class="prod-heading-bold">
            <img src="{{asset('image/Traction-Guide-3.png')}}"   style="max-width: 100%; height: auto;" width="421" height="270">
        </div>
      </div>
    </div> 

    <div class="row main-about">

      <div class="col-sm-5 abt-img">
        <div class="prod-heading-bold">
            <img src="{{asset('image/Traction-Guide-4.png')}}"   style="max-width: 100%; height: auto;" width="421" height="270">
        </div>
      </div>
      <div class="col-sm-7 abt-cont">
        <div class="prod-headinghome">
            <h1>MUD/DIRT</h1>
            <p>Unlike with paved roads, mud and dirt traction relies more on the tread voids rather than the contact patch. Offroad surfaces like dirt, mud, and grass tend to be loose, uneven, or both, making them challenging to grip through rubber-on-surface friction alone. Instead, off-road traction depends more on how well a tire's tread attacks, bites into, and grapples its way across the terrain.</p>

            <p>The more aggressive the tread is, the more dirt and mud traction a tire has. Tires designed for offroad driving often have irregular block shapes and wide voids that excel at clawing over rough, uneven surfaces or biting into loose, unstable terrains. Deeper voids and taller tread blocks allow a tire to dig deeper into soft soils and gain a firmer hold on rugged terrains. Sidewall lugs, or aggressive shoulder blocks that extend over the upper sidewall, are especially great at securing the grip needed to climb out of extreme offroad obstacles like deep mud or quicksand.</p>

            <p>Road adhesion and flexibility is especially important when it comes to dirt and mud traction. The tread compound needs to be flexible enough to adhere to the bumps, slopes, and dips of the terrain, while also durable enough to resist offroad hazards. Dirt and mud contain all sorts of coarse particles such as sand, gravel, or rocks, and the tread needs to be able to withstand abrasions when striking the terrain aggressively.</p>

            <p>Dirt and mud traction relies on the tire's ability to keep its tread voids clear. A tire loses its offroad gripping power as the voids become clogged with debris such as dirt clods, sticky mud, or pieces of gravel. Wider spacing between blocks is better for dirt and mud traction, as this allow debris to escape the tread voids more easily. Some tires designed for off-road traction have tiny "stone ejector" ribs to prevent gravel and other debris from getting lodged in the voids, keeping the tread clean and capable of attack grip</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About Section End -->


@endsection
@section('custom_scripts')
<!--  -->
@endsection
