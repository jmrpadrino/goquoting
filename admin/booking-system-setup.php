<?php
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
    
    if ( $wpdb->get_var('SHOW TABLES LIKE ' . $tablepedido) != $tablepedido ){
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
?>