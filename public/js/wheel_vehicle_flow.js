$(document).ready(function() {
    var pathstring='';
    $('.WheelVehicleSubmit').click(function(){
        // console.log($('#WheelVehicleSearch').serialize())
        pathstring = $('#WheelVehicleSearch').serialize();
         $.ajax({
            url: "/setWheelVehicleFlow",
            method: 'GET',
            data: pathstring,
            success: function(result) {
                console.log(result);

                if (result['status'] == true) {

                    if(result['offroadtype']==null){

                        $("#offroadTypeModal").modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    }
                    // window.location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {


            }
        });
    });
 
    $('.offroad-select').click(function() {
        $("#offroadTypeModal").modal('hide');
        var offroad = $(this).data('offroad');
        $.ajax({
            url: "/setWheelVehicleFlow",
            method: 'GET',
            data:{offroad:offroad} ,
            success: function(result) { 
                console.log(result)
                if (result['status'] == true) {
                   
                    if (offroad == 'lift') {
                        getLiftSizes(offroad);
                    }else{ 
                        getZipcode(result);
                    }  
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {


            }
        });
    });

    $("#zipcodeSubmit").click(function() {
        $.ajax({
            url: "/zipcodeUpdate",
            method: 'POST',
            data: $('#zipcodeForm').serialize(),
            success: function(result) {
                console.log(result);
                if (result == 'success') {
                    $("#zipcodeModal").modal('hide');
                    window.location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {


            }
        });
    }); 

});

function setLiftSizes(liftsize) {
  
        console.log(liftsize)
        $("#liftsizeModal").modal('hide');
        $.ajax({
            url: "/setWheelVehicleFlow",
            method: 'GET',
            data:{liftsize:liftsize},
            success: function(result) { 

                    console.log(result);

                    if(result['status'] == true){
                        getZipcode(result);
                    }
            },
            error: function(jqXHR, textStatus, errorThrown) {


            }
        });

}

function getLiftSizes(offroad) {

  
        $.ajax({
            url: "/getLiftSizes",
            data: {},
            success: function(result) { 
                var str = '';
                if (result != null) {

                    for (var i = result.length - 1; i >= 0; i--) {

                        sizename = result[i].replace("lift", '" Lift');

                        str += ` 

                                    <br>
                                    <div style="text-align: center;"> 
                                        <button class="btn btn-info liftsize-select" onclick="setLiftSizes('` + result[i] + `')">

                                            <img src="/image/lifttype.jpg" >
                                            <br>
                                            <h3 style="color: white !important">` + sizename + `</h3>
                                        </button>
                                    </div> 


                                `;
                    }
                    $('#liftsizeModal').find('.modal-body').html(str);
                    $("#liftsizeModal").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    // $loading.fadeOut("slow");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {

                // $loading.fadeOut("slow");
            }
        }); 
}

function getZipcode(result) { 
    console.log('zipcode')
    if(result['status'] == true){
        if(result['zipcode'] =='' || result['zipcode'] ==null ){

            $("#zipcodeModal").modal({
                backdrop: 'static',
                keyboard: false
            }); 
        }else{
            window.location.href ='/setFiltersByProductVehicle?flag=searchByVehicle';
        }
    } 
}