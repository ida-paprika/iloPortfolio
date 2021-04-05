"use strict";


function message(){
    let msg = $("#message");
    if( msg != null){
        msg.toggle('d-none');
    }
}

function chrono(){
    setTimeout(message, 5000);
}

document.addEventListener("DOMContentLoaded", chrono);