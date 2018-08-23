$('#sync-receptivo').click( function(){
    $.ajax({
        type: 'POST',
        url: ajaxurl,
        data : {
            action: 'goDownloadReceptivo',
            var1: 'valor1',
        },
        beforeSend  : function(){
            $('#syncmsg').modal('show');
            $('#sync-text-msg')
                .removeClass('bg-danger')
                .removeClass('bg-warning')
                .removeClass('bg-success')
                .addClass('bg-info');
            $('#sync-text-msg .dashicons')
                .removeClass('dashicons-yes')
                .removeClass('dashicons-no')
                .removeClass('dashicons-warning')
                .addClass('dashicons-image-rotate');
            $('#sync-text-msg p')
                .text('Connecting to ELIGOS...');
        },
        success: function( response ){
            setTimeout( function(){
                if (response.length > 0){
                    $('#sync-text-msg')
                        .removeClass('bg-info')
                        .addClass('bg-success');
                    $('#sync-text-msg .dashicons')
                        .removeClass('dashicons-image-rotate')
                        .addClass('dashicons-yes');
                    $('#sync-text-msg p')
                        .text('The information has been downloaded to ELIGOS...');
                    $('.modal-footer')
                        .removeClass('hidden');
                }else{
                    $('#sync-text-msg')
                        .removeClass('bg-info')
                        .addClass('bg-warning');                
                    $('#sync-text-msg .dashicons')
                        .removeClass('dashicons-image-rotate')
                        .addClass('dashicons-warning');
                    $('#sync-text-msg p')
                        .text('An error has occurred with ELIGOS, please try again!...');
                    $('.modal-footer')
                        .removeClass('hidden');
                }
            }, 1000);    
            console.log(response);
        },
        error: function( response ){
            setTimeout( function(){
                $('#sync-text-msg')
                    .removeClass('bg-info')
                    .addClass('bg-danger');                
                $('#sync-text-msg .dashicons')
                    .removeClass('dashicons-image-rotate')
                    .addClass('dashicons-no');
                $('#sync-text-msg p')
                    .html('Error Connecting to ELIGOS... <strong class="text-danger">please report!</strong>');
                $('.modal-footer').show();
                $('.modal-footer')
                    .removeClass('hidden');
            }, 1000);
        }
    })
})