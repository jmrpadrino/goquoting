<?php   
    include 'booking-functions.php';
    $prefix = 'gg_';
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
?>
<style>
    <?php echo file_get_contents( RUTA_PLUGIN_BOOKING . 'app/css/booking-system-common-styles.css', true ); ?>
    /* EXTRAS VIEW */
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
                <h1 class="cart-title">5. <?= _e('Confirmation &amp; Payment', 'gogalapagos') ?></h1>
                <p class="cart-subtitle"><?= _e('Enter your Payment details') ?></p>
            </div>
        </div>            
    </div>
</div>