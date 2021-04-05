"use strict";

$(document).ready(function() {

// ILLUSTRATIONS
    $('#block-artwork ul button').click(function () {
        $('#myModal').toggle();
        let slideIndex = parseInt($(this).attr('class'));
        showSlides(slideIndex);
        //attribuer le "alt" pour chaque <img>

        $('#prev').click( function() {
            showSlides(slideIndex += -1);
        });
        $('#next').click( function() {
            showSlides(slideIndex += 1);
        });

        function showSlides(n) {
            let i;
            let slides = $('.mySlides');
            if (n > slides.length) {slideIndex = 1;}
            if (n < 1) {slideIndex = slides.length;}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex-1].style.display = "block";
        }

        $(window).click(function (event) {
            if (event.target === $('#myModal')) {
                $('#myModal').toggle();
            }
        });
    });

    $('.close').click(function () {
        $('#myModal').toggle('d-none');
    });

// Contains [id*='string'] / Starts With [id^='string']
// Ends With [id$='string'] / Not a given string [id!='string']
    $('button[id^="btn-art-edit"]').click(function () {
        $('#prev').toggle();
        $('#next').toggle();
    });


    

});