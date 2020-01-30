
// Year based filters for Makes 
$(document).on('change', '.Year,.Make,.Model', function() {
    var changeBy = $(this).attr('name');

    var make = $('.Make').val();
    var year = $('.Year').val();
    var model = $('.Model').val();
    var driverbody = $('.DriveBody').val(); 

    $('.NavMake').val(make);
    $('.NavYear').val(year);
    $('.NavModel').val(model);
    $('.NavDriveBody').val(driverbody); 

    filters(year, make, model, driverbody, changeBy);
});
$(document).on('change', '.NavMake,.NavYear,.NavModel', function() {
    var changeBy = $(this).attr('name');

    var make = $('.NavMake').val();
    var year = $('.NavYear').val();
    var model = $('.NavModel').val();
    var driverbody = $('.NavDriveBody').val(); 


    $('.Make').val(make);
    $('.Year').val(year);
    $('.Model').val(model);
    $('.DriveBody').val(driverbody); 

    filters(year, make, model, driverbody, changeBy);
});

$(document).ready(function() {
    var make = $('.Make').val();
    var year = $('.Year').val();
    var model = $('.Model').val();
    var driverbody = $('.DriveBody').val();
    filters(year, make, model, driverbody);
});

function filters(year = '', make = '', model = '', driverbody = '', changeBy = '') {
    console.log('CHANGEBY',changeBy);
    $.ajax({
        method: "GET",
        url: '/vehicledetails',
        data: {
            year: year,
            make: make,
            model: model,
            changeBy: changeBy
        }
    }).done(function(data) {

        $('.DriveBody,.NavDriveBody').empty().append('<option disabled selected>Select Drive/Body</option>');

        if (changeBy == '' || changeBy == 'year' || changeBy == 'make') {
            $('.Model,.NavModel').empty().append('<option disabled selected>Select Model</option>');
        }
        if (changeBy == '' || changeBy == 'make') {
            $('.Year,.NavYear').empty().append('<option disabled selected>Select Year</option>');
        }

        if (changeBy == '') {
            data.data['year'].map(function(value, key) {
                isSelected = (value.yr == year) ? 'selected' : '';
                $('.Year,.NavYear').append('<option value="' + value.yr + '" ' + isSelected + '>' + value.yr + '</option>');
            });
            data.data['model'].map(function(value, key) {
                isSelected = (value.model == model) ? 'selected' : '';
                $('.Model,.NavModel').append('<option value="' + value.model + '" ' + isSelected + '>' + value.model + '</option>');
            });
            data.data['driverbody'].map(function(value, key) {
                isSelected = (value.vif == driverbody) ? 'selected' : '';
                $('.DriveBody,.NavDriveBody').append('<option value="' + value.vif + '"' + isSelected + '>' + value.whls + ' ' + value.drs + ' ' + value.body + '</option>');
            });
        } else {
            data.data.map(function(value, key) {
                if (changeBy == 'make') {
                    $('.Year,.NavYear').append('<option value="' + value.yr + '">' + value.yr + '</option>');
                }
                if (changeBy == 'year') {
                    $('.Model,.NavModel').append('<option value="' + value.model + '">' + value.model + '</option>');
                }
                if (changeBy == 'model') {
                    $('.DriveBody,.NavDriveBody').append('<option value="' + value.vif + '">' + value.whls + ' ' + value.drs + ' ' + value.body + '</option>');
                }
            });
        }

        if(make != null && changeBy !=''){

            $('.Make,.NavMake').append('<option value="' + make + '" selected>' + make + '</option>');
            $('.Make,.NavMake').trigger("chosen:updated");
        }
        $('.Year,.NavYear').trigger("chosen:updated");
        $('.Model,.NavModel').trigger("chosen:updated");
        $('.DriveBody,.NavDriveBody').trigger("chosen:updated");
    }).fail(function(msg) {
        alert("fails");
    });
}

//  Driver / Body change your car 
$('.DriveBody').on('change', function() {
    var car_id = $(this).val();
    if (car_id != '') {
        updateParamsToUrl('car_id', car_id);
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