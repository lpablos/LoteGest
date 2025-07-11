/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Form wizard Js File
*/


// $(function () {
//     $("#basic-example").steps({
//         headerTag: "h3",
//         bodyTag: "section",
//         transitionEffect: "slide"
//     });


//     $("#vertical-example").steps({
//         headerTag: "h3",
//         bodyTag: "section",
//         transitionEffect: "slide",
//         stepsOrientation: "vertical"
//     });
// });


$(function () {
    $("#basic-example").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slide",
        autoFocus: true,
        onFinished: function (event, currentIndex) {
            console.log("Aqui este es el event", event);
            console.log("Este esel el currentIndex", event);
            
            document.getElementById('wizard-form').submit();
        }
    });
   
});
