"use strict";

$(document).ready(function() {
    $('#btns-prompt button').click(function () {
        $('#btns-prompt button').toggleClass('active', false);
        $(this).toggleClass('active', true);
        let $id = $(this).attr('id');
        $('#block-prompt div[id^="prompt-"]').removeClass('d-block');
        $('#block-prompt div[id^="prompt-"]').addClass('d-none');
        $('#prompt-'+$id).removeClass('d-none');
        $('#prompt-'+$id).addClass('d-block');
        
    });
    
    

});