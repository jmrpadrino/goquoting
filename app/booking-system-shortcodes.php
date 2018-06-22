<?php

// CREAR EL SHORTCODE PARA INYECTAR LAS FUNCIONES DEL COTIZADOR
add_shortcode('goquoting-check-availability', 'goquotingCheckAvailability');
add_shortcode('goquoting-accommodation', '');
add_shortcode('goquoting-travelers-details', '');
add_shortcode('goquoting-extras', '');
add_shortcode('gogabooking-checkout', '');

function goquotingCheckAvailability(){
    include 'views/check-availability.php';
}