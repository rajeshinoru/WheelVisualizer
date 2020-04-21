
// brand based filters for wheels
$('.tirebrand').on('click', function() {
    // var brand = $(this).val();   

    var brand = $('.tirebrand:checked').map(function() {
        return $(this).val();
    }).get();

    if (brand != '') {
        updateParamsToUrl('tirebrand', brand);
    } else {
        removeParamsFromUrl('tirebrand');
    }

});

// brand based filters for wheels
$('.tirespeedrating').on('click', function() {
    // var brand = $(this).val();   

    var speedrating = $('.tirespeedrating:checked').map(function() {
        return $(this).val();
    }).get();

    if (speedrating != '') {
        updateParamsToUrl('tirespeedrating', speedrating);
    } else {
        removeParamsFromUrl('tirespeedrating');
    }

});


// brand based filters for wheels
$('.tireloadindex').on('click', function() {
    // var brand = $(this).val();   

    var index = $('.tireloadindex:checked').map(function() {
        return $(this).val();
    }).get();

    if (index != '') {
        updateParamsToUrl('tireloadindex', index);
    } else {
        removeParamsFromUrl('tireloadindex');
    }

});



$('#minprice').on('change', function(){
  
    $('#maxprice').children("option").each(function(){
        var opt = $(this),
        optVal = parseInt(opt.attr('value'));

        if ( optVal <= $('#minprice').val() ) {
          opt.attr('disabled','disabled');
        } else {
          opt.removeAttr('disabled');
        }

    });
    if ($('#minprice').val() != '') {
        updateParamsToUrl('minprice', $('#minprice').val());
    } else {
        removeParamsFromUrl('minprice');
    }
});

$('#maxprice').on('change', function(){
  
  $('#minprice').children("option").each(function(){
    var opt = $(this),
        optVal = parseInt(opt.attr('value'));
    
    if ( optVal != 0 && optVal >= $('#maxprice').val() ) {
      opt.attr('disabled','disabled');
    } else {
      opt.removeAttr('disabled');
    }
    
  });
  
    if ($('#maxprice').val() != '') {
        updateParamsToUrl('maxprice', $('#maxprice').val());
    } else {
        removeParamsFromUrl('maxprice');
    }
});

// wheeldiameter based filters for wheels
$('.wheeldiameter').on('click', function() {
    // var diameter = $(this).val();    

    var diameter = $('.wheeldiameter:checked').map(function() {
        return $(this).val();
    }).get();

    if (diameter != '') {
        updateParamsToUrl('diameter', diameter);
    } else {
        removeParamsFromUrl('diameter');
    }
});

// wheeldwidth based filters for wheels
$('.wheelwidth').on('click', function() {

    var width = $('.wheelwidth:checked').map(function() {
        return $(this).val();
    }).get();


    if (width != '') {
        updateParamsToUrl('width', width);
    } else {
        removeParamsFromUrl('width');
    }
});

// brand based filters for wheels
$('.brand').on('click', function() {
    // var brand = $(this).val();   

    var brand = $('.brand:checked').map(function() {
        return $(this).val();
    }).get();

    if (brand != '') {
        updateParamsToUrl('brand', brand);
    } else {
        removeParamsFromUrl('brand');
    }

});

// Finish based filters for wheels
$('.finish').on('click', function() {

    var finish = $('.finish:checked').map(function() {
        return $(this).val();
    }).get();


    if (finish != '') {
        updateParamsToUrl('finish', finish);
    } else {
        removeParamsFromUrl('finish');
    }
});

// change the cars by selected color
$('.car_color').on('click', function() {
    var vif = $(this).attr('data-vif');
    var code = $(this).attr('data-code');
    $('.color-selected').removeClass('color-selected');
    $(this).addClass('color-selected');
    $('.car_color[data-code=' + code + ']').addClass('color-selected');
    $.ajax({
        method: "GET",
        url: '/selectCarByColor',
        data: {
            vif: vif,
            code: code
        }
    }).done(function(data) {
        if (data.data != null) {
            $('.car_image_' + vif).attr('src', data.data.image);
        }
    }).fail(function(msg) {
        alert("fails");
    });
});

// Global Search by wheels name in 
$('.header-search-btn').on('click', function() {
    var search = $('#header-search-input').val();
    if (search != '') {
        updateParamsToUrl('search', search);
    } else {
        removeParamsFromUrl('search');
    }
});



// Common  Function to change the params values in the current url
function updateParamsToUrl(paramKey, paramValue) {

    paramValue = window.btoa(JSON.stringify(paramValue));

    var nextUrl = window.location.origin + window.location.pathname;

    var params = getUrlVars(); //Get all the query params as an ARRAY

    var size = Object.keys(params).length;
    var i = 0;
    if (size == 0) {
        window.location.href = window.location.href + "?" + paramKey + "=" + paramValue;
    } else {

        nextUrl += '?'; // ? for started to attach the query string to url

        params[paramKey] = paramValue;

        // This is for search,selection by any one of ways => BRAND or SEARCH Keyword
        if (paramKey == 'search' && params['brand'] != undefined) {
            params['brand'] = '';
        }
        if (paramKey == 'brand' && params['search'] != undefined) {
            params['search'] = '';
        }

        if (paramKey == 'brand') {
            params['width'] = '';
            params['diameter'] = '';
        }

        // Attach the query params to the nextURL 
        $.each(params, function(key, value) {
            if (value != '') {
                if (i == size) {
                    nextUrl += key + '=' + value;
                } else {
                    nextUrl += key + '=' + value + '&';
                }
            }

            i++;
        });


        window.location.href = nextUrl;
    }
}


// Common  Function to change the params values in the current url
function removeParamsFromUrl(paramKey) {


    var nextUrl = window.location.origin + window.location.pathname;

    var params = getUrlVars(); //Get all the query params as an ARRAY
    params[paramKey] = '';
    var size = Object.keys(params).length;
    var i = 0;
    if (size == 0) {
        window.location.href = window.location.origin + window.location.pathname;
    } else {
        nextUrl += '?'; // ? for started to attach the query string to url

        // This is for search,selection by any one of ways => BRAND or SEARCH Keyword
        if (paramKey == 'search' && params['brand'] != undefined) {
            params['brand'] = '';
        }
        if (paramKey == 'brand' && params['search'] != undefined) {
            params['search'] = '';
        }

        // Attach the query params to the nextURL 
        $.each(params, function(key, value) {
            if (value != '') {
                if (i == size) {
                    nextUrl += key + '=' + value;
                } else {
                    nextUrl += key + '=' + value + '&';
                }
            }

            i++;
        });

        window.location.href = nextUrl;
    }
}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        vars[key] = value;
    });
    return vars;
}


// Wheel Diameter Zoom In and Zoom Out  

var diameterStepCount=0;
var diameterStepLimit=8;
var currentKey=0;

$('.diameter-up').click(function() {
    var key = $(this).attr('data-id');
    if(key != currentKey){
        diameterStepCount=0;
        diameterStepLimit=8;
        currentKey=key;
    }
    if(diameterStepCount < diameterStepLimit){
            var front = document.getElementById("image-diameter-front-" + key); 
            var frontWidth = front.clientWidth; 
            front.style.width = (frontWidth + 20) + "px"; 

            frontTop = parseInt($(front).css("top"), 10);
            frontLeft = parseInt($(front).css("left"), 10);
            frontTop = frontTop -10;
            frontLeft = frontLeft -10;
            $(front).css({top: frontTop, left: frontLeft});

            var back = document.getElementById("image-diameter-back-" + key); 
            var backWidth = back.clientWidth; 
            back.style.width = (backWidth + 20) + "px";

            backTop = parseInt($(back).css("top"), 10);
            backLeft = parseInt($(back).css("left"), 10);
            backTop = backTop -10;
            backLeft = backLeft -10;
            $(back).css({top: backTop, left: backLeft});

        diameterStepCount = diameterStepCount + 1;
    }
    // console.log(diameterStepCount,front.clientWidth);

});
$('.diameter-down').click(function() {
    var key = $(this).attr('data-id');
    if(key != currentKey){
        diameterStepCount=0;
        diameterStepLimit=8;
        currentKey=key;
    }
    if(diameterStepCount > 0){

            var front = document.getElementById("image-diameter-front-" + key); 
            var frontWidth = front.clientWidth; 
            front.style.width = (frontWidth - 20) + "px"; 


            frontTop = parseInt($(front).css("top"), 10);
            frontLeft = parseInt($(front).css("left"), 10);
            frontTop = frontTop +10;
            frontLeft = frontLeft +10;
            $(front).css({top: frontTop, left: frontLeft});

            var back = document.getElementById("image-diameter-back-" + key); 
            var currWidth = back.clientWidth; 
            back.style.width = (currWidth - 20) + "px";


            backTop = parseInt($(back).css("top"), 10);
            backLeft = parseInt($(back).css("left"), 10);
            backTop = backTop +10;
            backLeft = backLeft +10;
            $(back).css({top: backTop, left: backLeft});

            diameterStepCount = diameterStepCount - 1;
    }
    // console.log(diameterStepCount,front.clientWidth);
});



if ($(".chosen-select").length > 0) {
 $(".chosen-select").chosen({
    no_results_text: "Not Found!!"
  }) 
};

$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));
  }
});
 function getCartCount(){
        $.ajax({url: "/getCartCount",data:{}, success: function(result){
            if(result){
                $("#cart-total").text(result);
            }else{
                $("#cart-total").text(0);
            }
            // $(".se-pre-con").hide(); 
        }});
 }
        
$(function(){ 
  $(".wheelImage").popImg(); 
   getCartCount();
  
})



 // Read More Script Start
if($('.read_more_text').length > 0 ){

    function moreLess(initiallyVisibleCharacters) {
        var paragraph = $(".read_more_text")
        paragraph.each(function() {
            var visibleCharacters = $(this).data('length')? $(this).data('length'):initiallyVisibleCharacters;
            // console.log(visibleCharacters);
        
            var text = $(this).text();
            var wholeText = text.slice(0, visibleCharacters) + "<span class='ellipsis'>... </span><a href='#' class='more'>Read More</a>" + "<span style='display:none'>" + text.slice(visibleCharacters, text.length) + "<a href='#' class='less'> Read Less</a></span>"

            if (text.length < visibleCharacters) {
                return
            } else {
                $(this).html(wholeText)
            }
        });
        $(".more").click(function(e) {
            e.preventDefault();
            $(this).hide().prev().hide();
            $(this).next().show();
        });
        $(".less").click(function(e) {
            e.preventDefault();
            $(this).parent().hide().prev().show().prev().show();
        });
    };

    moreLess(100);

}

 // Read More Script Ends




