$('[data-slider]').on('change.fndtn.slider', function(){
   text=$('#slider').attr('data-slider');
  $('happyscale').val( text );
});