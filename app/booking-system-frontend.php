<?php
function goquotingAddScriptFrontend(){
    if (get_option( 'goquoting-link-system' ) == 'on'){
?>
<script>
    var links = $('.plan-your-trip-btn, .plan-your-trip-single-btn, .itinerary-plan-your-trip-btn');
    console.log(links);
    $.each(links, function(index, value){
        this.href = this.href.replace('request-a-quote', 'check-availability');
        console.log(this.href);
    })
</script>
<?php
    }
}
add_action('wp_footer', 'goquotingAddScriptFrontend');

?>