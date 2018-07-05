<?php

function mostrarArreglo($arreglo){
    echo '<pre>';
    print_r($arreglo);
    echo '</pre>';
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
?>