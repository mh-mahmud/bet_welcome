/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$(document).ready(function () {
//
//});

$(window).on('load', function () {
    var modal_to_open = '';
    if ($('#model-auto-open').length > 0) {
        modal_to_open = $('#model-auto-open').attr('data');
        $('#' + modal_to_open).modal('show');
    }
});

