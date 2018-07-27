<?php   
    include 'booking-functions.php';
    $prefix = 'gg_';
//    echo '<pre>';
//    var_dump($_POST);
//    echo '</pre>';
?>
<style>
    <?php echo file_get_contents( RUTA_PLUGIN_BOOKING . 'app/css/booking-system-common-styles.css', true ); ?>
    /* EXTRAS VIEW */
    .cart-footer-placeholder{
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: white;
        color: black;
        text-align: left;
        padding: 10px 0;
    }
    .checkout-title{
        color: #191919;
    }
    .summary-cruise-list{
        margin-bottom: 36px;
    }
    .offer-price{
        color: green;
    }
    .offer-price small{
        color: dimgray;
    }
    .submit-payment{
        display: block;
        margin: 0 auto;
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
<form id="extrax-form" role="form" method="post" action="<?= home_url('checkout') ?>/">
    <input type="hidden" name="ship" value="<?= $_POST['ship'] ?>">
    <input type="hidden" name="departure" value="<?= $_POST['departure'] ?>">
    <input type="hidden" name="promo" value="<?= $_POST['promo'] ?>">
    <input type="hidden" name="duration" value="<?= $_POST['duration'] ?>">
    <input type="hidden" name="adults" value="<?= $_POST['adults'] ?>">
    <input type="hidden" name="children" value="<?= $_POST['children'] ?>">
    <?php 
    foreach($_POST['cabins-selected'] as $key => $cabina){
        echo '<input type="hidden" name="cabins-selected['.$key.'][idCabina]" value="'.$cabina['idCabina'].'">';
        echo '<input type="hidden" name="cabins-selected['.$key.'][codigoCabina]" value="'.$cabina['codigoCabina'].'">';
        echo '<input type="hidden" name="cabins-selected['.$key.'][nombreCabina]" value="'.$cabina['nombreCabina'].'">';
        echo '<input type="hidden" name="cabins-selected['.$key.'][acomodacionTexto]" value="'.$cabina['acomodacionTexto'].'">';
        echo '<input type="hidden" name="cabins-selected['.$key.'][personasEnCabina]" value="'.$cabina['personasEnCabina'].'">';
        echo '<input type="hidden" name="cabins-selected['.$key.'][precioCabina]" value="'.$cabina['precioCabina'].'">';
    } 
    ?>
    <?php 
    foreach($_POST['traveler'] as $key => $pax){
        foreach($pax as $index => $value){
            echo '<input type="hidden" name="traveler['.$key.']['.$index.']" value="'.$value.'">';
        }
    } 
    ?>
    <div class="cart-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="cart-title">5. <?= _e('Confirmation &amp; Payment', 'gogalapagos') ?></h1>
                    <p class="cart-subtitle"><?= _e('Enter your Payment details') ?></p>
                </div>
            </div>           
        </div>
    </div>
    <div class="car-body">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="checkout-title text-center"><?= _e('Summary', 'gogalapagos')?></h2>
                    <ul class="summary-cruise-list">
                        <li><strong><?= _e('Date', 'gogalapagos') ?></strong> <?= $_POST['departure'] ?></li>
                        <li><strong><?= _e('Ship', 'gogalapagos') ?></strong> <?= obtenerDatoBarcoPorCodigoDispo($_POST['ship'], 'post_title') ?></li>
                        <li><strong><?= _e('Itinerary', 'gogalapagos') ?></strong> </li>
                        <li><strong><?= _e('Duration', 'gogalapagos') ?></strong> <?= $_POST['duration'] . ' - ' . $_POST['duration'] - 1 ?></li>
                    </ul>
                    <div id="sumary-content">
                        <div class="panel-group" id="cabins-selected-accordion" role="tablist" aria-multiselectable="true">
                            <!-- LISTADO CABINAS -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#cabins" href="#cabins" aria-expanded="true" aria-controls="collapseOne"><?= _e('Selected cabins','gogalapagos') ?></a>
                                        <span class="fas fa-chevron-down pull-right"></span>
                                    </h4>
                                </div>
                                <div id="cabins" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <ol class="sumary-cabins-list">
                                        <?php 
                                        foreach($_POST['cabins-selected'] as $key => $value){
                                            echo '<li>';
                                            echo '<h2 class="sumary-cabin-title">' . $value['nombreCabina'] . '</h2>';
                                            echo '<small class="sumary-cabin-features">' . $value['acomodacionTexto'] . '</small>';
                                            echo '<div class="pull-right cabin-price">$ ' . $value['precioCabina'] . '</div>';
                                            echo '</li>';

                                            $precio = strval($value['precioCabina']);

                                            $subtotal_cabinas += (int)$precio;
                                        }
                                        ?>  
                                        </ol>

                                    </div>
                                </div>
                            </div>
                            <!-- LISTADO SPECIAL DEALS -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#deals" href="#deals" aria-expanded="true" aria-controls="collapseOne"><?= _e('Special deals','gogalapagos') ?></a>
                                        <span class="fas fa-chevron-down pull-right"></span>
                                    </h4>
                                </div>
                                <div id="deals" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <?php
                                            $special = get_post($_POST['promo']);
                                            $special_price = 750;
                                            echo '<h2 class="sumary-cabin-title">' . esc_html( $special->post_title ) . '</h2>';
                                            echo '<div class="pull-right cabin-price offer-price"><small>Save</small> $ ' . $special_price . '</div>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="checkout-title text-center"><?= _e('Billing Information', 'gogalapagos') ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="checkout-title text-center"><?= _e('Credit Card Information', 'gogalapagos') ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-footer-placeholder">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <button id="submit-payment" type="button" class="btn btn-warning"><?= _e('Pay now', 'gogalapagos') ?></button> <span><?= _e('or','gogalapagos') ?></span> <a href="#request-a-quote"><?= _e('Request a Quote') ?></a>
                    </div>
                </div>
            </div>
    </div>
</form>