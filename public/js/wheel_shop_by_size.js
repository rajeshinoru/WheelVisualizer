
// Year based filters for Makes 
$(document).on('change', '.WheelDiameter,.WheelWidth', function() {
    var changeBy = $(this).attr('name');
    var width = $('.WheelDiameter').val();
    var profile = $('.WheelWidth').val();
    NavTireFilters(width, profile, changeBy);
});

$(document).ready(function() {
    var width = $('.WheelDiameter').val();
    var profile = $('.WheelWidth').val();
    NavTireFilters(width, profile);
});

function NavTireFilters(width = '',profile = '', changeBy = '') {
    $.ajax({
        method: "GET",
        url: '/getFiltersByWheelSize',
        data: {
            width: width,
            profile: profile,
            changeBy: changeBy
        }
    }).done(function(data) {

        $('.NavDiameter').empty().append('<option value="">Select Diameter</option>');

        if (changeBy == '' || changeBy == 'profile' ) {
            $('.NavDiameter').empty().append('<option value="">Select Diameter</option>');
        }
        if (changeBy == '' || changeBy == 'width') {
            $('.WheelWidth').empty().append('<option value="">Select Profile</option>');
        }

        if (changeBy == '') {
            data.data['profile'].map(function(value, key) {
                isSelected = (value.tireprofile == profile) ? 'selected' : '';
                $('.WheelWidth').append('<option value="' + value.tireprofile + '" ' + isSelected + '>' + value.tireprofile + '</option>');
            });
            data.data['diameter'].map(function(value, key) {
                isSelected = (value.tirediameter == diameter) ? 'selected' : '';
                $('.NavDiameter').append('<option value="' + value.tirediameter + '" ' + isSelected + '>' + value.tirediameter + '</option>');
            });
        } else {
            data.data.map(function(value, key) {
                if (changeBy == 'width') {
                    $('.WheelWidth').append('<option value="' + value.tireprofile + '">' + value.tireprofile + '</option>');
                }
                if (changeBy == 'profile') {
                    $('.NavDiameter').append('<option value="' + value.tirediameter + '">' + value.tirediameter + '</option>');
                }
            });
        }

        if(width != null && changeBy !=''){

            $('.WheelDiameter').append('<option value="' + width + '" selected>' + width + '</option>');
            // $('.WheelDiameter').trigger("chosen:updated");
        }

        // $('.WheelWidth').trigger("chosen:updated");
        // $('.NavDiameter').trigger("chosen:updated");

    }).fail(function(msg) {
        alert("fails");
    });
}
