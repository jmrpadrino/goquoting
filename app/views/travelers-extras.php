<?php 

//    global $post, $wpdb, $menu, $wp_query, $page;
//
//    echo '<pre>';
//    var_dump($page);
//    echo '</pre>';


    include 'booking-functions.php';
    $cabinas = str_replace('\\', '', $_POST['cabins-selected']);
//    echo '<pre>';
//    echo json_encode($cabinas);
//    echo '</pre>';
    echo '<pre>';
    //print_r($_POST);
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
<style>
    <?php echo file_get_contents( RUTA_PLUGIN_BOOKING . 'app/css/booking-system-common-styles.css', true ); ?>
    /* EXTRAS VIEW */
    .square-box{
        position: relative;
        border-radius: 6px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        min-width: 48px;
        min-height: 48px;
        background: dimgray;
        margin-bottom: 10px;
    }
    /* duration */
    .duration-list{
        display: flex;
        justify-content: space-between;
    }
    .pack-placeholder-date{
        font-size: 24px;
        line-height: 24px;
        background: #1f1f1f;
        margin: 0px;
    }
    .pack-placeholder.open .pack-placeholder-date{
        background: #1f1f1f;
        background: darkorange;
        box-shadow: 0px 2px 8px rgba(105, 105, 105, 0.3);
    }
    .days-word{
        font-size: 12px;
        line-height: 1;
    }
    .pack-placeholder-info-box{
        display: none;
        margin: 0 auto;
        margin-top: -5px;
        width: 44px;
        height: 32px;
        background: darkorange;
        align-items: center;
        justify-content: space-around;
        border-radius: 6px;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        transition: top ease-in .2s;
        padding-top: 5px;
        color: white;
        cursor: pointer;
    }
    .pack-placeholder.open+.pack-placeholder-info-box{
        display: flex;
    }
    .btn-skip-extra{
        margin: 18px auto;
        display: block;
        border-radius: 0px;
        border: 1px solid #848484;
    }
    .internet-service-box .duration-list{
        justify-content: flex-start
    }
    .offer-search-filter-placeholder label{
        transform: translateY(0);
        font-size: 18px;
    }
    .offer-search-filter-placeholder label div{
        font-size: 12px;
        color: gray;
    }
    .offer-search-filter-placeholder span{
        display: inline-flex;
        border: 1px solid #ccc;
        width: 34px;
        height: 34px;
        margin-left: 12px;
        padding: 5px;
        align-content: center;
        justify-content: center;
        background: white;
    }
    .offer-search-filter-placeholder span:before{
        content: '';
        position: relative;
        width: 100%;
        height: 100%;
        background: darkorange;
        display: none;
        
    }
    .offer-search-filter-placeholder input[name=kayak-service]:checked + span:before{
        display:block;
    }
    .offer-search-filter-checkbox{
        display: none;
    }
    .aditional-activities-list{
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .additional-service-item{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 18px 0;
    }
</style>
<div class="main-sumary">
    <div class="main-sumary-item">
        <a href="<?= home_url('check-availability')?>/">
            <span class="fas fa-arrow-left"></span>
        </a>
    </div>
    <div class="main-sumary-item">
        <span>Cruises</span>
    </div>
    <div class="main-sumary-item">
        <span><?= date('d M Y', strtotime($_POST['departure'])) ?></span>
    </div>
    <div class="main-sumary-item">
        <span><?= obtenerDatoBarcoPorCodigoDispo($_POST['ship'], 'post_title') ?></span>
    </div>
</div>
<div class="cart-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="cart-title">4. <?= _e('Extras', 'gogalapagos') ?></h1>
                <p class="cart-subtitle"><?= _e('Aditional Packages or your trip') ?></p>
            </div>
        </div>            
    </div>
</div>
<form id="extrax-form" role="form" method="post" action="<?= home_url('checkout') ?>/">
    <input type="hidden" name="ship" value="<?= $_POST['ship'] ?>">
    <input type="hidden" name="departure" value="<?= $_POST['departure'] ?>">
    <input type="hidden" name="promo" value="<?= $_POST['promo'] ?>">
    <input type="hidden" name="duration" value="<?= $_POST['duration'] ?>">
    <input type="hidden" name="adults" value="<?= $_POST['adults'] ?>">
    <input type="hidden" name="children" value="<?= $_POST['children'] ?>">
    <input type="hidden" name="cabins-selected" value="<?= $cabinas ?>">
    <input type="hidden" name="extras-selected" value="[]">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-default btn-skip-extra"><?= _e('Skip this Step') ?></button>
            </div>
        </div>
        <div class="row">
            <!-- Nav tabs -->
            <ul class="booking-details-tabs" role="tablist">
                <?php for($i = 1; $i <= $_POST['adults']; $i++){ ?>
                <li role="presentation" class="booking-details-tab <?= $i == 1 ? 'active' : '' ?>"><a href="#pax-extra-<?= $i ?>" aria-controls="pax-extra-<?= $i ?>" role="tab" data-toggle="tab"><?php printf( _e('Traveler', 'gogalalagps') . ' %s', $i) ?></a><?php /*
                        $i == 1 ? printf('<span class="main-contact-text">' . _e('Main Contact', 'gogalapagos') . '</span>') : '';
                    */ ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="tab-content">
                    <?php for($i = 1; $i <= $_POST['adults']; $i++){ ?>
                    <div id="pax-extra-<?= $i ?>" class=" <?= $i > 1 ? 'fade' : '' ?> <?= $i == 1 ? 'active' : '' ?>">
                        <div class="inside-box">
                            <h3><?= _e('Select your drinks packages', 'gogalapagos')?></h3>
                            <ul class="list-inline duration-list">
                                <?php for($z = 1; $z <= 4; $z++){ ?>
                                <li>
                                    <div class="pack-placeholder" data-packcode="<?= $z ?>">
                                        <div class="square-box pack-placeholder-date">
                                            <div class="days-word"><?= _e('Pack', 'gogalapagos') ?></div>
                                            <span><?= $z ?></span>
                                        </div>
                                        <input type="hidden" name="service-amount-<?= $z ?>">
                                    </div>
                                    <div class="pack-placeholder-info-box">
                                        <i class="fa fa-info-circle"></i>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="inside-box internet-service-box">
                            <h3><?= _e('Choose your internet package', 'gogalapagos')?></h3>
                            <ul class="list-inline duration-list">
                                <?php
                                    $duraciones = 1;
                                    if ($_POST['duration'] > 4){
                                        $duraciones = 2;
                                    }
                                ?>
                                <?php for($z = 1; $z <= $duraciones; $z++){ ?>
                                <li>
                                    <div class="pack-placeholder" data-packcode="<?= $z ?>">
                                        <div class="square-box pack-placeholder-date">
                                            <div class="days-word"><?= _e('Pack', 'gogalapagos') ?></div>
                                            <span><?= $z ?></span>
                                        </div>
                                    </div>
                                    <div class="pack-placeholder-info-box">
                                        <i class="fa fa-info-circle"></i>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="inside-box">
                            <h3><?= _e('Additional Activities', 'gogalapagos')?></h3>
                            <ul class="aditional-activities-list">
                                <li>
                                    <div class="offer-search-filter-placeholder additional-service-item">
                                        <label class="offer-search-filter-label" for="kayak-service"><?= _e('Kayak') ?> <div>$ 50</div></label>
                                        <input id="offer-kayat-traveler-<?= $i ?>" class="offer-search-filter-checkbox " type="checkbox" name="offer-kayat-traveler-<?= $i ?>" id="offer-search-filter">
                                        <span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-search-filter-placeholder additional-service-item">
                                        <label class="offer-search-filter-label" for="wetsuit-service"><?= _e('Wetsuit') ?></label>
                                        <input id="offer-wetsuit-traveler-<?= $i ?>" class="offer-search-filter-checkbox" type="checkbox" name="offer-wetsuit-traveler-<?= $i ?>" id="offer-search-filter">
                                        <span></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <button type="button" class="pull-left"><i class="fas fa-shopping-cart"></i></button>
                        <button id="set-date" name="availability" value="true" class="text-center submit-button submit-button-extras pull-right" type="submit">
                            <span class="next-step"><?= _e('Next Step', 'gogalapagos') ?></span>
                            <span class="next-step-title"><?= _e('Confirmation & Payment', 'gogalapagos') ?></span>
                        </button>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</form>
<?php for($z = 1; $z <= 4; $z++){ ?>
<!-- Modal -->
<div class="modal fade" id="info-extra-<?= $z ?>" tabindex="-1" role="dialog" aria-labelledby="cabinSumary">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-chevron-left"></i></span></button>
                <h4 class="modal-title text-center" id="myModalLabel"><?= _e('Summary', 'gogalapagos') ?></h4>
            </div>
            <div class="modal-body">
                <ul class="summary-cruise-list">
                    <li><strong><?= _e('Date', 'gogalapagos') ?></strong> <?= $_POST['departure'] ?></li>
                    <li><strong><?= _e('Ship', 'gogalapagos') ?></strong> <?= obtenerDatoBarcoPorCodigoDispo($_POST['ship'], 'post_title') ?></li>
                    <li><strong><?= _e('Itinerary', 'gogalapagos') ?></strong> </li>
                    <li><strong><?= _e('Duration', 'gogalapagos') ?></strong> <?= $_POST['duration'] . ' - ' . $_POST['duration'] - 1 ?></li>
                </ul>
                <div id="sumary-content">
                    <div class="panel-group" id="cabins-selected-accordion" role="tablist" aria-multiselectable="true"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="add-another-cabin-btn" type="button" class="btn btn-default pull-left" data-dismiss="modal"><?= _e('Add another cabin', 'gogalapagos') ?></button>
                <button id="submit-accommodation" type="button" class="btn btn-warning pull-right"><?= _e('Book now', 'gogalapagos') ?></button>
            </div>
        </div>
    </div>
</div>
<?php } ?>