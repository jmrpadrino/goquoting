<?php $prefix = 'gg_'; ?>
<style>
    /* Common styles */
    body,
    h1,h2,h3,h4,h5,h6{
        font-family: 'Didact Gothic',sans-serif;
        font-size: 14px;
    }
    .no-padding{
        padding: 0px;
    }
    .cart-header{
        background: #272727;
    }
    .cart-title,.cart-subtitle{
        -webkit-font-smoothing: antialiased;
        text-align: center;
    }
    .cart-title{
        color: white;
        font-size: 16px;
        text-transform: uppercase;
    }
    .cart-subtitle{
        color: darkorange;
    }
    .ship-inside-box{
        border-radius: 6px;
        box-shadow: 0px 11px 31px #f1f1f1;
        margin: 0 auto;
        margin-bottom: 12px;
        padding: 36px 20px;
        padding-top: 1px;
        display: block;
        background: white;
        width: 91%;
    }
    .ship-inside-box.ship-departure-dates{
        margin-top: -36px;
        position: relative;
    }
    .ships-container{
        padding-bottom: 80px;
    }
    .submit-button{
        display: block;
        margin: 36px auto;
        border: none;
        border-radius: 2px;
        background: darkorange;
        clear: both;
        text-align: left;
        color: white;
        line-height: 1;
        font-size: 12px;
        padding: 14px 17px;
    }
    .submit-button span{
        display: block;
        text-transform: uppercase;
    }
    .submit-button .next-step-title{
        font-size: 16px;
    }
    /*---------------*/

    /* CHECK AVAILABILITY VIEW */
    .cabins-available-list{
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .cabins-available-list .cabin-list-item{
        display: block;
        clear: both;
    }
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
    /* departures */
    .departure-placeholder{
        font-size: 12px;
        display: block;
        width: 100%;
        text-align: center;
        overflow: hidden;
        position: relative;
    }
    .departure-placeholder.selected{
        background: darkorange;
    }
    .departure-placeholder-promo{
        position: absolute;
        bottom: -3px;
        right: 5px;
        font-size: 8px;
        margin-bottom: 5px;
    }
    .departure-placeholder.selected .departure-placeholder-month{
        background: #272727;
    }
    .ship-departure-dates-list{
        display: flex;
        width: 100%;
        overflow: scroll;
    }
    .ship-departure-dates-list.shown{
        display: block;
    }
    .departure-placeholder-date{
        font-size: 18px;
    }
    /* duration */
    .duration-list{
        display: flex;
        justify-content: space-between;
    }
    .duration-list li:last-child .duration-placeholder .duration-placeholder-date{
        background: dimgray;
        font-size: 14px;
    }
    .duration-placeholder-date{
        font-size: 24px;
        line-height: 24px;
        background: #1f1f1f;
        margin: 0px;
    }
    .duration-placeholder.open .duration-placeholder-date{
        background: #1f1f1f;
        background: darkorange;
        box-shadow: 0px 2px 8px rgba(105, 105, 105, 0.3);
    }
    .days-word{
        font-size: 12px;
        line-height: 1;
    }
    .durarion-placeholder-info-box{
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
    .duration-placeholder.open .durarion-placeholder-info-box{
        display: flex;
    }
    /*---------------*/
</style>
<div class="container no-padding">
    <?php
        $args = array(
            'post_type' => 'ggships',
            'posts_per_page' => 2,
            'orger_by' => 'post_date',
            'order' => 'DESC'
        );
        $barcos = get_posts($args);
//        echo '<pre>';
//        var_dump($barcos);
//        echo '</pre>';
    ?>
    <form method="get" action="<?= home_url('accommodation') ?>">
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
                        <button id="more-filters"><i class="fas fa-sliders-h"></i></button>
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
            <input id="input-ship" type="hidden" name="ship" value="BAR003">
            <input id="input-departure" type="hidden" name="departure" value="<?= date('Y-m-d')?>">
            <input id="input-promo" type="hidden" name="promo" value="CUP001">
            <input id="input-duration" type="hidden" name="duration" value="4">
            <?php foreach ($barcos as $barco){ ?>
            <?php 
                $args = array(
                    'post_type' => 'ggcabins',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key'     => $prefix . 'cabin_ship_id',
                            'value'   => $barco->ID,
                            'compare' => 'LIKE',
                        ),
                    ),
                );
                $cabinas = get_posts($args);
            ?>
            <div id="<?= get_post_meta($barco->ID, $prefix . 'dispo_ID', true)?>" class="ship-container">
                <div class="ship-thumbnail">
                    <img src="<?= get_post_meta($barco->ID, $prefix . 'ship_wiki_image', true) ?>" class="img-responsive" alt="<?= $barco->post_title ?>">
                </div>
                <div class="ship-inside-box ship-departure-dates">
                    <h2><?= $barco->post_title ?></h2>
                    <h3>Departure Dates</h3>
                    <p class="text-right"><span class="see-all-dates"><?= _e('See all Dates', 'gogalapagos') ?></span><span class="hide-all-dates text-right hidden"><?= _e('Hide Dates', 'gogalapagos') ?></span></p>
                    <ul class="list-inline ship-departure-dates-list">
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-06-05" data-promo="CUP001">
                                <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">5</div>
                                <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                            </div>
                        </li>
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-06-12" data-promo="CUP001">
                                <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">12</div>
                                <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                            </div>
                        </li>
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-06-18">
                                <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">18</div>
                            </div>
                        </li>
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-06-25">
                                <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">25</div>
                            </div>
                        </li>
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-06-30" data-promo="TKF001">
                                <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">30</div>
                                <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                            </div>
                        </li>
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-07-02" data-promo="CUP001">
                                <div class="departure-placeholder-month"><?= _e('Jul', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">2</div>
                                <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                            </div>
                        </li>
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-07-08">
                                <div class="departure-placeholder-month"><?= _e('Jul', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">8</div>
                            </div>
                        </li>
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-07-16" data-promo="TKF001">
                                <div class="departure-placeholder-month"><?= _e('Jul', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">16</div>
                                <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                            </div>
                        </li>
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-07-23">
                                <div class="departure-placeholder-month"><?= _e('Jul', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">23</div>
                            </div>
                        </li>
                        <li>
                            <div class="square-box departure-placeholder" data-departure="2018-07-30">
                                <div class="departure-placeholder-month"><?= _e('Apr', 'gogalapagos') ?></div>
                                <div class="departure-placeholder-date">30</div>
                            </div>
                        </li>
                    </ul>
                    <div id="promo-name" class="promo-name"></div>
                </div>
                <div class="ship-inside-box">
                    <h3><?= _e('Duration', 'gogalapagos')?></h3>
                    <ul class="list-inline duration-list">
                        <li>
                            <div class="duration-placeholder" data-duration="4">
                                <div class="square-box duration-placeholder-date">
                                    <span>4</span>
                                    <div class="days-word"><?= _e('Days', 'gogalapagos') ?></div>
                                </div>
                                <div class="durarion-placeholder-info-box">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="duration-placeholder" data-duration="8">
                                <div class="square-box duration-placeholder-date">
                                    <span>8</span>
                                    <div class="days-word"><?= _e('Days', 'gogalapagos') ?></div>
                                </div>
                                <div class="durarion-placeholder-info-box">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="duration-placeholder" data-duration="12">
                                <div class="square-box duration-placeholder-date">
                                    <span>12</span>
                                    <div class="days-word"><?= _e('Days', 'gogalapagos') ?></div>
                                </div>
                                <div class="durarion-placeholder-info-box">
                                    <i class="fa fa-info-circle"></i>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#more-days-info">
                                <div id="more-days-btn" class="duration-placeholder">
                                    <div class="square-box duration-placeholder-date">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="ship-inside-box">                
                    <p><?= _e('Cabins available on this date', 'gogalapagos') ?></p>
                    <ul class="cabins-available-list">
                        <?php foreach( $cabinas as $cabina ){ ?>
                        <li class="cabin-list-item"><h4 class="pull-left cabin-list-name"><?= $cabina->post_title ?></h4> <span class="pull-right cabin-list-price">$ 3250</span></li>
                        <?php } ?>
                        <?php /*
                        <li class="cabin-list-item"><h4 class="pull-left cabin-list-name">Legend Balcony Suite</h4> <span class="pull-right cabin-list-price">$ 3250</span></li> 
                        <li class="cabin-list-item"><h4 class="pull-left cabin-list-name">Balcony Suite</h4> <span class="pull-right cabin-list-price">$ 2798</span></li> 
                        <li class="cabin-list-item"><h4 class="pull-left cabin-list-name">Legend Balcony +</h4> <span class="pull-right cabin-list-price">$ 2848</span></li> 
                        <li class="cabin-list-item"><h4 class="pull-left cabin-list-name">Junior Suite</h4> <span class="pull-right cabin-list-price">$ 2346</span></li> 
                        <li class="cabin-list-item"><h4 class="pull-left cabin-list-name">Junior Suite +</h4> <span class="pull-right cabin-list-price">$ 2396</span></li> 
                        <li class="cabin-list-item"><h4 class="pull-left cabin-list-name">Standard Cabin</h4> <span class="pull-right cabin-list-price">$ 1662</span></li> 
                        <li class="cabin-list-item"><h4 class="pull-left cabin-list-name">Standard Plus Cabin</h4> <span class="pull-right cabin-list-price">$ 2058</span></li> 
                        */ ?>
                    </ul>
                </div>
            </div>
            <?php } // FIN bucle barcos ?>
            <button name="availability" value="true" class="text-center submit-button submit-button-cabin" type="submit">
                <span class="next-step"><?= _e('Next Step', 'gogalapagos') ?></span>
                <span class="next-step-title"><?= _e('Select Your Cabin', 'gogalapagos') ?></span>
            </button>
        </div>
    </form>
</div>
<!-- Modal -->
<div class="modal fade" id="more-days-info" tabindex="-1" role="dialog" aria-labelledby="moreDaysInfo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-chevron-left"></i></span></button>
                <h4 class="modal-title" id="myModalLabel"><?= _e('13 days or more', 'gogalapagos') ?></h4>
            </div>
            <div class="modal-body text-center">
                <?= _e('If you want to consult itineraries of 13 days or more, please fill out the following form and one of our agent will contact yoy.','gogalapagos') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary text-center"><?= _e('Go to the form', 'gogalapagos')?></button>
            </div>
        </div>
    </div>
</div>