
// Year based filters for Makes 
$(document).on('change', '.Year,.Make,.Model', function() {
    var changeBy = $(this).attr('name');

    var make = $('.Make').val();
    var year = $('.Year').val();
    var model = $('.Model').val();
    var driverbody = $('.DriveBody').val(); 
    filters(year, make, model, driverbody, changeBy);
});


function filters(year = '', make = '', model = '', driverbody = '', changeBy = '') {
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

        $('.DriveBody').empty().append('<option disabled selected>Select Drive/Body</option>');

        if (changeBy == '' || changeBy == 'year' || changeBy == 'make') {
            $('.Model').empty().append('<option disabled selected>Select Model</option>');
        }
        if (changeBy == '' || changeBy == 'make') {
            $('.Year').empty().append('<option disabled selected>Select Year</option>');
        }

        if (changeBy == '') {
            data.data['year'].map(function(value, key) {
                isSelected = (value.yr == year) ? 'selected' : '';
                $('.Year').append('<option value="' + value.yr + '" ' + isSelected + '>' + value.yr + '</option>');
            });
            data.data['model'].map(function(value, key) {
                isSelected = (value.model == model) ? 'selected' : '';
                $('.Model').append('<option value="' + value.model + '" ' + isSelected + '>' + value.model + '</option>');
            });
            data.data['driverbody'].map(function(value, key) {
                isSelected = (value.vif == driverbody) ? 'selected' : '';
                $('.DriveBody').append('<option value="' + value.vif + '"' + isSelected + '>' + value.whls + ' ' + value.drs + ' ' + value.body + '</option>');
            });
        } else {
            data.data.map(function(value, key) {
                if (changeBy == 'make') {
                    $('.Year').append('<option value="' + value.yr + '">' + value.yr + '</option>');
                }
                if (changeBy == 'year') {
                    $('.Model').append('<option value="' + value.model + '">' + value.model + '</option>');
                }
                if (changeBy == 'model') {
                    $('.DriveBody').append('<option value="' + value.vif + '">' + value.whls + ' ' + value.drs + ' ' + value.body + '</option>');
                }
            });
        }

        if(make != null && changeBy !=''){

            $('.Make').append('<option value="' + make + '" selected>' + make + '</option>');
            $('.Make').trigger("chosen:updated");
        }
        $('.Year').trigger("chosen:updated");
        $('.Model').trigger("chosen:updated");
        $('.DriveBody').trigger("chosen:updated");
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
