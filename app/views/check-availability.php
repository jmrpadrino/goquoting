<div class="container">
    <div class="row top-filters">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <strong>March - April 2018</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                   <div class="row">
                       <div class="col-xs-6 text-right">
                           <input type="number" name="adults" min="0" max="9" value="2">
                           <p><?= _e('Adults', 'gogalapagos') ?></p>
                       </div>
                       <div class="col-xs-6 text-left">
                           <input type="number" name="children" min="0" max="9" value="0">
                           <p><?= _e('Children', 'gogalapagos') ?></p>
                       </div>
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-right">
                    <button id="more-filters"><i class="fa fa-sliders"></i></button>
                    <button type="button"><?= _e('Search', 'gogalapagos') ?></button> 
                </div>
            </div>
        </div>
    </div>
    <div class="cart-header">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="cart-title">1. <?= _e('Ships', 'gogalapagos') ?></h1>
                <p class="cart-subtitle"><?= _e('Choose your ship and departure') ?></p>
            </div>
        </div>
    </div>
    
    <div class="ships-container">
        <div class="ship-container">
            <div class="ship-thumbnail">
                <img src="http://placehold.it/768x768" class="img-responsive" alt="Nombre del Barco">
            </div>
        </div>
    </div>
</div>