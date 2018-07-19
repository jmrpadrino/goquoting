<?php 

    include 'booking-functions.php';
    $prefix = 'gg_';
    $cabinas = str_replace('\\', '', $_POST['cabins-selected']);
    $total_pax = $_POST['adults'] +  $_POST['children'];

    $args = array(
        'post_type' => 'ggonboardservices',
        'posts_per_page' => -1,    
    );
    $onboardservices = get_posts($args);
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

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
    .main-contact-text{
        font-size: 10px;
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
        background: #be6902;
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
        border: 1px solid #bbbbbb;
    }
    .duration-list{
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
    .offer-search-filter-placeholder.selected span:before{
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
    .show-resume{
        padding: 16px;
        position: relative;
        background: #1f1f1f;
        color: white;
        margin-bottom: 36px; 
    }
    .show-resume:after{
        content: '';
        display: block;
        position: absolute;
        right: 12px;
        top: 14px;
        width: 10px;
        height: 10px;
        background: lime;
        border-radius: 100%;
    }
    .modal-footer.text-center{
        text-align: center !important;
    }
    .counter-controller{
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
        margin-bottom: 36px;
    }
    .counter-controller .pax-counter{
        max-width: 36px;
        margin: 0 36px;
        border: none;
        border-bottom: 1px solid black;
        
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
    <input type="hidden" name="travelers-details" value="">
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
                <li role="presentation" class="booking-details-tab <?= $i == 1 ? 'active' : '' ?>"><a href="#pax-extra-<?= $i ?>" aria-controls="pax-detail-<?= $i ?>" role="tab" data-toggle="tab"><?php printf( _e('Traveler', 'gogalalagps') . ' %s', $i) ?> <?= $i == 1 ? '<span class="main-contact-text">' . _x('Main Contact', 'gogalapagos') . '</span>' : '';
                    ?></a></li>
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
                                <?php 
                                    //for($z = 1; $z <= 4; $z++){ 
                                    $y = 1;
                                    foreach($onboardservices as $servicio){
                                        $categoria = get_the_terms($servicio->ID, 'onboard-service-package');
                                        if ($categoria[0]->slug == 'drink-packages'){
                                ?>
                                <li>
                                    <div class="pack-placeholder" data-packcode="<?= $servicio->ID ?>" data-pax="<?= $i ?>">
                                        <div class="square-box pack-placeholder-date">
                                            <div class="days-word"><?= _e('Pack', 'gogalapagos') ?></div>
                                            <span><?= $y ?></span>
                                        </div>
                                        <input type="hidden" name="pax-extra-<?= $i ?>-drinkspackages-amount-<?= $servicio->ID ?>" data-packcode="<?= $servicio->ID ?>" data-pax="<?= $i ?>">
                                    </div>
                                    <div class="pack-placeholder-info-box" data-packcode="<?= $servicio->ID ?>" data-pax="<?= $i ?>">
                                        <i class="fa fa-info-circle"></i>
                                    </div>
                                </li>
                                <?php 
                                        $y++; 
                                        } //Fin si
                                    } // fin foreach
                                ?>
                            </ul>
                        </div>
                        <div class="inside-box internet-service-box">
                            <h3><?= _e('Choose your internet package', 'gogalapagos')?></h3>
                            <ul class="list-inline duration-list">
                                <?php 
                                    //for($z = 1; $z <= 4; $z++){ 
                                    $y = 1;
                                    foreach($onboardservices as $servicio){
                                        $categoria = get_the_terms($servicio->ID, 'onboard-service-package');
                                        if ($categoria[0]->slug == 'internet-packages'){
                                ?>
                                <li>
                                    <div class="pack-placeholder" data-packcode="<?= $z ?>">
                                        <div class="square-box pack-placeholder-date">
                                            <div class="days-word"><?= _e('Pack', 'gogalapagos') ?></div>
                                            <span><?= $y ?></span>
                                        </div>
                                    </div>
                                    <div class="pack-placeholder-info-box" data-packcode="<?= $servicio->ID ?>" data-pax="<?= $i ?>">
                                        <i class="fa fa-info-circle"></i>
                                    </div>
                                </li>
                                <?php 
                                        $y++; 
                                        } //Fin si
                                    } // fin foreach
                                ?>
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
                        <div class="inside-box empty-box">
                            <button id="shoping-status" type="button" class="submit-button left show-resume"><i class="fas fa-2x fa-shopping-cart"></i></button>
                            <button id="set-date" name="availability" value="true" class="text-center submit-button right submit-button-extras" type="submit">
                                <span class="next-step"><?= _e('Next Step', 'gogalapagos') ?></span>
                                <span class="next-step-title"><?= _e('Confirmation', 'gogalapagos') ?></span>
                            </button>
                        </div>
                    </div>
                    <?php 
                        foreach($onboardservices as $serviciomodal){
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="info-extra-<?= $i ?>-<?= $serviciomodal->ID ?>" data-pax="<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="cabinSumary">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-chevron-left"></i></span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel"><?= $serviciomodal->post_title ?></h4>
                                </div>
                                <div class="modal-body">
                                    <h3>$ <?= get_post_meta($serviciomodal->ID, $prefix . 'onboard_service_price', true) ?></h3>
                                    <div id="sumary-content"><?= $serviciomodal->post_content ?></div>
                                </div>
                                <div class="modal-footer text-center">
                                    <h4><?= _e('Number of packages', 'gogalapagos') ?></h4>
                                    <div class="counter-controller">
                                        <div class="counter-operation counter-service counter-<?= $serviciomodal->ID ?> subtract" data-serviceid="<?= $serviciomodal->ID ?>" data-pax="<?= $i ?>">
                                            <i class="fas fa-minus"></i>
                                        </div>
                                        <input id="counter-<?= $i ?>-<?= $serviciomodal->ID ?>" class="pax-counter" type="number" name="services[<?= $i ?>][<?= $serviciomodal->post_name ?>]" min="0" value="0" data-serviceid="<?= $serviciomodal->ID ?>">
                                        <div class="counter-operation counter-service counter-<?= $serviciomodal->ID ?> add" data-serviceid="<?= $serviciomodal->ID ?>" data-pax="<?= $i ?>">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                    <button id="add-another-cabin-btn" type="button" class="btn btn-default submit-button center" data-dismiss="modal"><?= _e('Done', 'gogalapagos') ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->
<div class="modal fade" id="cabinSumary" tabindex="-1" role="dialog" aria-labelledby="cabinSumary">
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
                <button id="add-another-cabin-btn" type="button" class="btn btn-default pull-left" data-dismiss="modal"><?= _e('Add another extra', 'gogalapagos') ?></button>
                <button id="submit-accommodation" type="button" class="btn btn-warning pull-right"><?= _e('Confirmation', 'gogalapagos') ?></button>
            </div>
        </div>
    </div>
</div>