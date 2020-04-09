//BASE URL
var baseURL = "";
var vtwsToken = null;
var vtwsClientLocation = null;
var vtwsSettings = {};

function qs(key) {
  key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, "\\$&"); // escape RegEx meta chars
  var match = location.search.match(new RegExp("[?&]" + key + "=([^&]+)(&|$)"));
  return match && decodeURIComponent(match[1].replace(/\+/g, " "));
}
function qsj(key) {
  var scripts = document.getElementsByTagName('script');
  var qs = "";
  for (var i = 0; i < scripts.length; i++) {
    qs = scripts[i].src.replace(/^[^\?]+\??/, '');
    if (qs.indexOf(key + "=") >= 0) {        
      qs = "?" + qs;
      key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, "\\$&"); // escape RegEx meta chars
      var match = qs.match(new RegExp("[?&]" + key + "=([^&]+)(&|$)"));
      return match && decodeURIComponent(match[1].replace(/\+/g, " "));
    }
  }
  return null;
}

function browserSpecs() {
    var ua = navigator.userAgent, tem,
    M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if (/trident/i.test(M[1])) {
        tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
        return { name: 'IE', version: (tem[1] || '') };
    }
    if (M[1] === 'Chrome') {
        tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
        if (tem != null) return { name: tem[1].replace('OPR', 'Opera'), version: tem[2] };
    }
    M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
    if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1, tem[1]);
    return { name: M[0], version: M[1] };
};

function checkBrowserCompatibility() {
    var browser = browserSpecs();
    console.log("browser " + browser.name + ", version " + browser.version);
    var version = new Number(browser.version);
    if (browser.name === "Chrome" && version >= 29) {
        return true;
    }
    else if (browser.name === "Safari" && version >= 9){        
        return true;
    }
    else if ((browser.name === "Edge" || browser.name === "msie" || browser.name === "IE") && version >= 11) {
        return true;
    }
    else if (browser.name === "Firefox" && version >= 28) {
        return true;
    }
    else if (browser.name === "Opera" && version >= 17) {
        return true;
    }

    alert("Your browser version not supported.\nPlease upgrade to at least Chrome 29, IE 11, FireFox 28, Safari 9 or Opera 17");
    return false;
};

function initialize() {
    vtwsToken = qsj("vtwstoken");
    if (vtwsToken == null) {
        vtwsToken = qsj("t");
    }
    var s = qsj("s");
    if (s != null) {
        // Set the server location for all script calls
        baseURL = s;
    } else {
        // default to live server if not specified
        baseURL = "https://apps.velocity-tech.com";
    }

    console.log("location.origin = " + location.origin);
    vtwsClientLocation = location.origin;

    // return token
    return vtwsToken;
};

function vtwsTestExists(y, m, mdl, b, sm, partNumber, callBack) {
    var t = initialize();
    console.log("Check for vehicleExists = " + y + " " + m + " " + mdl + " " + b + " " + sm + " " + partNumber);

    $.get(baseURL + "/Vehicle/VehicleExists/?y=" + y + "&m=" + m + "&mdl=" + mdl + "&b=" + b + "&sm=" + sm + "&partNumber=" + partNumber,
        function (data) {
          console.log("data1",data,(y, m, mdl, b, sm, partNumber, callBack));
            try {
                if (data.Exists === true) {
                    if (callBack) {
                        callBack(true);
                        return;
                    }
                }

                if (data.Error != null) {
                    console.log(data.Error);
                }

                if (callBack) {
                    callBack(false);
                    return;
                }
            }
            catch (ex) {
                console.log(ex);
            }

            if (callBack) {
                callBack(false);
            }
        }).fail(function () {
            if (callBack) {
                callBack(false);
            }
        })
        .always(function () {

        });
};


function vtwsInitialize(settings) {
    vtwsInit(settings.onLoadData, null, settings);
};

function vtwsInit(onStudioLoaded, onProductsLoadedCallback, settings) {
    if (!checkBrowserCompatibility()) {
        return;
    }
    
    var t = initialize();

    vtwsSettings = settings;
    if (settings == null) {
        vtwsSettings = {
            onProductsLoaded: onProductsLoadedCallback,
            onVehicleLoaded: null,
            onVehicleChanged: null,
            onVehicleChanging: null,
            vehicleChangeClicked: null
        };
    } else {
        if (vtwsSettings.onProductsLoaded == null) {
            vtwsSettings.onProductsLoaded = onProductsLoadedCallback;
        }        
    }

    if (vtwsSettings.token == null) {
        vtwsSettings.token = t;
    } else {
        vtwsToken = vtwsSettings.token;
    }


    if ($("#vtws-mainImage").html() !== undefined) {
        // we have already loaded the studio, invoke callback
        console.log("Studio already loaded ...");
        fireWhenReady(onStudioLoaded);
        return;
    }

    // Load Widget Components - Get VehicleSelector first since all the javascript that uses the html is loaded in WheelStudio and the
    // HTML needs to be loaded before the vehicleselector ready function is excecuted ... otherwise it will not wire up correctly ... order matters here.
    $.get(baseURL + "/Widget/VehicleSelector/" + vtwsSettings.token + "?origin=" + vtwsClientLocation, function (data) {
      if (data != "") {          
          if ($("#vtws-vehicle-selector").length == 0) {
              $("body").append("<div id='vtws-vehicle-selector' style='display: none;'></div>");
          }
          $("#vtws-vehicle-selector").html(data);

          $.get(baseURL + "/Widget/WheelStudio/" + vtwsSettings.token + "?origin=" + vtwsClientLocation,
              function (data) {
                  if ($("#vtws-wheel-studio").length == 0) {
                      $("<div id='vtws-wheel-studio' style=\"display:none !important\"></div>").insertAfter("#vtws-vehicle-selector");
                  }

                  $("#vtws-wheel-studio").html(data);
                  
                  // Since we are using ajax to load html and js we need to find out if the js library is completely loaded
                  // otherwise we will get undefined errors on the methods. 
                  // Since all the script tags are in the underlying returned html called with ajax, we have to go this route.
                  fireWhenReady(onStudioLoaded);
              });
      } else
          console.log("Invalid token " + vtwsSettings.token + " specified");
  });

    function fireWhenReady(onStudioLoaded) {
      if (typeof vtwsSelectVehicle != 'undefined' && typeof getVehicleImage != 'undefined') {
          if (onStudioLoaded) {
              onStudioLoaded();
          }
      }
      else {
          console.log("vtwsSelectVehicle not ready" );
          window.setTimeout(function () {
              fireWhenReady(onStudioLoaded);
          }, 50);
      }
  }

  attachVehicleSelectorEvents();
    //Vehicle and Wheel Selectors
  function attachVehicleSelectorEvents() {
      var selector = $(".vtws-vehicle-selector");
      if (selector != null) {
          selector.click(function (e) {
              e.preventDefault();
              var vs = $(this);
              vtwsSelectVehicle(vs.data("vtwsVehicleYear"), vs.data("vtwsVehicleMake"), vs.data("vtwsVehicleModel"), vs.data("vtwsVehicleBodyStyle"), vs.data("vtwsVehicleSubModel"), null, false);
          });
      }

      $("a.vtws-wheel-selector").click(function (e) {
          e.preventDefault();
          var vs = $(this);
          vtwsSelectWheel(vs.data("vtwsWheelPartNumber"));
      });

      $("a.vtws-vehicle-wheel-selector").click(function (e) {
          e.preventDefault();
          var vs = $(this);
          vtwsSelectVehicle(vs.data("vtwsVehicleYear"), vs.data("vtwsVehicleMake"), vs.data("vtwsVehicleModel"), vs.data("vtwsVehicleBodyStyle"), vs.data("vtwsVehicleSubModel"), vs.data("vtwsWheelPartNumber"), false, vs.data("vtwsProductBrand"));
      });
    };  
}







