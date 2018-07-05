<?php 
    include 'booking-functions.php';
    $total_pax = $_POST['adults'] +  $_POST['children'];
    /*
    * META_PREFIX
    */

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
<form id="accommodation-form" role="form" method="get" action="<?= home_url('traveler-details') ?>/">
    <input type="hidden" name="ship" value="<?= $_POST['ship'] ?>">
    <input type="hidden" name="departure" value="<?= $_POST['departure'] ?>">
    <input type="hidden" name="promo" value="<?= $_POST['promo'] ?>">
    <input type="hidden" name="duration" value="<?= $_POST['duration'] ?>">
    <input type="hidden" name="adults" value="<?= $_POST['adults'] ?>">
    <input type="hidden" name="children" value="<?= $_POST['children'] ?>">
    <input type="hidden" name="cabins" value="{}">

    <?php 
        $cabinas = obtenerCabinasPorBarco( obtenerDatoBarcoPorCodigoDispo($_POST['ship'], 'ID') );
        
    ?>
    <div class="inside-box little-box">
        <?php
            $pending = _x('Pending Assignment', 'gogalapagos');
            $gest_word = _x('guests', 'gogalapagos');
            echo '<div>' . $pending . ' <strong>' . $total_pax . '</strong> ' .$gest_word . '</div>';
        ?>
        <div><i class="fas fa-shopping-cart"></i></div>
    </div>
    <div class="inside-box little-box">
        <div><i class="fas fa-plus"></i></div>
        <div><?= _e('Show all cabin categories') ?></div>
        <div><i class="fas fa-check-square"></i></div>
    </div>
    <div id="cabins-list-placeholder" class="inside-box little-box" style="/*display: none;*/">
        <ul id="cabins-list" class="cabins-list">
            <?php
                foreach ($cabinas as $cabina){
                    echo '<li class="cabin-list-item">';
                    echo '<div class="cabins-list-title '. $cabina->post_name .'" >' . $cabina->post_title . '</div>';
                    echo '<div><i class="fas fa-check-square"></i></div>';
                    echo '</li>';
                }
            ?>
        </ul>
    </div>
    <?php foreach ($cabinas as $cabina){ ?>
    <div class="cabin-box">
        <div class="cabin-box-thumbnail-placeholder">
            <img class="img-responsive" src="<?= get_the_post_thumbnail_url($cabina->ID) ?>" >
        </div>
        <div class="inside-box">
            <div class="pull-right text-right price-box">
                <p>$ 2.346</p>
                <p><?= _e('per adult', 'gogalapagos') ?></p>
            </div>
            <h2><?= $cabina->post_title ?></h2>
            <?php
                $caracteristicas = get_post_meta($cabina->ID, META_PREFIX . 'cabin_featurelist', false);                
                if ( count($caracteristicas[0]) > 0){
                    echo '<ul>';
                    foreach($caracteristicas[0] as $catacteristica){
                        echo '<li>' . $catacteristica . '</li>';
                    }
                    echo '</ul>';
                }
            ?>
            <h3 class="text-center"><?= _e('Accommodations for this cabin', 'gogalapagos') ?></h3>
            <select class="form-control" name="accommodation-for-<?= $cabina->ID ?>">
                <option><?= _e('Select Accommodation') ?></option>
                <option value="1">2 ADULTS</option>
                <option value="2">1 ADULT, 1 CHILD</option>
                <option value="3">2 ADULTS, 1 CHILD</option>
                <option value="4">3 ADULTS</option>
                <option value="5">3 ADULTS, 1 CHILD</option>
            </select>
            <button class="btn btn-default add-cabin-btn" type="button"><?= _e('Add Cabin') ?></button>
        </div>
    </div>
    <?php } ?>
</form>