<?php
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
        $cabin_eligos_id = get_post_meta( $post_ID, $prefix . 'cabin_eligos_id', TRUE );        
    }
}

?>