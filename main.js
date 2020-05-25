$( document ).ready(function() {
    console.log( "test db" );

    $.ajax({
          url: 'getPagamenti.php',
          success: function(data){

            for (var pagamento of data) {
              $('.lista-pagamenti').append('<li>' + pagamento + '</li>');
            }
            //funziona anche col for normale
            // for (var i = 0; i < data.length; i++) {
            // console.log(data[i]);
            // }
          },
          error: function(richiesta,stato,error){
            $('body').append('errore di connessione al server')
          },
        });




});
