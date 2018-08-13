<?php
/*
 * Este archivo contiene los codigo para generar los metaboxes para cada CPT
 */
global $post;

function gquote_get_bootstrap(){
    global $post_type;
    if( 'gquote' == $post_type ){
        wp_enqueue_style( 'gquote-bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    }
}
add_action( 'admin_head', 'gquote_get_bootstrap' );

function gquote_register_meta_boxes_callback($post){
    $cabinas = get_post_meta($post->ID, 'quote_cabins', false); 
    $cabinas = array_shift($cabinas);
?>
<div class="row">
    <div class="col-xs-12">
        <h3 style="color: #2980b9; font-size: 28px; margin: 0; margin-bottom: 18px;"><?= _e('Quote Details', 'gogalapagos') ?> #<?= get_post_meta($post->ID, 'quote_ID', true) ?></h3>
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
            <div class="col-xs-12">
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
        </div>
        <div class="row">
            <div class="col-xs-12">
                <strong style="font-size: 24px; text-align: right; display: block;"><?= _e('Cabins Total', 'gogalapagos') ?>: $<?= $precioTotal ?></strong>
                <hr />
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

function dataStructureConfiguration(){
    
    global $wpdb;
    
    $collate = '';
    if ( $wpdb->has_cap( 'collation' ) ) {
        $collate = $wpdb->get_charset_collate();
    }
    
    $tablepedido = $wpdb->prefix . 'goquoting_pedido';
    $tablepedido_detalle_cabina = $wpdb->prefix . 'goquoting_detalle_cabina';
    $tablepedido_detalle_pasajero = $wpdb->prefix . 'goquoting_detalle_pasajero';
    $tablepedido_detalle_extras = $wpdb->prefix . 'goquoting_detalle_extras';
    
    if ( $wpdb->get_var("SHOW TABLES LIKE '" . $tablepedido . "'") != $tablepedido ){
        // TABLA CABECERA PEDIDO
        $sql_ppal = 'CREATE TABLE `' . $tablepedido . '` (
        `id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
        `cookie_sesion` VARCHAR(255),
        `fecha` DATETIME,
        `barco` VARCHAR(7),
        `f_salida` VARCHAR(10),
        `adultos` INT(4),
        `ninios` INT(4),        
        `duracion` INTEGER(1),
        `promo` INT(4),
        PRIMARY KEY (id)
        ) '.$collate.'; ';
        // TABLA DETALLE CABINA
        $sql_ppal .= 'CREATE TABLE `' . $tablepedido_detalle_cabina . '` (
        `id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
        `id_pedido` BIGINT(20),
        `cabina` VARCHAR(10),
        `acomodacion` VARCHAR(80),
        `tarifa` BIGINT(20),
        PRIMARY KEY (id)
        ) '.$collate.'; ';
        // TABLA DETALLE PASAJEROS
        $sql_ppal .= 'CREATE TABLE `' . $tablepedido_detalle_pasajero . '` (
        `id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
        `id_pedido` BIGINT(20),
        `principal` BOOLEAN,
        `facturar` BOOLEAN,
        `titulo` VARCHAR(10),
        `nombre` VARCHAR(250),
        `apellido` VARCHAR(250),
        `genero` VARCHAR(20),
        `telefono` VARCHAR(25),
        `email` VARCHAR(250),
        `dia` INT(4),
        `mes` INT(4),
        `anio` INT(4),
        `pais` VARCHAR(2),
        `provincia` INT(255),
        `calle` text,
        `ciudad` text,
        `codigo_postal` text,
        `dieta` INT(4),
        `cond_medica` INT(4),
        PRIMARY KEY (id)
        ) '.$collate.'; ';
        // TABLA DETALLE EXTRAS
        $sql_ppal .= 'CREATE TABLE `' . $tablepedido_detalle_extras . '` (
        `id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
        `id_pedido` BIGINT(20),        
        `id_pasajero` BIGINT(20),        
        `id_servicio` BIGINT(20),
        `cantidad` INT(4),
        PRIMARY KEY (id)
        ) '.$collate.'; ';
        
        //var_dump($sql_ppal);
        
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        
        dbDelta($sql_ppal);
            
    }
}
add_action('plugins_loaded', 'dataStructureConfiguration');
// Register Custom Post Type
function goquoting_pedidos() {

	$labels = array(
		'name'                  => _x( 'Quotes', 'Post Type General Name', 'gogalapagos' ),
		'singular_name'         => _x( 'Quote', 'Post Type Singular Name', 'gogalapagos' ),
		'menu_name'             => __( 'Quotes', 'gogalapagos' ),
		'name_admin_bar'        => __( 'Quote', 'gogalapagos' ),
		'archives'              => __( 'Item Archives', 'gogalapagos' ),
		'attributes'            => __( 'Item Attributes', 'gogalapagos' ),
		'parent_item_colon'     => __( 'Parent Item:', 'gogalapagos' ),
		'all_items'             => __( 'All Items', 'gogalapagos' ),
		'add_new_item'          => __( 'Add New Item', 'gogalapagos' ),
		'add_new'               => __( 'Add New', 'gogalapagos' ),
		'new_item'              => __( 'New Item', 'gogalapagos' ),
		'edit_item'             => __( 'Edit Item', 'gogalapagos' ),
		'update_item'           => __( 'Update Item', 'gogalapagos' ),
		'view_item'             => __( 'View Item', 'gogalapagos' ),
		'view_items'            => __( 'View Items', 'gogalapagos' ),
		'search_items'          => __( 'Search Item', 'gogalapagos' ),
		'not_found'             => __( 'Not found', 'gogalapagos' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'gogalapagos' ),
		'featured_image'        => __( 'Featured Image', 'gogalapagos' ),
		'set_featured_image'    => __( 'Set featured image', 'gogalapagos' ),
		'remove_featured_image' => __( 'Remove featured image', 'gogalapagos' ),
		'use_featured_image'    => __( 'Use as featured image', 'gogalapagos' ),
		'insert_into_item'      => __( 'Insert into item', 'gogalapagos' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'gogalapagos' ),
		'items_list'            => __( 'Items list', 'gogalapagos' ),
		'items_list_navigation' => __( 'Items list navigation', 'gogalapagos' ),
		'filter_items_list'     => __( 'Filter items list', 'gogalapagos' ),
	);
	$args = array(
		'label'                 => __( 'Quote', 'gogalapagos' ),
		'description'           => __( 'Web Quotes', 'gogalapagos' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true, // cambiar a false
		'show_ui'               => true, // cambiar a false
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-cart',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'query_var'             => 'web-sales',
		'rewrite'               => false,
		'capability_type'       => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow',
            'delete_post' => 'do_not_allow',
            'read_post' => 'do_not_allow',
            'edit_post' => 'do_not_allow',
        ),
        'map_meta_cap' => true,
		'show_in_rest'          => true,
		'rest_base'             => 'web-sales',
		'rest_controller_class' => 'WP_REST_web_sales_Controller',
	);
	register_post_type( 'gquote', $args );

}
add_action( 'init', 'goquoting_pedidos', 0 );
?>