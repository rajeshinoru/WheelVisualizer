/*! Customized Jquery from Punit Korat.  punit@onthemes.net  : www.onthemes.net
Authors & copyright (c) 2016: OnTheme - Webzeel Services(addonScript). */
/*! NOTE: This Javascript is licensed under two options: a commercial license, a commercial OEM license and Copyright by Webzeel Services - For use Only with OnTheme Themes for our Customers*/
$(document).ready(function() {
	
		$(".user-info a.dropdown-toggle").click(function(){
			$( ".account-link-toggle" ).slideToggle( "2000" );
			$(".header-cart-toggle").slideUp("slow");
			$(".language-toggle").slideUp("slow");
			$(".currency-toggle").slideUp("slow");
	  	});
			
		$("#cart button.dropdown-toggle").click(function(){
			$( ".header-cart-toggle" ).slideToggle( "2000" );														 
		   	$(".account-link-toggle").slideUp("slow");
			$(".language-toggle").slideUp("slow");
			$(".currency-toggle").slideUp("slow");
			$('.otsearchtoggle').parent().removeClass("active");
			$('.otsearchtoggle').hide('fast');
   	    });
		
		$("#form-currency button.dropdown-toggle").click(function(){
			$( ".currency-toggle" ).slideToggle( "2000" );	
			$(".language-toggle").slideUp("slow");
			$(".account-link-toggle").slideUp("slow");
			$(".header-cart-toggle").slideUp("slow");
			$('.otsearchtoggle').parent().removeClass("active");
			$('.otsearchtoggle').hide('fast');
			
    	});
		
        $("#form-language button.dropdown-toggle").click(function(){
			$( ".language-toggle" ).slideToggle( "2000" );																  
			$(".currency-toggle").slideUp("fast");
			$(".account-link-toggle").slideUp("slow");
			$(".header-cart-toggle").slideUp("slow");
			$('.otsearchtoggle').parent().removeClass("active");
			$('.otsearchtoggle').hide('fast');
       	});
		
	$( "#content" ).addClass( "left-column" ); 
	
	$(".option-filter .list-group-items a").click(function() {
		$(this).toggleClass('collapsed').next('.list-group-item').slideToggle();
	});

	
	$("ul.breadcrumb li:nth-last-child(1) a").addClass('last-breadcrumb').removeAttr('href');

	$("#column-left .products-list .product-thumb, #column-right .products-list .product-thumb").unwrap();
	$("#column-left .list-products .product-thumb, #column-right .list-products .product-thumb").unwrap();

	$("#content > h1, .account-wishlist #content > h2, .account-address #content > h2, .account-download #content > h2").first().addClass("page-title");
	
	$("#content > .page-title").wrap("<div class='page-title-wrapper'><div class='container'></div></div>");
	$(".page-title-wrapper .container").append($("ul.breadcrumb"));
	$(".page-title-wrapper").prependTo($(".header-content-title"));

	
	$('#column-left .product-thumb .image, #column-right .product-thumb .image').attr('class', 'image col-xs-4 col-sm-4 col-md-4');
	$('#column-left .product-thumb .thumb-description, #column-right .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-8 col-sm-8 col-md-8');

		$('#content .row > .product-list .product-thumb .image').attr('class', 'image col-xs-5 col-sm-5 col-md-3');
		$('#content .row > .product-list .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-7 col-sm-7 col-md-9');
		$('#content .row > .product-grid .product-thumb .image').attr('class', 'image col-xs-12');
		$('#content .row > .product-grid .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-12');

		$('select.form-control').wrap("<div class='select-wrapper'></div>");
		$('input[type="checkbox"]').wrap("<span class='checkbox-wrapper'></span>");
		$('input[type="checkbox"]').attr('class','checkboxid');
		$('input[type="radio"]').wrap("<span class='radio-wrapper'></span>");
		$('input[type="radio"]').attr('class','radioid');
		
		$('#column-left .products-list .btn-cart').removeAttr('data-original-title');
		
		$("#otcmsrightbanner").appendTo(".top-column");
		$('#otcmsclient, #otcmsbanner').wrapAll("<div class='client-banner'><div class='row'></div></div>");
/*-------start go to top---------*/		
	$( "body" ).append( "<div class='backtotop-img'><div class='goToTop otbox'></div></div>" );
	$( "body" ).append( "<div id='goToTop' title='Top' class='goToTop otbox-img'></div>" );
	$("#goToTop").hide();
/*-------end go to top---------*/		
/*---------------------- Inputtype Js Start -----------------------------*/
$('.checkboxid').change(function(){
if($(this).is(":checked")) {
$(this).addClass("chkactive");
$(this).parent().addClass('active');
} else {
$(this).removeClass("chkactive");
$(this).parent().removeClass('active');
}
});

$(function() {
var $radioButtons = $('input[type="radio"]');
$radioButtons.click(function() {
$radioButtons.each(function() {
$(this).parent().toggleClass('active', this.checked);
});
});
});
/*---------------------- Inputtype Js End -----------------------------*/

/*------------- Slider -Loader Js Strat ---------------*/
$(window).load(function() 
{ 
$(".otloading-bg").fadeOut("slow");
})
/*------------- Slider -Loader Js End ---------------*/
/* Slider Load Spinner */
$(window).load(function() { 
	$(".slideshow-panel .otloading-bg").removeClass("otloader");
});

/* --------------- Start Sticky-header JS ---------------*/	

	function header() {	
	 if (jQuery(window).width() > 1200){
		 if (jQuery(this).scrollTop() > 500)
			{    
				jQuery('.header-bottom-block').addClass("fixed");
				 
			}else{
			 jQuery('.header-bottom-block').removeClass("fixed");
			}
		} else {
		  jQuery('.header-bottom-block').removeClass("fixed");
		  }
	}
	 
	$(document).ready(function(){header();});
	jQuery(window).resize(function() {header();});
	jQuery(window).scroll(function() {header();});
	
/* --------------- End Sticky-header JS ---------------*/

/* ----------- SmartBlog Js Start ----------- */
	 var otblog = $("#otsmartblog-carousel");
      otblog.owlCarousel({
		 autoPlay : true,
		 stopOnHover  : true,
     	 items :4, //10 items above 1000px browser width
     	 itemsDesktop : [1300,3], 
     	 itemsDesktopSmall : [991,3], 
     	 itemsTablet: [767,2], 
     	 itemsMobile : [480,1],
		 navigation: true,
		 pagination: false
      });

      // Custom Navigation Events

      $(".otblog_next").click(function(){
        otblog.trigger('owl.next');
      })
      $(".otblog_prev").click(function(){
        otblog.trigger('owl.prev');
      })
 /* ----------- SmartBlog Js End ----------- */

/*----------------- OT Testimonial Js Start ------------------------*/
	 var otclient = $("#otclient-carousel");
      otclient.owlCarousel({
		 autoPlay : true,
		 stopOnHover  : true,
     	 items : 1, //10 items above 1000px browser width
     	 itemsDesktop : [1200,1], 
     	 itemsDesktopSmall : [991,1], 
     	 itemsTablet: [767,1], 
     	 itemsMobile : [480,1] 
      });
/*----------------- OT Testimonial Js End ------------------------*/
/*-------------------------- latest js Start ------------------------------ */
var otbestsellerproduct = $("#content .bestseller-carousel .bestseller-items.products-carousel");
    otbestsellerproduct.owlCarousel({
	items:3,
    itemsDesktop : [1300,3],
    itemsDesktopSmall : [1199,2],
    itemsTablet: [767,1],
    itemsMobile : [480,1],
	navigation: true,
	pagination: false
});


var cat_feature = $(".category-feature.ot-carousel");
      cat_feature.owlCarousel({
     	 autoPlay : true,
		 stopOnHover  : true,
		 pagination : false,
     	 items : 5, //10 items above 1000px browser width
     	 itemsDesktop : [1400,5], 
     	 itemsDesktopSmall : [1200,4], 
     	 itemsTablet: [1199,3],
		 itemsTabletSmall: [767,2],
     	 itemsMobile : [480,1] 
});
      // Custom Navigation Events
	  $(".otfcat_prev").click(function(){
        cat_feature.trigger('owl.prev');
      })
      $(".otfcat_next").click(function(){
        cat_feature.trigger('owl.next');
      })
	  
var otrelated = $(".related-items.products-carousel");
    otrelated.owlCarousel({
	items:4,
   	itemsDesktop : [1200,3], 
	itemsDesktopSmall : [991,3], 
	itemsTablet: [767,2], 
	itemsMobile : [480,1],
	navigation: true,
	pagination: false
});
	
/*-------------------------- latest js End ------------------------------ */
// Carousel Counter
	colsCarousel = $('#column-right, #column-left').length;
	if (colsCarousel == 2) {
		ci=2;
	} else if (colsCarousel == 1) {
		ci=5;
	} else {
		ci=5;
}
// product Carousel
$("#content .products-list .products-carousel").owlCarousel({
	items: ci,
	itemsDesktop : [1300,4], 
	itemsDesktopSmall : [1199,3], 
	itemsTablet: [991,3],
	itemsTabletSmall: [767,2],
	itemsMobile : [480,1],
	navigation: true,
	pagination: false
});

$(".customNavigation .next").click(function(){
	$(this).parent().parent().find(".products-carousel").trigger('owl.next');
})
$(".customNavigation .prev").click(function(){
	$(this).parent().parent().find(".products-carousel").trigger('owl.prev');
})
$(".products-list .customNavigation").addClass('owl-navigation');

/* ---------------- start ontheme link more menu ----------------------*/
	var max_link = 3;
	var items = $('#ottoplink_block ul li');
	var surplus = items.slice(max_link, items.length);
	surplus.wrapAll('<li class="more_menu ottoplink"><ul class="top-link clearfix">');
	$('.more_menu').prepend('<a href="#" class="level-top">More</a>');
	$('.more_menu').mouseover(function(){
	$(this).children('ul').addClass('shown-link');
	})
	$('.more_menu').mouseout(function(){
	$(this).children('ul').removeClass('shown-link');
	});
	
/* ---------------- End ontheme link more menu ----------------------*/
/*-----------start menu toggle ------------*/
	$('.left-main-menu .OT-panel-heading').click(function() { 
		$('.left-main-menu .OT-panel-heading').toggleClass('active'); 
		$('.left-main-menu .menu-category').slideToggle("2000"); 
	}); 
	
/*-----------End menu toggle ------------*/
/* ---------------- start ontheme more menu ----------------------*/
		var max_elem = 10;	
		var menu = $('.main-category-list .menu-category ul.dropmenu > li');	
		if ( menu.length > max_elem ) {
		$('.main-category-list .menu-category ul.dropmenu').append('<li class="more"><div class="more-menu"><span class="categories">More</span></div></li>');
		}
		
		$('.main-category-list .menu-category ul.dropmenu .more-menu').click(function() {
		if ($(this).hasClass('active')) {
		menu.each(function(j) {
		if ( j >= max_elem ) {
		$(this).slideUp(200);
		}
		});
		$(this).removeClass('active');
		$('.more-menu').html('<span class="categories">More</span>');
		} else {
		menu.each(function(j) {
		if ( j >= max_elem  ) {
		$(this).slideDown(200);
		}
		});
		$(this).addClass('active');
		$('.more-menu').html('<span class="categories">Less</span>');
		}
		});
		
		menu.each(function(j) {
		if ( j >= max_elem ) { 
		$(this).css('display', 'none');
		}
		});
/* ---------------- End ontheme more menu ----------------------*/


/* Go to Top JS START */
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 150) {
				$('.goToTop').fadeIn();
			} else {
				$('.goToTop').fadeOut();
			}
		});
	
		// scroll body to 0px on click
		$('.goToTop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1000);
			return false;
		});
	});
	/* Go to Top JS END */

	/* Active class in Product List Grid START */
	$('#list-view').click(function() {
		$('#grid-view').removeClass('active');
		$('#list-view').addClass('active');
		$('#content .row > .product-list .product-thumb .image').attr('class', 'image col-xs-5 col-sm-5 col-md-3');
		$('#content .row > .product-list .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-7 col-sm-7 col-md-9');
		//$(".product-layout.product-list .product-thumb .button-group .btn-cart").removeAttr('data-original-title'); /* for remove tooltrip */
	});
	$('#grid-view').click(function() {
		$('#list-view').removeClass('active');
		$('#grid-view').addClass('active');
		$('#content .row > .product-grid .product-thumb .image').attr('class', 'image col-xs-12');
		$('#content .row > .product-grid .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-12');
		//$(".product-layout.product-grid .product-thumb .button-group .btn-cart").attr('data-original-title','Add to cart');/* for add tooltrip */	
	});
	if (localStorage.getItem('display') == 'list') {
		$('#list-view').addClass('active');
	} else {
		$('#grid-view').addClass('active');
	}
	/* Active class in Product List Grid END */

});
// Documnet.ready() over....
/* FilterBox - Responsive Content*/
function optionFilter(){
	if ($(window).width() <= 991) {
		$('#column-left .option-filter-box').appendTo('.row #content .category-description');
		$('#column-right .option-filter-box').appendTo('.row #content .category-description');
	} else {
		$('.row #content .category-description .option-filter-box').appendTo('#column-left .option-filter');
		$('.row #content .category-description .option-filter-box').appendTo('#column-right .option-filter');
	}
}
$(document).ready(function(){ optionFilter(); });
$(window).resize(function(){ optionFilter(); });
/*category filter js*/

function footerToggle() {
	
	if($( window ).width() < 992) {
		
		$("footer .footer-column h5").addClass( "toggle" );
		$("footer .footer-column ul").css( 'display', 'none' );
		$("footer .footer-column.active ul").css( 'display', 'block' );
		$("footer .footer-column h5.toggle").unbind("click");
		$("footer .footer-column h5.toggle").click(function() {
			$(this).parent().toggleClass('active').find('ul.list-unstyled').slideToggle( "fast" );
		});
		
		/*$("#otcmsfooter h5").addClass( "toggle" );
		$("#otcmsfooter .list-unstyled").css( 'display', 'none' );
		$("#otcmsfooter .list-unstyled.active").css( 'display', 'block' );
		$("#otcmsfooter h5.toggle").unbind("click");
		$("#otcmsfooter h5.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.list-unstyled').slideToggle( "fast" );
			
		});*/
		
		$("#column-left .panel-heading").addClass( "toggle" );
		$("#column-left .list-group").css( 'display', 'none' );
		$("#column-left .panel-default.active .list-group").css( 'display', 'block' );
		$("#column-left .panel-heading.toggle").unbind("click");
		$("#column-left .panel-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.list-group').slideToggle( "fast" );
		});
		
		$("#column-left .box-heading").addClass( "toggle" );
		$("#column-left .products-carousel").css( 'display', 'none' );
		$("#column-left .products-list.active .products-carousel").css( 'display', 'block' );
		$("#column-left .box-heading.toggle").unbind("click");
		$("#column-left .box-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.products-carousel').slideToggle( "fast" );
		});
		
		$("#otcmstestimonial .title_block").addClass( "toggle" );
		$("#otcmstestimonial #ottestimonial-carousel").css( 'display', 'none' );
		$("#otcmstestimonial .ottestimonial-inner.active ottestimonial-carousel").css( 'display', 'block' );
		$("#otcmstestimonial .title_block.toggle").unbind("click");
		$("#otcmstestimonial .title_block.toggle").click(function() {
		$(this).parent().toggleClass('active').find('#ottestimonial-carousel').slideToggle( "fast" );
		});
		
	} else {
		/*$("#otcmsfooter h5.toggle").unbind("click");
		$("#otcmsfooter h5").removeClass( "toggle" );
		$("#otcmsfooter .list-unstyled.active").css( 'display', 'block' );*/
		
		$("footer .footer-column h5.toggle").unbind("click");
		$("footer .footer-column h5").removeClass('toggle');
		$("footer .footer-column ul.list-unstyled").css('display', 'block');
		
		$("#column-left .panel-heading").unbind("click");
		$("#column-left .panel-heading").removeClass( "toggle" );
		$("#column-left .list-group").css( 'display', 'block' );

		$("#column-left .box-heading").unbind("click");
		$("#column-left .box-heading").removeClass( "toggle" );
		$("#column-left .products-carousel").css( 'display', 'block' );
		
		$("#otcmstestimonial .title_block").unbind("click");
		$("#otcmstestimonial .title_block").removeClass( "toggle" );
		$("#otcmstestimonial #ottestimonial-carousel").css( 'display', 'block' );
	}
}

$(document).ready(function() {footerToggle();});
$(window).resize(function() {footerToggle();});

/* Category List - Tree View */
function categoryListTreeView() {
	$(".category-treeview li.category-li").find("ul").parent().prepend("<div class='list-tree'></div>").find("ul").css('display','none');

	$(".category-treeview li.category-li.category-active").find("ul").css('display','block');
	$(".category-treeview li.category-li.category-active").toggleClass('active');
}
$(document).ready(function() {categoryListTreeView();});


/* Category List - TreeView Toggle */
function categoryListTreeViewToggle() {
	$(".category-treeview li.category-li .list-tree").click(function() {
		$(this).parent().toggleClass('active').find('ul').slideToggle();
	});
}
$(document).ready(function() {categoryListTreeViewToggle();});

function menuToggle() {
	if($( window ).width() < 992) {
		$(".main-category-list .menu-category").css('display', 'none');
		
		$(".main-category-list ul.dropmenu li.OT-Sub-List > i").remove();
		$(".main-category-list ul.dropmenu .dropdown-menu ul li.dropdown-inner > i").remove();

		$(".main-category-list ul.dropmenu > li.OT-Sub-List > a").after("<i class='fa fa-angle-down'></i>");
		$(".menu-category > li.OT-Sub-List .dropdown-inner ul > li.dropdown a.single-dropdown").after("<i class='fa fa-angle-down'></i>");
		
		$(".main-category-list .OT-panel-heading").unbind("click");
		$('.main-category-list .OT-panel-heading').click(function(){
			$(this).parent().toggleClass('otactive').find('.menu-category').slideToggle( "fast" );
		});
		$(".main-category-list ul.dropmenu > li.OT-Sub-List > i").unbind("click");
		$(".main-category-list ul.dropmenu > li.OT-Sub-List > i").click(function() {
			$(this).parent().toggleClass("active").find("ul").first().slideToggle();
		});
		
		$(".menu-category > li.OT-Sub-List .dropdown-inner ul > li.dropdown > i").unbind("click");
		$(".menu-category > li.OT-Sub-List .dropdown-inner ul > li.dropdown > i").click(function() {
			$(this).parent().toggleClass("active").find(".dropdown-menu").slideToggle();
		});
	}
	else {
		
		$(".menu-category > li.OT-Sub-List .dropdown-inner ul > li.dropdown > i").unbind("click");
		$(".main-category-list").removeClass('otactive');
		//$(".main-category-list .menu-category").css('display', 'block');
		$(".menu-category ul.dropmenu li.OT-Sub-List > i").remove();
		$(".menu-category > li.OT-Sub-List .dropdown-inner ul > li.dropdown > i").remove();
	}
}
$(document).ready(function() {menuToggle();});
$( window ).resize(function(){menuToggle();});


/* Animate effect on Review Links - Product Page */
$(".product-total-review, .product-write-review").click(function() {
    $('html, body').animate({ scrollTop: $(".product-tabs").offset().top }, 900);
});

function responsivecolumn()
{
	if ($(window).width() <= 991)
	{
		$('#page > .container > .row > #column-left').appendTo('#page > .container > .row');
		$('#page > .container > .row > #column-right').appendTo('#page > .container > .row');
	}
	else if($(window).width() >= 992)
	{
		$('#page > .container > .row > #column-left').prependTo('#page > .container > .row');
		$('#page > .container > .row > #column-right').prependTo('#page > .container > .row');
	}
}
$(window).resize(function(){responsivecolumn();});
$(window).ready(function(){responsivecolumn();});
/*category filter js end*/

