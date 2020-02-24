

// // Common  Function to change the params values in the current url
// function updateParamsToUrl(paramKey, paramValue) {

//     paramValue = window.btoa(JSON.stringify(paramValue));

//     var nextUrl = window.location.origin + window.location.pathname;

//     var params = getUrlVars(); //Get all the query params as an ARRAY

//     var size = Object.keys(params).length;
//     var i = 0;
//     if (size == 0) {
//         window.location.href = window.location.href + "?" + paramKey + "=" + paramValue;
//     } else {

//         nextUrl += '?'; // ? for started to attach the query string to url

//         params[paramKey] = paramValue;

//         // This is for search,selection by any one of ways => BRAND or SEARCH Keyword
//         // if (paramKey == 'search' && params['brand'] != undefined) {
//         //     params['brand'] = '';
//         // }
//         // if (paramKey == 'brand' && params['search'] != undefined) {
//         //     params['search'] = '';
//         // }

//         // if (paramKey == 'brand') {
//         //     params['width'] = '';
//         //     params['diameter'] = '';
//         // }

//         // Attach the query params to the nextURL 
//         $.each(params, function(key, value) {
//             if (value != '') {
//                 if (i == size) {
//                     nextUrl += key + '=' + value;
//                 } else {
//                     nextUrl += key + '=' + value + '&';
//                 }
//             }

//             i++;
//         });


//         window.location.href = nextUrl;
//     }
// }


// // Common  Function to change the params values in the current url
// function removeParamsFromUrl(paramKey) {


//     var nextUrl = window.location.origin + window.location.pathname;

//     var params = getUrlVars(); //Get all the query params as an ARRAY
//     params[paramKey] = '';
//     var size = Object.keys(params).length;
//     var i = 0;
//     if (size == 0) {
//         window.location.href = window.location.origin + window.location.pathname;
//     } else {
//         nextUrl += '?'; // ? for started to attach the query string to url

//         // This is for search,selection by any one of ways => BRAND or SEARCH Keyword
//         if (paramKey == 'search' && params['brand'] != undefined) {
//             params['brand'] = '';
//         }
//         if (paramKey == 'brand' && params['search'] != undefined) {
//             params['search'] = '';
//         }

//         // Attach the query params to the nextURL 
//         $.each(params, function(key, value) {
//             if (value != '') {
//                 if (i == size) {
//                     nextUrl += key + '=' + value;
//                 } else {
//                     nextUrl += key + '=' + value + '&';
//                 }
//             }

//             i++;
//         });

//         window.location.href = nextUrl;
//     }
// }

// function getUrlVars() {
//     var vars = {};
//     var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
//         vars[key] = value;
//     });
//     return vars;
// }
