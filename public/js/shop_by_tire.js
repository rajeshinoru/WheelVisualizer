
// Year based filters for Makes 
$(document).on('change', '.NavWidth,.NavProfile', function() {
    var changeBy = $(this).attr('name');
    var width = $('.NavWidth').val();
    var profile = $('.NavProfile').val();
    NavTireFilters(width, profile, changeBy);
});

$(document).ready(function() {
    var width = $('.NavWidth').val();
    var profile = $('.NavProfile').val();
    NavTireFilters(width, profile);
});

function NavTireFilters(width = '',profile = '', changeBy = '') {
    $.ajax({
        method: "GET",
        url: '/getFiltersByTire',
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
            $('.NavProfile').empty().append('<option value="">Select Profile</option>');
        }

        if (changeBy == '') {
            data.data['profile'].map(function(value, key) {
                isSelected = (value.tireprofile == profile) ? 'selected' : '';
                $('.NavProfile').append('<option value="' + value.tireprofile + '" ' + isSelected + '>' + value.tireprofile + '</option>');
            });
            data.data['diameter'].map(function(value, key) {
                isSelected = (value.tirediameter == diameter) ? 'selected' : '';
                $('.NavDiameter').append('<option value="' + value.tirediameter + '" ' + isSelected + '>' + value.tirediameter + '</option>');
            });
        } else {
            data.data.map(function(value, key) {
                if (changeBy == 'width') {
                    $('.NavProfile').append('<option value="' + value.tireprofile + '">' + value.tireprofile + '</option>');
                }
                if (changeBy == 'profile') {
                    $('.NavDiameter').append('<option value="' + value.tirediameter + '">' + value.tirediameter + '</option>');
                }
            });
        }

        if(width != null && changeBy !=''){

            $('.NavWidth').append('<option value="' + width + '" selected>' + width + '</option>');
            // $('.NavWidth').trigger("chosen:updated");
        }

        // $('.NavProfile').trigger("chosen:updated");
        // $('.NavDiameter').trigger("chosen:updated");

    }).fail(function(msg) {
        alert("fails");
    });
}
