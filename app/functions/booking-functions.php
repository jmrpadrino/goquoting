<?php
global $wpdb;
$prefix = 'gg_';

// USO DE COOKIES
// CREAR COOKIE
function crearCookie(){
    if(!isset($_COOKIE['goquoting_cookie'])){
        $cookie = md5(strtotime(date('Ymd h:i:s')));
        setcookie('goquoting_cookie', $cookie, time() + (365 * 24 * 60 * 60), COOKIEPATH, COOKIE_DOMAIN, is_ssl() ) ; // 1 año
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
function realizarPedido($id){
    
    return $id;
    die();
    
    $pedido = crearPedidoEnWordpress($id);
    
    if ( $pedido ){
        echo '<pre>';
        print_r( $pedido );
        echo '</pre>';
        //eliminarRegistrTemporal($id);
    }
}
function crearPedidoEnWordpress($arrayPedido){
    
    // validar si existe el post en wordpress
    $pedido_wordpress = get_post($pedido);
    
    if($pedido_wordpress){
        return true;
    }else{
    
        $contenido_cabina = array(
            'post_content' => '',
            'post_title' => $element->nombre,
            'post_status' => 'publish',
            'post_type' => 'gquote',
            'meta_input' => array(
                $prefix . 'quote_status' => $element->id,
                $prefix . 'quote_ship' => $element->id,
                $prefix . 'quote_departure' => $element->anio_id,
                $prefix . 'quote_promo' => $element->anio,
                $prefix . 'quote_duration' => $element->codigo,
                $prefix . 'quote_adults' => $element->codigo,
                $prefix . 'quote_children' => $element->barco_id,
                $prefix . 'quote_cabins' => $element->color,
                $prefix . 'quote_traveler' => $element->color,
                $prefix . 'quote_billing_country' => $element->color,
                $prefix . 'quote_billing_address' => $element->color,
                $prefix . 'quote_billing_city' => $element->color,
                $prefix . 'quote_billing_state' => $element->color,
                $prefix . 'quote_billing_zipcode' => $element->color,
            )
        );
        return $contenido_cabina;
        //wp_insert_post( $contenido_cabina );
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