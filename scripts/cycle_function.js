"use strict";
$(document).ready(function () {
    $('#noticias_destaque ul').cycle({
        fx: 'fade',
        speed: 1500,
        timeout: 5000,
        pager: '#pager'
    });
});