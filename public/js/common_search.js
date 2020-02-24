
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

    var speedrating = $(this).val();
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

$('.diameter-up').click(function() {
    var key = $(this).attr('data-id');
    var $front = $("#image-diameter-front-" + key);
    var $back = $("#image-diameter-back-" + key);

    var frontWidth = parseInt($front.width());
    var frontHeight = parseInt($front.height());

    if (frontHeight >= 80 && frontHeight <= 500) {

        var backWidth = frontHeight * (3 / 4); //parseInt($back.width());
        var backHeight = frontHeight * (3 / 4); //parseInt($back.height());

        var frontMarginTop = parseInt($front.css('margin').replace('px', ''));
        frontMarginTop = parseInt(frontMarginTop - 10) + 'px';

        var backMarginTop = parseInt($back.css('margin').replace('px', ''));
        backMarginTop = parseInt(backMarginTop - 7) + 'px';

        $front.width(parseInt(frontHeight + 20) + 'px');
        $front.height(parseInt(frontHeight + 20) + 'px');
        $front.css('margin', frontMarginTop);
        $back.width(parseInt(backWidth + 15) + 'px');
        $back.height(parseInt(backHeight + 15) + 'px');
        $back.css('margin', backMarginTop);

    }
});
$('.diameter-down').click(function() {

    var key = $(this).attr('data-id');
    var $front = $("#image-diameter-front-" + key);
    var $back = $("#image-diameter-back-" + key);

    var frontWidth = parseInt($front.width());
    var frontHeight = parseInt($front.height());

    var backWidth = frontHeight * (3 / 4); //parseInt($back.width());
    var backHeight = frontHeight * (3 / 4); //parseInt($back.height());


    var frontMarginTop = parseInt($front.css('margin').replace('px', ''));

    if (frontMarginTop == -10) {
        frontWidth -= 16;
        frontHeight -= 16;
    }


    if (frontMarginTop == -10) {
        frontMarginTop = parseInt(frontMarginTop + 10) + 'px';
        $front.css('margin', frontMarginTop);
        $front.css('width', '80px');
        $front.css('height', '');
    } else {
        if (parseInt(frontHeight - 20) > 80) {
            $front.width(parseInt(frontHeight - 20) + 'px');
            $front.height(parseInt(frontHeight - 20) + 'px');
            frontMarginTop = parseInt(frontMarginTop + 10) + 'px';
            $front.css('margin', frontMarginTop);
        }
    }

    var backMarginTop = parseInt($back.css('margin').replace('px', ''));

    if (backMarginTop == -7) {
        backWidth -= 4;
        backHeight -= 4;
    }

    if (backMarginTop == -7) {
        backMarginTop = parseInt(backMarginTop + 7) + 'px';
        $back.css('margin', backMarginTop);
        $back.css('width', '65px');
        $back.css('height', '');

    } else {
        if (parseInt(backHeight - 15) > 65) {
            $back.width(parseInt(backHeight - 15) + 'px');
            $back.height(parseInt(backHeight - 15) + 'px');
            backMarginTop = parseInt(backMarginTop + 7) + 'px';
            $back.css('margin', backMarginTop);
        }
    }

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

        
$(function(){ 
  $(".wheelImage").popImg(); 
})



 // Read More Script Start
if($('.read_more_text').length > 0 ){

    function moreLess(initiallyVisibleCharacters) {
        var visibleCharacters = initiallyVisibleCharacters;
        var paragraph = $(".read_more_text")
        paragraph.each(function() {
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