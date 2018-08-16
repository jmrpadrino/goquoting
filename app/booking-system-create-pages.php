<?php
// VALIDAR SI LA PAGINA DEL COTIZADOR ESTA CREADA SINO CREARLA
add_action( 'wp_loaded', 'gg_create_quote_pages', 10 );
function gg_create_quote_pages() {
    
    $quote_page = get_page_by_path('check-availability');
    if (!$quote_page){
        // Create post object
        $my_post = array(
            'post_title'    => 'GOQuoting - Check Availability',
            'post_name'     => 'check-availability',
            'post_content'  => '[goquoting-check-availability]',
            'post_status'   => 'publish',
            'post_author'   => get_current_user_id(),
            'post_type'     => 'page',
        );

        // Insert the post into the database
        wp_insert_post( $my_post, '' );
    }
    
    $quote_page = get_page_by_path('accommodation');
    if (!$quote_page){
        // Create post object
        $my_post = array(
            'post_title'    => 'GOQuoting - Accommodation',
            'post_name'     => 'accommodation',
            'post_content'  => '[goquoting-accommodation]',
            'post_status'   => 'publish',
            'post_author'   => get_current_user_id(),
            'post_type'     => 'page',
        );

        // Insert the post into the database
        wp_insert_post( $my_post, '' );
    }
    
    $quote_page = get_page_by_path('traveler-details');
    if (!$quote_page){
        // Create post object
        $my_post = array(
            'post_title'    => 'GOQuoting - Travelers Details',
            'post_name'     => 'traveler-details',
            'post_content'  => '[goquoting-travelers-details]',
            'post_status'   => 'publish',
            'post_author'   => get_current_user_id(),
            'post_type'     => 'page',
        );

        // Insert the post into the database
        wp_insert_post( $my_post, '' );
    }
    
    $quote_page = get_page_by_path('extras');
    if (!$quote_page){
        // Create post object
        $my_post = array(
            'post_title'    => 'GOQuoting - Extras',
            'post_name'     => 'extras',
            'post_content'  => '[goquoting-extras]',
            'post_status'   => 'publish',
            'post_author'   => get_current_user_id(),
            'post_type'     => 'page',
        );

        // Insert the post into the database
        wp_insert_post( $my_post, '' );
    }
    
    $quote_page = get_page_by_path('checkout');
    if (!$quote_page){
        // Create post object
        $my_post = array(
            'post_title'    => 'GOQuoting - Checkout & Payment',
            'post_name'     => 'checkout',
            'post_content'  => '[gogabooking-checkout]',
            'post_status'   => 'publish',
            'post_author'   => get_current_user_id(),
            'post_type'     => 'page',
        );

        // Insert the post into the database
        wp_insert_post( $my_post, '' );
    }
    
    $quote_page = get_page_by_path('thank-you');
    if (!$quote_page){
        // Create post object
        $my_post = array(
            'post_title'    => 'GOQuoting - Thank you!',
            'post_name'     => 'thank-you',
            'post_content'  => '[gogabooking-thankyou]',
            'post_status'   => 'publish',
            'post_author'   => get_current_user_id(),
            'post_type'     => 'page',
        );

        // Insert the post into the database
        wp_insert_post( $my_post, '' );
    }
}

add_action( 'plugins_loaded', 'ggCreateCheckAvailabilityFile', 10 );
function ggCreateCheckAvailabilityFile(){   
    
    //obtener la ruta del tema activo
    $theme_activo = get_template_directory();
    
    /*if ( file_exists($theme_activo . '/booking-system-template.php') ){
        return false;
    }*/
    
    $bookingfile = fopen( $theme_activo . '/booking-system-template.php', "w") or die("Unable to open file!");    
    //creat contenido del archivo
    ob_start();
    echo "<?php /* Template Name: Booking System Page */ ?>";
    echo "<?php the_post(); ?>";
    echo file_get_contents( RUTA_PLUGIN_BOOKING . 'app/views/booking-header.php' );
    ?>
    <div class="booking-page-main-container">
    <?php
    //echo WP_PLUGIN_URL . RUTA_PLUGIN_BOOKING;
    echo "<?php the_content(); ?>"
    ?>
    </div>
    <!-- FIN main content page -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="<?= RUTA_PLUGIN_BOOKING; ?>app/js/goquoting.js"></script>
    </body>
    </html>
    <?php
    $page_content = ob_get_clean();

    // crear el archivo php para el page-booking.php
    fwrite($bookingfile, $page_content);
    fclose($bookingfile);

}


add_action( 'plugins_loaded', 'ggAssingBookingTemplate', 11 );
function ggAssingBookingTemplate(){
    $quote_page = get_page_by_path('thank-you');
    update_post_meta( $quote_page->ID, '_wp_page_template', 'booking-system-template.php' );
}