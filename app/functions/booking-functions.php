<?php
global $wpdb;


// USO DE COOKIES
// CREAR COOKIE
function crearCookie(){
    if(!isset($_COOKIE['goquoting_cookie'])){
        $cookie = md5(strtotime(date('Ymd h:i:s')));
        setcookie('goquoting_cookie', $cookie, time() + (365 * 24 * 60 * 60), COOKIEPATH, COOKIE_DOMAIN) ; // 1 año
    }else{
        $cookie = $_COOKIE['goquoting_cookie'];
    }
    return $cookie;
}
// ELIMINAR COOKIE
function eliminarCookie(){
    unset($_COOKIE['goquoting_cookie']);
    setcookie('goquoting_cookie', '', time() - ( 15 * 60 ) , COOKIEPATH, COOKIE_DOMAIN);
};
// VERIFICAR VALIDEZ DE LA COOKIE
function empezarProceso(){
    wp_redirect( home_url('check-availability'), 302 );
    exit;
}
/******************/

// USO DE PEDIDOS
// CREAR PEDIDO
function realizarPedido($pedidoTemporal){    
    
    $pedido = crearPedidoEnWordpress($pedidoTemporal);    
    
}
function crearPedidoEnWordpress($pedidoTemporal){
    
    // validar si existe el post en wordpress
    $args = array(
        'post_type' => 'gquote',
        'meta_key' => 'quote_ID',
        'meta_value' => $pedidoTemporal['quote']
    );
    $pedido = new WP_Query( $args );
    
    
    if($pedido->post_count > 0){
        return true;
    }else{
    
        $pedido = array(
            'post_title' => '@'. date('Y-m-d h:i:s') . ' QN' . $pedidoTemporal['quote'] . ' ' . $pedidoTemporal['ship'] . ' ADT' . $pedidoTemporal['adults'] .' CHD' . $pedidoTemporal['children'],
            'post_status' => 'publish',
            'post_type' => 'gquote',
            'meta_input' => array(
                $prefix . 'quote_ID' => $pedidoTemporal['quote'],
                $prefix . 'quote_status' => '0',
                $prefix . 'quote_ship' => $pedidoTemporal['ship'],
                $prefix . 'quote_departure' => $pedidoTemporal['departure'],
                $prefix . 'quote_promo' => $pedidoTemporal['promo'],
                $prefix . 'quote_duration' => $pedidoTemporal['duration'],
                $prefix . 'quote_adults' => $pedidoTemporal['adults'],
                $prefix . 'quote_children' => $pedidoTemporal['children'],
                $prefix . 'quote_cabins' => $pedidoTemporal['cabins-selected'],
                $prefix . 'quote_traveler' => $pedidoTemporal['traveler'],
                $prefix . 'quote_extras' => $pedidoTemporal['services'],
                $prefix . 'quote_billing_country' => $pedidoTemporal['billing-country'],
                $prefix . 'quote_billing_address' => $pedidoTemporal['billing-address'],
                $prefix . 'quote_billing_city' => $pedidoTemporal['billing-city'],
                $prefix . 'quote_billing_state' => $pedidoTemporal['billing-state'],
                $prefix . 'quote_billing_zipcode' => $pedidoTemporal['billing-zipcode'],
            )
        );
        wp_insert_post( $pedido );
        return $pedido;
    }
}


// RECUPERAR BARCO 
function obtenerObjetoBarcoPorCodigoDispo($dispocode){
$prefix = 'gg_'; 
    $args = array(
        'post_type'         => 'ggships',
        'meta_query'        => array(
            'relation' => 'AND',
            array(
                'key' => META_PREFIX . 'dispo_ID',
                'value' => $dispocode,
                'compare' => '='
            )
        )
    );
    $barco = get_posts($args);
    return $barco;
}
function obtenerDatoBarcoPorCodigoDispo($dispocode, $index){
    $barco = obtenerObjetoBarcoPorCodigoDispo($dispocode);
    $info = $barco[0]->$index;
    return $info;
}
// RECUPERAR LAS CABINAS DEL BARCO 
function obtenerCabinasPorBarco($id_barco){
    $args = array(
    'post_type' => 'ggcabins',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key'     => META_PREFIX . 'cabin_ship_id',
            'value'   => $id_barco,
            'compare' => 'LIKE',
        ),
    ));
    $cabinas = get_posts($args);
    
    return $cabinas;
}
// RECUPERAR PROMO DE WORDPRESS
function obtenerPromo($id_promo){    
    $promo = get_post($id_promo);
    return $promo;
}

// UTILIDADES
function mostrarArreglo($arreglo){
    echo '<pre>';
    print_r($arreglo);
    echo '</pre>';
}
?>