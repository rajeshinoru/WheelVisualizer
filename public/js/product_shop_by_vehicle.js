
// Year based filters for Makes 
$(document).on('change', '.WheelNavYear,.WheelNavMake,.WheelNavModel', function() {
    var changeBy = $(this).attr('name');

    var make = $('.WheelNavMake').val();
    var year = $('.WheelNavYear').val();
    var model = $('.WheelNavModel').val();
    var submodel = $('.WheelNavSubmodel').val();
    WheelNavFilters(year, make, model,submodel, changeBy);
});

$(document).ready(function() {
    var make = $('.WheelNavMake').val();
    var year = $('.WheelNavYear').val();
    var model = $('.WheelNavModel').val();
    var submodel = $('.WheelNavSubmodel').val();
    WheelNavFilters(year, make, model,submodel);
});

function WheelNavFilters(year = '', make = '', model = '',submodel = '', changeBy = '') {
    $.ajax({
        method: "GET",
        url: '/getFiltersByVehicle',
        data: {
            year: year,
            make: make,
            model: model,
            changeBy: changeBy
        }
    }).done(function(data) {

        $('.WheelNavSubmodel').empty().append('<option value="">Select Trim</option>');

        if (changeBy == '' || changeBy == 'year' || changeBy == 'make') {
            $('.WheelNavModel').empty().append('<option value="">Select Model</option>');
        }
        if (changeBy == '' || changeBy == 'make') {
            $('.WheelNavYear').empty().append('<option value="">Select Year</option>');
        }

        if (changeBy == '') {
            data.data['year'].map(function(value, key) {
                isSelected = (value.year == year) ? 'selected' : '';
                $('.WheelNavYear').append('<option value="' + value.year + '" ' + isSelected + '>' + value.year + '</option>');
            });
            data.data['model'].map(function(value, key) {
                isSelected = (value.model == model) ? 'selected' : '';
                $('.WheelNavModel').append('<option value="' + value.model + '" ' + isSelected + '>' + value.model + '</option>');
            });
            data.data['submodel'].map(function(value, key) {
                isSelected = (value.submodel == submodel) ? 'selected' : '';
                $('.WheelNavSubmodel').append('<option value="' + value.submodel + '"' + isSelected + '>' + value.submodel  + '</option>');
            });
        } else {
            data.data.map(function(value, key) {
                if (changeBy == 'make') {
                    $('.WheelNavYear').append('<option value="' + value.year + '">' + value.year + '</option>');
                }
                if (changeBy == 'year') {
                    $('.WheelNavModel').append('<option value="' + value.model + '">' + value.model + '</option>');
                }
                if (changeBy == 'model') {
                    $('.WheelNavSubmodel').append('<option value="' + value.submodel + '">' + value.submodel + '</option>');
                }
            });
        }

        if(make != null && changeBy !=''){

            $('.WheelNavMake').append('<option value="' + make + '" selected>' + make + '</option>');
            // $('.WheelNavMake').trigger("chosen:updated");
        }

        // $('.WheelNavYear').trigger("chosen:updated");
        // $('.WheelNavModel').trigger("chosen:updated");
        // $('.DriveBody').trigger("chosen:updated");
        // if (changeBy == 'make') {
        //     $('.WheelNavYear').focus();
        //     $('.WheelNavYear').childrens('option').show();
        // }
        // if (changeBy == 'year') {
        //     $('.WheelNavModel').focus();
        //     $('.WheelNavModel').childrens('option').show();
        // }
        // if (changeBy == 'model') {
        //     $('.WheelNavSubmodel').focus();
        //     $('.WheelNavSubmodel').childrens('option').show();
        // }
    }).fail(function(msg) {
        alert("fails");
    });
}

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
        // if (paramKey == 'search' && params['brand'] != undefined) {
        //     params['brand'] = '';
        // }
        // if (paramKey == 'brand' && params['search'] != undefined) {
        //     params['search'] = '';
        // }

        // if (paramKey == 'brand') {
        //     params['width'] = '';
        //     params['diameter'] = '';
        // }

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
