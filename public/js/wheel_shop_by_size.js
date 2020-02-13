
// Year based filters for Makes 
$(document).on('change', '.WheelDiameter,.WheelWidth,.BoltPattern,.MinOffset', function() {
    var changeBy = $(this).attr('name');
    var wheeldiameter = $('.WheelDiameter').val();
    var wheelwidth = $('.WheelWidth').val();
    var boltpattern = $('.BoltPattern').val();
    var minoffset = $('.MinOffset').val(); 
    WheelSizeFilters(wheeldiameter, wheelwidth,boltpattern, minoffset,changeBy);
});

$(document).ready(function() {
    var wheeldiameter = $('.WheelDiameter').val();
    var wheelwidth = $('.WheelWidth').val();
    var boltpattern = $('.BoltPattern').val();
    var minoffset = $('.MinOffset').val();
    WheelSizeFilters(wheeldiameter, wheelwidth,boltpattern,minoffset);
});

function WheelSizeFilters(wheeldiameter = '',wheelwidth = '',boltpattern = '',minoffset = '', changeBy = '') { 
    $.ajax({
        method: "GET",
    url: '/getFiltersByWheelSize',
        data: {
            wheeldiameter: wheeldiameter,
            wheelwidth: wheelwidth,
            boltpattern: boltpattern,
            minoffset: minoffset,   
            changeBy: changeBy
        }
    }).done(function(data) {


        if (changeBy == '' || changeBy == 'wheeldiameter') {
            $('.WheelWidth').empty().append('<option value="">Select Width</option>');
        }
        if (changeBy == '' || changeBy == 'wheelwidth' || changeBy == 'wheeldiameter') {
            $('.BoltPattern').empty().append('<option value="">Select BoltPattern</option>');
        }
        if (changeBy == '' || changeBy == 'wheeldiameter'|| changeBy == 'wheelwidth'|| changeBy == 'boldpattern') {
            $('.MinOffset').empty().append('<option value="">Selct MinOffset</option>');
        }
        if (changeBy == '' || changeBy == 'wheeldiameter'|| changeBy == 'wheelwidth'|| changeBy == 'boldpattern'|| changeBy == 'minoffset') {
            $('.MaxOffset').empty().append('<option value="">Selct MaxOffset</option>');
        }
        if (changeBy == '') {
            data.data['wheelwidth'].map(function(value, key) {
                isSelected = (value.wheelwidth == wheelwidth) ? 'selected' : '';
                $('.WheelWidth').append('<option value="' + value.wheelwidth + '" ' + isSelected + '>' + value.wheelwidth + '</option>');
            });
            data.data['wheeldiameter'].map(function(value, key) {
                isSelected = (value.wheeldiameter == wheeldiameter) ? 'selected' : '';
                $('.WheelDiameter').append('<option value="' + value.wheeldiameter + '" ' + isSelected + '>' + value.wheeldiameter + '</option>');
            });
            data.data['boltpattern'].map(function(value, key) {
                isSelected = (value.boltpattern1 == boltpattern) ? 'selected' : '';
                $('.BoltPattern').append('<option value="' + value.boltpattern1 + '" ' + isSelected + '>' + value.boltpattern1 + '</option>');
            });
            data.data['minoffset'].map(function(value, key) {
                isSelected = (value.minoffset == minoffset) ? 'selected' : '';
                $('.MinOffset').append('<option value="' + value.offset1 + '" ' + isSelected + '>' + value.offset1 + '</option>');
            });
            data.data['maxoffset'].map(function(value, key) {
                isSelected = (value.maxoffset == maxoffset) ? 'selected' : '';
                $('.MaxOffset').append('<option value="' + value.offset2 + '" ' + isSelected + '>' + value.offset2 + '</option>');
            });
        } else {
            data.data.map(function(value, key) {
                if (changeBy == 'wheeldiameter') {
                    $('.WheelWidth').append('<option value="' + value.wheelwidth + '">' + value.wheelwidth + '</option>');
                }
                if (changeBy == 'wheelwidth') {
                    // alert(value.boltpattern1)
                    $('.BoltPattern').append('<option value="' + value.boltpattern1 + '">' + value.boltpattern1 + '</option>');
                }
                if (changeBy == 'boltpattern') {
                    // alert(value.boltpattern1)
                    $('.MinOffset').append('<option value="' + value.offset1 + '">' + value.offset1 + '</option>');
                }
                if (changeBy == 'minoffset') {
                    // alert(value.boltpattern1)
                    $('.MaxOffset').append('<option value="' + value.offset2 + '">' + value.offset2 + '</option>');
                }

            });
        }

        if(wheeldiameter != null && changeBy !=''){

            $('.WheelDiameter').append('<option value="' + wheeldiameter + '" selected>' + wheeldiameter + '</option>');
            // $('.WheelDiameter').trigger("chosen:updated");
        }

        // $('.WheelWidth').trigger("chosen:updated");
        // $('.WheelDiameter').trigger("chosen:updated");

    }).fail(function(msg) {
        alert("fails");
    });
}