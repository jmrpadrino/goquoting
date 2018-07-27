<?php
function dataStructureConfiguration(){
    
    global $wpdb;
    
    $wpdb->show_errors();

    
    $tablepedido = $wpdb->prefix . 'goquoting_pedido';
    $tablepedido_detalle = $wpdb->prefix . 'goquoting_pedido_detalle';
    
    if ( $wpdb->get_var('SHOW TABLES LIKE ' . $tablepedido) != $tablepedido ){
        
        echo 'hola';
        
        $sql_ppal = 'CREATE TABLE `' . $tablepedido . '` (
        `id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
        `cookie_sesion` VARCHAR(255),
        `barco` VARCHAR(7),
        `f_salida` VARCHAR(10),
        `duracion` INTEGER(1),
        `promo` INT(4),
        PRIMARY KEY (id)
        );';
        $sql_ppal .= 'CREATE TABLE `' . $tablepedido_detalle . '`
        `id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
        `id_pedido` BIGINT(20),
        
        ';
        
        //require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        
        //echo dbDelta($sql_ppal);
            
    }
}
add_action('plugins_loaded', 'dataStructureConfiguration');
?>