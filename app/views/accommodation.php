<?php 
include PATH_PLUGIN_BOOKING . '/app/functions/booking-functions.php';

$cookie = crearCookie();

$sql = "SELECT * FROM gg_goquoting_pedido WHERE cookie_sesion = '".$cookie."'";

$registro = $wpdb->get_results($sql);


if (!$registro){
    $wpdb->insert(
        $prefix . 'goquoting_pedido',
        array(
            'cookie_sesion' => $cookie,
            'fecha' => date('Y-m-d h:i:s'),
            'barco' => $_POST['ship'],
            'f_salida' => $_POST['departure'],
            'adultos' => $_POST['adults'],
            'ninios' => $_POST['children'],
            'duracion' => $_POST['duration'],
            'promo' => $_POST['promo']
        )
    );
}
$registro = $wpdb->get_results($sql);    
$total_pax = $_POST['adults'] +  $_POST['children'];

?>
<style>
    <?php echo file_get_contents( RUTA_PLUGIN_BOOKING . 'app/css/booking-system-common-styles.css', true ); ?>
    /* ACCOMMODATION VIEW */
    .cabins-list{
        margin: 0;
        padding: 0;
        width: 100%;
    }
    .cabin-list-item{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        min-height: 36px;
    }
    .cabin-list-status.hiddencabinbox{
        color: lightgray;
    }
    .cabin-box{
        padding: 0 18px;
    }
    .cabin-box-thumbnail-placeholder{
        border-radius: 6px 6px 0px 0px;
        overflow: hidden;
    }
    .cabin-box .inside-box{
        margin-top: -18px;
        z-index: 999;
        position: relative;
    }
    .price-box{
        margin-top: 9px;
    }
    .price-box p{
        margin: 0;
        line-height: 16px;
        font-size: 10px;
    }
    .price-box p:first-child{
        font-size: 18px;
        font-weight: bold;
    }
    .add-cabin-btn{
        margin: 12px auto;
        display: block;
    }
    .shoping-status{
        position: relative;
    }
    .shoping-status:after{
        content: '';
        width: 8px;
        height: 8px;
        display: block;
        position: absolute;
        top: 0;
        right: -4px;
        border-radius: 10px;        
        background: red;
    }
    .shoping-status.accommodate:after{
        background: orange;
    }
    .shoping-status.done:after{
        background: #00ff00;
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
                <h1 class="cart-title">2. <?= _e('Accommodation', 'gogalapagos') ?></h1>
                <p class="cart-subtitle"><?= _e('Select your Cabin Accommodation') ?></p>
            </div>
        </div>            
    </div>
</div>
<form id="accommodation-form" role="form" method="post" action="<?= home_url('traveler-details') ?>?id=<?= $registro[0]->id ?>" enctype='application/json'>
    <input type="hidden" name="cookie_sesion" value="<?= $cookie ?>">
    <input type="hidden" name="ship" value="<?= $_POST['ship'] ?>">
    <input type="hidden" name="departure" value="<?= $_POST['departure'] ?>">
    <input type="hidden" name="promo" value="<?= $_POST['promo'] ?>">
    <input type="hidden" name="duration" value="<?= $_POST['duration'] ?>">
    <input type="hidden" name="adults" value="<?= $_POST['adults'] ?>">
    <input type="hidden" name="children" value="<?= $_POST['children'] ?>">
    <?php 
    $cabinas = obtenerCabinasPorBarco( obtenerDatoBarcoPorCodigoDispo($_POST['ship'], 'ID') );
    ?>
    <div class="inside-box little-box">
        <?php
        $pending = _x('Pending Assignment', 'gogalapagos');
        $gest_word = _x('guests', 'gogalapagos');
        echo '<div class="pending-text">' . $pending . ' <strong id="pending-pax">' . $total_pax . '</strong> ' .$gest_word . '</div>';
        ?>
        <div class="checkout-btn-placeholder" style="display: none;">
            <button id="go-checkout" type="button" class="btn btn-warning"><?= _e('Proceed to checkout', 'gogalapagos') ?></button>
        </div>
        <div id="shoping-status" class="shoping-status"><i class="fas fa-shopping-cart"></i></div>
    </div>
    <div class="inside-box little-box">
        <div id="show-cabins-list-filter"><i class="fas fa-plus"></i></div>
        <div><?= _e('Show all cabin categories') ?></div>
        <div id="filter-status"><i class="fas fa-check-square"></i></div>
    </div>
    <div id="cabins-list-placeholder" class="inside-box little-box" style="display: none;">
        <ul id="cabins-list" class="cabins-list">
            <?php
    foreach ($cabinas as $cabina){
        echo '<li class="cabin-list-item">';
        echo '<div class="cabin-list-title '. $cabina->post_name .'" >' . $cabina->post_title . '</div>';
        echo '<div class="cabin-list-status" data-cabinbox="' . $cabina->ID . '"><i class="fas fa-check-square"></i></div>';
        echo '</li>';
    }
            ?>
        </ul>
    </div>
    <?php 
    foreach ($cabinas as $cabina){ 
        // Cabina codigo dispo
        $cabina_dispo_code = get_post_meta( $cabina->ID, META_PREFIX . 'dispo_ID', true);
    ?>
    <div id="<?= $cabina->ID ?>" class="cabin-box" data-dispocode="<?= $cabina_dispo_code ?>">
        <div class="cabin-box-thumbnail-placeholder">
            <img class="img-responsive" src="<?= get_the_post_thumbnail_url($cabina->ID) ?>" >
        </div>
        <div class="inside-box">
            <div class="pull-right text-right price-box">
                <p class="cabin-price">$ <span class="price">2346</span></p>
                <p><?= _e('per adult', 'gogalapagos') ?></p>
            </div>
            <h2 class="cabin-name" data-cabinid="<?= $cabina->ID ?>"><?= $cabina->post_title ?></h2>
            <?php
        $caracteristicas = get_post_meta($cabina->ID, META_PREFIX . 'cabin_featurelist', false);                
        if ( count($caracteristicas[0]) > 0){
            echo '<ul id="featured-'. $cabina->ID .'" style="display: none;">';
            foreach($caracteristicas[0] as $catacteristica){
                echo '<li>' . $catacteristica . '</li>';
            }
            echo '</ul>';
        }
            ?>
            <h3 class="text-center"><?= _e('Accommodations for this cabin', 'gogalapagos') ?></h3>
            <select class="form-control accommodation-items" name="accommodation-for-<?= $cabina->ID ?>">
                <option value="0" data-peopleincabin="0"><?= _e('Select Accommodation') ?></option>
                <option value="1" data-peopleincabin="1">1 ADULT</option>
                <option value="1" data-peopleincabin="2">2 ADULTS</option>
                <option value="2" data-peopleincabin="2">1 ADULT &amp; 1 CHILD</option>
                <option value="3" data-peopleincabin="3">2 ADULTS &amp; 1 CHILD</option>
                <option value="4" data-peopleincabin="3">3 ADULTS</option>
                <option value="5" data-peopleincabin="4">3 ADULTS &amp; 1 CHILD</option>
            </select>
            <div class="row info-accommodation" style="display: none;">
                <div class="col-xs-12">
                    <p class="text-info"><?= _e('Please choose the accommodation to add this cabin. Thank you.', 'gogalapagos') ?></p>
                </div>
            </div>
            <button class="btn btn-default submit-button add-cabin-btn" type="button" data-dispocode="<?= $cabina_dispo_code ?>" data-addcabin="<?= $cabina->ID ?>"><?= _e('Add Cabin') ?></button>
        </div>
    </div>
    <?php } ?>
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
                <button id="add-another-cabin-btn" type="button" class="btn btn-default pull-left" data-dismiss="modal"><?= _e('Add another cabin', 'gogalapagos') ?></button>
                <button id="submit-accommodation" type="button" class="btn btn-warning pull-right"><?= _e('Book now', 'gogalapagos') ?></button>
            </div>
        </div>
    </div>
</div>