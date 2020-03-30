



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <!-- SCRIPTS -->
    <script src="http://ip7.vtdns.net/velocitytech/Content/js/vendor/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- DEMO STYLES -->
    <style>
        html {
            margin: 0;
            padding: 0;
        }

        body {
            padding: 25px;
            font-family: Gotham, Helvetica Neue, Helvetica, Arial," sans-serif";
        }
    </style>

</head>

<body>

    <h1>Widget Demo - (EXAMPLE)</h1>

    <h3>Sample Links - Load Vehicle</h3>

    <a class="vtws-vehicle-selector" data-vtws-vehicle-year="2017" data-vtws-vehicle-make="Acura" data-vtws-vehicle-model="ILX" data-vtws-vehicle-body-style="Sedan" data-vtws-vehicle-sub-model="Base" href="index.html#">Set Vehicle to 2017 Acura ILX Sedan Base</a><br />
    <br />
    <a class="vtws-vehicle-wheel-selector" data-vtws-vehicle-year="2017" data-vtws-vehicle-make="Acura" data-vtws-vehicle-model="ILX" data-vtws-vehicle-body-style="Sedan" data-vtws-vehicle-sub-model="Base" data-vtws-wheel-part-number="DW2518001" href="index.html#">Set Vehicle to 2017 Acura ILX Sedan Base with Wheel Part# DW2518001</a><br />
    <br />
    <a class="vtws-vehicle-wheel-selector" data-vtws-vehicle-year="2016" data-vtws-vehicle-make="Chevrolet" data-vtws-vehicle-model="Silverado 1500" data-vtws-vehicle-body-style="Crew Cab Pickup" data-vtws-vehicle-sub-model="Custom" href="index.html#">Set Vehicle to 2016 Chevrolet Silverado 1500 Crew Cab Pickup Custom</a><br />
    <br />
    <a class="vtws-vehicle-wheel-selector" data-vtws-vehicle-year="2016" data-vtws-vehicle-make="Ford" data-vtws-vehicle-model="F-150" data-vtws-vehicle-body-style="Crew Cab Pickup" data-vtws-vehicle-sub-model="Lariat" href="index.html#">Set Vehicle to 2016 Ford F150 Crew Cab Pickup Lariat</a><br />
<br />
    <a class="vtws-vehicle-wheel-selector" data-vtws-vehicle-year="2014" data-vtws-vehicle-make="Ford" data-vtws-vehicle-model="F-150" data-vtws-vehicle-body-style="Crew Cab Pickup" data-vtws-vehicle-sub-model="XL" href="index.html#">Set Vehicle to 2014 Ford F150 Crew Cab Pickup XL</a><br />
    <br />

<h3>Or, Select Your Own Vehicle:</h3>
    <div id="vtws-vehicle-selector"></div>
    <div id="vtws-wheel-studio" style="width: 700px;"></div>
    <div id="vtws-wheel-results"></div>

<script type="text/javascript" src="./dww2.js"></script>    

<h3>Sample Links - Change Wheel</h3>

    <a class="vtws-wheel-selector" data-vtws-wheel-part-number="DW2518001" href="index.html#">Change Wheel to Part# DW2518001</a><br />

<script type="text/javascript">

    $(document).ready(function () {
        $(function () {
            //vtwsTestExists("2017", "Acura", "ILX", "Sedan", "Base", "DW2518001", vehicleExists);
            //vtwsTestExists("2017", "Acura", "ILX", "A Spec", "4 Dr Sedan", "RUF2120003", vehicleExists);
            vtwsTestExists("2017", "Acura", "ILX", "4 Dr Sedan", "Base", "DW2518001", vehicleExists);

            function vehicleExists(exists) {
                if (exists) {
                    vtwsInitialize({
                        onLoadData: loadData,
                        onProductsLoaded: wheelResults,
                        onVehicleChanging: onVehicleChanging,
                        onVehicleLoaded: onVehicleLoaded,
                        vehicleChangeClicked: vehicleChangeClicked,
                        onSortClicked: onSortClicked,
                        onFilterClicked: onFilterClicked,
                        token: 'cfa98f2b-5fcf-4004-a82b-3de229deb782'
                    });

                    function loadData() {
                        vtwsSelectVehicle("2017", "Acura", "ILX", "Sedan", "Base", "DW2518001");
                        //vtwsSelectVehicle("2017", "Acura", "ILX", "A Spec", "4 Dr Sedan", "RUF2120003");
                    };

                    function wheelResults(resultCount) {
                        console.log("Wheel restuls complete, # results = " + resultCount);
                    };

                    function onVehicleChanging() {
                        console.log("onVehicleChanging");
                    };

                    function onVehicleLoaded() {
                        console.log("onVehicleLoaded");
                    };

                    function vehicleChangeClicked() {
                        console.log("vehicleChangeClicked");
                    };

                    function onSortClicked(sort) {
                        console.log("onSortClicked");
                        console.log(sort);
                    };

                    function onFilterClicked(filter) {
                        console.log("onFilterClicked");
                        console.log(filter);
                    };
                }
                else {
                    alert("No Vehicle Found");
                }
            };
        });
    });

    

</script>
    <br />
</body>
</html>
