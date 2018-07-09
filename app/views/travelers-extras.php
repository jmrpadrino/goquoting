<?php 
    include 'booking-functions.php';
    $cabinas = str_replace('\\', '', $_POST['cabins-selected']);
    echo '<pre>';
    echo json_encode($cabinas);
    echo '</pre>';
    $total_pax = $_POST['adults'] +  $_POST['children'];

    /*
    * META_PREFIX
    */
    // DATOS DEL ARRAY
    /*
    array(120) {
  ["ship"]=>
  string(6) "BAR001"
  ["departure"]=>
  string(10) "2018-06-05"
  ["promo"]=>
  string(4) "1207"
  ["duration"]=>
  string(1) "8"
  ["adults"]=>
  string(1) "4"
  ["children"]=>
  string(1) "3"
  ["cabins-selected"]=>
  string(4) "[{\\"
  ["title-traveler-1"]=>
  string(3) "Mr."
  ["fname-traveler-1"]=>
  string(4) "Jose"
  ["lname-traveler-1"]=>
  string(9) "Rodriguez"
  ["gender-traveler-1"]=>
  string(1) "m"
  ["phone-traveler-1"]=>
  string(10) "0983850461"
  ["email-traveler-1"]=>
  string(20) "jmrpadrino@gmail.com"
  ["bd-traveler-1"]=>
  string(2) "23"
  ["bm-traveler-1"]=>
  string(1) "2"
  ["by-traveler-1"]=>
  string(4) "1980"
  ["country-traveler-1"]=>
  string(2) "VE"
  ["citystate-traveler-1"]=>
  string(6) "Merida"
  ["streetaddress-traveler-1"]=>
  string(16) "Urb. La Trinidad"
  ["city-traveler-1"]=>
  string(8) "El Vigia"
  ["zipcode-traveler-1"]=>
  string(4) "5145"
  ["diet-traveler-1"]=>
  string(2) "d2"
  ["medical-traveler-1"]=>
  string(2) "m2"
  ["title-traveler-2"]=>
  string(3) "Mr."
  ["fname-traveler-2"]=>
  string(0) ""
  ["lname-traveler-2"]=>
  string(0) ""
  ["gender-traveler-2"]=>
  string(1) "m"
  ["phone-traveler-2"]=>
  string(0) ""
  ["email-traveler-2"]=>
  string(0) ""
  ["bd-traveler-2"]=>
  string(1) "1"
  ["bm-traveler-2"]=>
  string(1) "1"
  ["by-traveler-2"]=>
  string(4) "1918"
  ["country-traveler-2"]=>
  string(2) "AF"
  ["citystate-traveler-2"]=>
  string(0) ""
  ["streetaddress-traveler-2"]=>
  string(0) ""
  ["city-traveler-2"]=>
  string(0) ""
  ["zipcode-traveler-2"]=>
  string(0) ""
  ["diet-traveler-2"]=>
  string(2) "d1"
  ["medical-traveler-2"]=>
  string(2) "m1"
  ["title-traveler-3"]=>
  string(3) "Mr."
  ["fname-traveler-3"]=>
  string(0) ""
  ["lname-traveler-3"]=>
  string(0) ""
  ["gender-traveler-3"]=>
  string(1) "m"
  ["phone-traveler-3"]=>
  string(0) ""
  ["email-traveler-3"]=>
  string(0) ""
  ["bd-traveler-3"]=>
  string(1) "1"
  ["bm-traveler-3"]=>
  string(1) "1"
  ["by-traveler-3"]=>
  string(4) "1918"
  ["country-traveler-3"]=>
  string(2) "AF"
  ["citystate-traveler-3"]=>
  string(0) ""
  ["streetaddress-traveler-3"]=>
  string(0) ""
  ["city-traveler-3"]=>
  string(0) ""
  ["zipcode-traveler-3"]=>
  string(0) ""
  ["diet-traveler-3"]=>
  string(2) "d1"
  ["medical-traveler-3"]=>
  string(2) "m1"
  ["title-traveler-4"]=>
  string(3) "Mr."
  ["fname-traveler-4"]=>
  string(0) ""
  ["lname-traveler-4"]=>
  string(0) ""
  ["gender-traveler-4"]=>
  string(1) "m"
  ["phone-traveler-4"]=>
  string(0) ""
  ["email-traveler-4"]=>
  string(0) ""
  ["bd-traveler-4"]=>
  string(1) "1"
  ["bm-traveler-4"]=>
  string(1) "1"
  ["by-traveler-4"]=>
  string(4) "1918"
  ["country-traveler-4"]=>
  string(2) "AF"
  ["citystate-traveler-4"]=>
  string(0) ""
  ["streetaddress-traveler-4"]=>
  string(0) ""
  ["city-traveler-4"]=>
  string(0) ""
  ["zipcode-traveler-4"]=>
  string(0) ""
  ["diet-traveler-4"]=>
  string(2) "d1"
  ["medical-traveler-4"]=>
  string(2) "m1"
  ["title-traveler-5"]=>
  string(3) "Mr."
  ["fname-traveler-5"]=>
  string(0) ""
  ["lname-traveler-5"]=>
  string(0) ""
  ["gender-traveler-5"]=>
  string(1) "m"
  ["phone-traveler-5"]=>
  string(0) ""
  ["email-traveler-5"]=>
  string(0) ""
  ["bd-traveler-5"]=>
  string(1) "1"
  ["bm-traveler-5"]=>
  string(1) "1"
  ["by-traveler-5"]=>
  string(4) "1918"
  ["country-traveler-5"]=>
  string(2) "AF"
  ["citystate-traveler-5"]=>
  string(0) ""
  ["streetaddress-traveler-5"]=>
  string(0) ""
  ["city-traveler-5"]=>
  string(0) ""
  ["zipcode-traveler-5"]=>
  string(0) ""
  ["diet-traveler-5"]=>
  string(2) "d1"
  ["medical-traveler-5"]=>
  string(2) "m1"
  ["title-traveler-6"]=>
  string(3) "Mr."
  ["fname-traveler-6"]=>
  string(0) ""
  ["lname-traveler-6"]=>
  string(0) ""
  ["gender-traveler-6"]=>
  string(1) "m"
  ["phone-traveler-6"]=>
  string(0) ""
  ["email-traveler-6"]=>
  string(0) ""
  ["bd-traveler-6"]=>
  string(1) "1"
  ["bm-traveler-6"]=>
  string(1) "1"
  ["by-traveler-6"]=>
  string(4) "1918"
  ["country-traveler-6"]=>
  string(2) "AF"
  ["citystate-traveler-6"]=>
  string(0) ""
  ["streetaddress-traveler-6"]=>
  string(0) ""
  ["city-traveler-6"]=>
  string(0) ""
  ["zipcode-traveler-6"]=>
  string(0) ""
  ["diet-traveler-6"]=>
  string(2) "d1"
  ["medical-traveler-6"]=>
  string(2) "m1"
  ["title-traveler-7"]=>
  string(3) "Mr."
  ["fname-traveler-7"]=>
  string(0) ""
  ["lname-traveler-7"]=>
  string(0) ""
  ["gender-traveler-7"]=>
  string(1) "m"
  ["phone-traveler-7"]=>
  string(0) ""
  ["email-traveler-7"]=>
  string(0) ""
  ["bd-traveler-7"]=>
  string(1) "1"
  ["bm-traveler-7"]=>
  string(1) "1"
  ["by-traveler-7"]=>
  string(4) "1918"
  ["country-traveler-7"]=>
  string(2) "AF"
  ["citystate-traveler-7"]=>
  string(0) ""
  ["streetaddress-traveler-7"]=>
  string(0) ""
  ["city-traveler-7"]=>
  string(0) ""
  ["zipcode-traveler-7"]=>
  string(0) ""
  ["diet-traveler-7"]=>
  string(2) "d1"
  ["medical-traveler-7"]=>
  string(2) "m1"
  ["travelers-details"]=>
  string(4) "true"
}
    */

?>