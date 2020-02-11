
// Year based filters for Makes 
$(document).on('change', '.WheelNavYear,.WheelNavMake,.WheelNavModel', function() {
    var changeBy = $(this).attr('name');

    var make = $('.WheelNavMake').val();
    var year = $('.WheelNavYear').val();
    var model = $('.WheelNavModel').val();
    var driverbody = $('.WheelNavDriveBody').val(); 
    WheelNavFilters(year, make, model, driverbody, changeBy);
});
// $(document).on('change', '.WheelMake', function() {
//     var changeBy = $(this).attr('name');

//     $('.WheelNavMake').val(make);
//     $('.WheelNavYear').val(year);
//     $('.WheelNavModel').val(model);
//     $('.WheelNavDriveBody').val(driverbody); 

//     filters(year, make, model, driverbody, changeBy);
// });

$(document).ready(function() {
    var make = $('.WheelNavMake').val();
    var year = $('.WheelNavYear').val();
    var model = $('.WheelNavModel').val();
    var driverbody = $('.WheelNavDriveBody').val();
    WheelNavFilters(year, make, model, driverbody);
});

function WheelNavFilters(year = '', make = '', model = '', driverbody = '', changeBy = '') {
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

        $('.WheelNavDriveBody').empty().append('<option disabled selected>Select Drive/Body</option>');

        if (changeBy == '' || changeBy == 'year' || changeBy == 'make') {
            $('.WheelNavModel').empty().append('<option disabled selected>Select Model</option>');
        }
        if (changeBy == '' || changeBy == 'make') {
            $('.WheelNavYear').empty().append('<option disabled selected>Select Year</option>');
        }

        if (changeBy == '') {
            data.data['year'].map(function(value, key) {
                isSelected = (value.yr == year) ? 'selected' : '';
                $('.WheelNavYear').append('<option value="' + value.yr + '" ' + isSelected + '>' + value.yr + '</option>');
            });
            data.data['model'].map(function(value, key) {
                isSelected = (value.model == model) ? 'selected' : '';
                $('.WheelNavModel').append('<option value="' + value.model + '" ' + isSelected + '>' + value.model + '</option>');
            });
            data.data['driverbody'].map(function(value, key) {
                isSelected = (value.vif == driverbody) ? 'selected' : '';
                $('.WheelNavDriveBody').append('<option value="' + value.vif + '"' + isSelected + '>' + value.whls + ' ' + value.drs + ' ' + value.body + '</option>');
            });
        } else {
            data.data.map(function(value, key) {
                if (changeBy == 'make') {
                    $('.WheelNavYear').append('<option value="' + value.yr + '">' + value.yr + '</option>');
                }
                if (changeBy == 'year') {
                    $('.WheelNavModel').append('<option value="' + value.model + '">' + value.model + '</option>');
                }
                if (changeBy == 'model') {
                    $('.WheelNavDriveBody').append('<option value="' + value.vif + '">' + value.whls + ' ' + value.drs + ' ' + value.body + '</option>');
                }
            });
        }

        if(make != null && changeBy !=''){

            $('.WheelNavMake').append('<option value="' + make + '" selected>' + make + '</option>');
            $('.WheelNavMake').trigger("chosen:updated");
        }
        $('.WheelNavYear').trigger("chosen:updated");
        $('.WheelNavModel').trigger("chosen:updated");
        $('.WheelNavDriveBody').trigger("chosen:updated");
    }).fail(function(msg) {
        alert("fails");
    });
}

//  Driver / Body change your car 
$('.WheelNavDriveBody').on('change', function() {
    var car_id = $(this).val();
    if (car_id != '') {
        updateParamsToUrl('car_id', car_id);
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

