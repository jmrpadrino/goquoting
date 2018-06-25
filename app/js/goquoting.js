/* GO Quoting main js */
var datesShown = false;
function fechasMostrarOcultar(padre){
    if (datesShown){
        $('#'+padre).find('.ship-departure-dates-list').addClass('shown');
        $('#'+padre).find('.hide-all-dates').removeClass('hidden');
    }else{
        $('#'+padre).find('.ship-departure-dates-list').removeClass('shown');
        $('#'+padre).find('.see-all-dates').removeClass('hidden');
    }
}

/* READY */
$(document).ready( function(){
    
    console.log('App started!');
    
})

/* EVENTOS */
// MOSTRAR Y OCULTAR LAS FECHAS
$('.hide-all-dates').click( function(){
    datesShown = false;
    $(this).addClass('hidden');
    fechasMostrarOcultar($(this).parents('.ship-container').attr('id'));
});    
$('.see-all-dates').click( function(){
    datesShown = true;
    $(this).addClass('hidden');
    fechasMostrarOcultar($(this).parents('.ship-container').attr('id'));
});
// SELECCIONAR LA FECHA
$('.departure-placeholder').click( function(){
    
    var departure_promo = $(this).data('promo');
    
    var promo_name = '';
    switch (departure_promo){
        case 'CUP001':
            promo_name = 'Cabin Upgrade';
            break;
        case 'TKF001':
            promo_name = 'Free Ticket';
            break;
    }
    
    $('.departure-placeholder').removeClass('selected');
    $(this).addClass('selected');
    $('#input-ship').val($(this).parents('.ship-container').data('shipcode'));
    $('#input-departure').val($(this).data('departure'));
    $('#input-promo').val($(this).data('promo'));
    
    $('#promo-name').html(promo_name);
    if (departure_promo === undefined){
        $('#input-promo').val('false');
        $('#promo-name').html('')
    }
})
// SELECCIONAR DURACION
$('.duration-placeholder').click( function(){
    $('.duration-placeholder').removeClass('open');
    $(this).addClass('open');
    $('#input-ship').val($(this).parents('.ship-container').data('shipcode'));
    $('#input-duration').val($(this).data('duration'));
})



