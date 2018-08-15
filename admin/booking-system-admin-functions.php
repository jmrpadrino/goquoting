<?php

global $post;

add_action( 'admin_init' , 'inicializa_columnas' );
function inicializa_columnas(){
    add_filter('manage_posts_columns', 'pedidos_columnas');
}
add_action('manage_posts_custom_column', 'pedidos_columnas_contenido', 10, 2);

function pedidos_columnas( $defaults )
{
    if ( $_GET['post_type'] == 'gquote' ){
        $defaults['title'] = 'Quote ID';
        $defaults['quoting_status'] = __('Status', 'gogalapagos');
        $defaults['quoting_total'] = __('Total', 'gogalapagos');        

        unset($defaults['language']);
        unset($defaults['ratings']);
    }
    return $defaults;
}

function pedidos_columnas_contenido($column_name, $post_ID){
    if ($column_name == 'quoting_status') {
        echo ($cabin_eligos_id = get_post_meta( $post_ID, 'quote_status', TRUE )) == 0 ? '<p class="bg-info text-center">FOLLOW</p>' : '<p class="bg-primary text-center">CONFIRMED</p>';        
    }
}

function gquote_get_bootstrap(){
    global $post_type;
    if( 'gquote' == $post_type ){
        wp_enqueue_style( 'gquote-bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    }
}
add_action( 'admin_head', 'gquote_get_bootstrap' );

function gquote_register_meta_boxes_callback($post){
    $prefix = 'gg_';
    $cabinas = get_post_meta($post->ID, 'quote_cabins', false); 
    $cabinas = array_shift($cabinas);
    $extrasArray = get_post_meta($post->ID, 'quote_extras', false); 
    $extrasArray = array_shift($extrasArray);
    $travelers = get_post_meta($post->ID, 'quote_traveler', false); 
    $travelers = array_shift($travelers);
?>
<div class="row">
    <div class="col-xs-12">
        <h3 style="color: #2980b9; font-size: 28px; margin: 0; margin-bottom: 18px;"><?= _e('Quote Details', 'gogalapagos') ?> #<?= get_post_meta($post->ID, 'quote_ID', true) ?></h3>
        <button class="btn btn-default pull-right" id="print-quote" type="button"><i class="glyphicon glyphicon-print"></i></button>
        <button class="btn btn-default pull-right" id="send-quote" type="button"><i class="glyphicon glyphicon-envelope"></i></button>
    </div>
</div>
<div class="row">
    <div class="col-xs-4">
        <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('General', 'gogalapagos')?></h3>
        <h4><?= _e('Quote Creation date', 'gogalapagos')?></h4>
        <p><?= $post->post_date ?></p>
        <h4><?= _e('Quote status', 'gogalapagos')?></h4>
        <select id="quote_status" name="quote_status">
            <?php 
        $status = get_post_meta($post->ID, 'quote_status', true);
            ?>
            <option value="0" <?= ($status == 0) ? 'selected' : '' ?>>Follow</option>
            <option value="1" <?= ($status == 1) ? 'selected' : '' ?>>Confirmed</option>
        </select>
    </div>
    <div class="col-xs-4">
        <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Quote', 'gogalapagos')?></h3>
        <ul>
            <li><strong><?= _e('Ship', 'gogalapagos') ?></strong><br /><?= get_post_meta($post->ID, 'quote_ship', true) ?></li>
            <li><strong><?= _e('Departure', 'gogalapagos') ?></strong><br /><?= get_post_meta($post->ID, 'quote_departure', true) ?></li>
            <li><strong><?= _e('Applied Promo', 'gogalapagos') ?></strong><br /><?= get_the_title(get_post_meta($post->ID, 'quote_promo', true)) ?></li>
            <li><strong><?= _e('Duration', 'gogalapagos') ?></strong><br /><?= get_post_meta($post->ID, 'quote_duration', true) ?></li>
            <li><strong><?= _e('Adults', 'gogalapagos') ?></strong> <?= get_post_meta($post->ID, 'quote_adults', true) ?> - <strong> <?= _e('Children', 'gogalapagos') ?></strong><?= get_post_meta($post->ID, 'quote_children', true) ?></li>
        </ul>
    </div>
    <div class="col-xs-4">
        <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Contact & Billing', 'gogalapagos')?></h3>
        <?php $travelers = get_post_meta($post->ID, 'quote_traveler', false) ?>
        <ul>
            <li><strong><?= _e('Name', 'gogalapagos') ?></strong><br /><?= $travelers[0][1]['title'] ?> <?= $travelers[0][1]['fname'] ?> <?= $travelers[0][1]['lname'] ?></li>
            <li><strong><?= _e('Email', 'gogalapagos') ?></strong><br /><a href="mailto:<?= $travelers[0][1]['email'] ?>"><?= $travelers[0][1]['email'] ?></a></li>
            <li><strong><?= _e('Phone', 'gogalapagos') ?></strong><br /><a href="tel:<?= $travelers[0][1]['phone'] ?>"><?= $travelers[0][1]['phone'] ?></a></li>
            <li><hr /></li>
            <li><?= get_post_meta($post->ID, 'quote_billing_address', true) ?>, <?= get_post_meta($post->ID, 'quote_billing_city', true) ?>, <?= get_post_meta($post->ID, 'quote_billing_state', true) ?>.</li>
            <li><?= get_post_meta($post->ID, 'quote_billing_country', true) ?> - <?= get_post_meta($post->ID, 'quote_billing_zipcode', true) ?>.</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <hr />
        <div class="row">
            <div class="col-xs-6">
                <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Cabins list', 'gogalapagos')?></h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?= _e('Cabin Name', 'gogalapagos')?></th>
                                <th><?= _e('Cabin Code', 'gogalapagos')?></th>
                                <th><?= _e('Accommodation', 'gogalapagos')?></th>
                                <th><?= _e('People inside', 'gogalapagos')?></th>
                                <th align="right" style="text-align: right;"><?= _e('Total Estimated', 'gogalapagos')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($cabinas as $cabina){
                                    $precioTotal += $cabina['precioCabina'];
                                    echo '<tr>';
                                    echo '<td>' . $cabina['nombreCabina'] . '</td>';
                                    echo '<td>' . $cabina['codigoCabina'] . '</td>';
                                    echo '<td>' . $cabina['acomodacionTexto'] . '</td>';
                                    echo '<td>' . $cabina['personasEnCabina'] . '</td>';
                                    echo '<td align="right">' . $cabina['precioCabina'] . '</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xs-6">
                <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Travelers Extras', 'gogalapagos')?></h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?= _e('Extra', 'gogalapagos')?></th>
                                <th><?= _e('Amount', 'gogalapagos')?></th>
                                <th><?= _e('Subtotal', 'gogalapagos')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $items = 0;
                                $extrassubtotal = 0;
                                foreach($extrasArray as $extras){
                                    foreach($extras as $extra => $cantidad){
                                        if($cantidad > 0){
                                            $onboardservice = goGetPostBySlug($extra);
                                            $onboard_price = get_post_meta($onboardservice[$items]->ID, $prefix . 'onboard_service_price', true);
                                            echo '<tr>';
                                            echo '<td>' . esc_html($onboardservice[$items]->post_title) . '</td>';
                                            echo '<td>' . $cantidad . '</td>';
                                            echo '<td>' . $onboard_price * $cantidad . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    $items++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <hr />
                <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Travelers Information', 'gogalapagos')?></h3>
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">...</div>
                        <div role="tabpanel" class="tab-pane" id="profile">...</div>
                        <div role="tabpanel" class="tab-pane" id="messages">...</div>
                        <div role="tabpanel" class="tab-pane" id="settings">...</div>
                    </div>
                </div>
                <?php
                    echo '<pre>';
                    var_dump($travelers[0]);
                    echo '</pre>';
                ?>
            </div>
        </div>
    </div>
</div>
<?php    
}
function gquote_register_meta_boxes() {
    add_meta_box( 'goquitong-quote-data', __( 'Quote Info', 'textdomain' ), 'gquote_register_meta_boxes_callback', 'gquote' );
}
add_action( 'add_meta_boxes', 'gquote_register_meta_boxes' );


function goGetPostBySlug($slug){
    $args = array(
      'name'        => $slug,
      'post_type'   => 'ggonboardservices',
      'post_status' => 'publish',
      'numberposts' => 1
    );
    $my_onboardservice = get_posts($args);
    return $my_onboardservice;
}
?>