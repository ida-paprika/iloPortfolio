"use strict";

$(document).ready(function() {

/* FUNCTIONS */
    function blockNone(name){
        if($('#block-'+name).hasClass('d-flex')){
            $('#block-'+name).removeClass('d-flex');
            $('#block-'+name).addClass('d-none');
        console.log('something');
        }
    }
    function blockFlex(name){
        if($('#block-'+name).hasClass('d-none')){
            $('#block-'+name).removeClass('d-none');
            $('#block-'+name).addClass('d-flex');
        }
    }
    function zIndex(num){
        for(let i=1; i<6; i++){
            $('#onglet'+num).removeClass('zi-'+i);
        }
    }

/* ONGLETS */
    $('#btn-ong1').click(function () {
        blockNone('prompt');
        blockNone('chimere');
        blockNone('later');
        blockFlex('artwork');
        for(let i=1; i<5; i++){
            zIndex(i);
        }
        $('#onglet1').addClass('zi-5');
        $('#onglet2').addClass('zi-3');
        $('#onglet3').addClass('zi-2');
        $('#onglet4').addClass('zi-1');
        //$('#galerie-sections').load('../../View/galerie_sections.php #block-artwork');
    });
    $('#btn-ong2').click(function () {
        blockNone('artwork');
        blockNone('chimere');
        blockNone('later');
        blockFlex('prompt');
        for(let i=1; i<5; i++){
            zIndex(i);
        }
        $('#onglet2').addClass('zi-5');
        $('#onglet1').addClass('zi-3');
        $('#onglet3').addClass('zi-2');
        $('#onglet4').addClass('zi-1');
        //$('#galerie-sections').load('../../View/galerie_sections.php #block-prompt');
    });
    $('#btn-ong3').click(function () {
        blockNone('artwork');
        blockNone('prompt');
        blockNone('later');
        blockFlex('chimere');
        for(let i=1; i<5; i++){
            zIndex(i);
        }
        $('#onglet3').toggleClass('zi-5');
        $('#onglet1').toggleClass('zi-3');
        $('#onglet2').toggleClass('zi-2');
        $('#onglet4').toggleClass('zi-1');
        //$('#galerie-sections').load('../../View/galerie_sections.php #block-chimere');
    });
    $('#btn-ong4').click(function () {
        blockNone('artwork');
        blockNone('prompt');
        blockNone('chimere');
        blockFlex('later');
        for(let i=1; i<5; i++){
            zIndex(i);
        }
        $('#onglet4').toggleClass('zi-5');
        $('#onglet1').toggleClass('zi-3');
        $('#onglet2').toggleClass('zi-2');
        $('#onglet3').toggleClass('zi-1');
        //$('#galerie-sections').load('../../View/galerie_sections.php #block-later');
    });




});