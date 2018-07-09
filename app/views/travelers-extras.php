<?php 
    include 'booking-functions.php';

    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    $total_pax = $_POST['adults'] +  $_POST['children'];
    /*
    * META_PREFIX
    */

?>