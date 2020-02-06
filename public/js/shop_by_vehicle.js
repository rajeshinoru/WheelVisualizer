
// Year based filters for Makes 
$(document).on('change', '.NavYear,.NavMake,.NavModel', function() {
    var changeBy = $(this).attr('name');

    var make = $('.NavMake').val();
    var year = $('.NavYear').val();
    var model = $('.NavModel').val();
    var submodel = $('.NavSubmodel').val();
    NavFilters(year, make, model,submodel, changeBy);
});

$(document).ready(function() {
    var make = $('.NavMake').val();
    var year = $('.NavYear').val();
    var model = $('.NavModel').val();
    var submodel = $('.NavSubmodel').val();
    NavFilters(year, make, model,submodel);
});

function NavFilters(year = '', make = '', model = '',submodel = '', changeBy = '') {
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

        $('.NavSubmodel').empty().append('<option value="">Select Trim</option>');

        if (changeBy == '' || changeBy == 'year' || changeBy == 'make') {
            $('.NavModel').empty().append('<option value="">Select Model</option>');
        }
        if (changeBy == '' || changeBy == 'make') {
            $('.NavYear').empty().append('<option value="">Select Year</option>');
        }

        if (changeBy == '') {
            data.data['year'].map(function(value, key) {
                isSelected = (value.year == year) ? 'selected' : '';
                $('.NavYear').append('<option value="' + value.year + '" ' + isSelected + '>' + value.year + '</option>');
            });
            data.data['model'].map(function(value, key) {
                isSelected = (value.model == model) ? 'selected' : '';
                $('.NavModel').append('<option value="' + value.model + '" ' + isSelected + '>' + value.model + '</option>');
            });
            data.data['submodel'].map(function(value, key) {
                isSelected = (value.submodel == submodel) ? 'selected' : '';
                $('.NavSubmodel').append('<option value="' + value.submodel + '"' + isSelected + '>' + value.submodel  + '</option>');
            });
        } else {
            data.data.map(function(value, key) {
                if (changeBy == 'make') {
                    $('.NavYear').append('<option value="' + value.year + '">' + value.year + '</option>');
                }
                if (changeBy == 'year') {
                    $('.NavModel').append('<option value="' + value.model + '">' + value.model + '</option>');
                }
                if (changeBy == 'model') {
                    $('.NavSubmodel').append('<option value="' + value.submodel + '">' + value.submodel + '</option>');
                }
            });
        }

        if(make != null && changeBy !=''){

            $('.NavMake').append('<option value="' + make + '" selected>' + make + '</option>');
            // $('.NavMake').trigger("chosen:updated");
        }

        // $('.NavYear').trigger("chosen:updated");
        // $('.NavModel').trigger("chosen:updated");
        // $('.DriveBody').trigger("chosen:updated");
        if (changeBy == 'make') {
            $('.NavYear').focus();
            $('.NavYear').childrens('option').show();
        }
        if (changeBy == 'year') {
            $('.NavModel').focus();
            $('.NavModel').childrens('option').show();
        }
        if (changeBy == 'model') {
            $('.NavSubmodel').focus();
            $('.NavSubmodel').childrens('option').show();
        }
    }).fail(function(msg) {
        alert("fails");
    });
}

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
