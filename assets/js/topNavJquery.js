/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {


    var crreunt_active_top_nav = Cookies.get('activeTopNav');

    if (crreunt_active_top_nav == undefined) {
        crreunt_active_top_nav = 1;
    }

    $('#topNavbar li a').removeClass('active');
    $('#topNavbar li:nth-child(' + crreunt_active_top_nav + ') a').addClass('active');

    $(document).on('click', '#topNavbar li', function () {
        Cookies.set('activeTopNav', $(this).index() + 1);
        $('#topNavbar li a').removeClass('active');
        $(this).find('a').addClass('active');
    });

});