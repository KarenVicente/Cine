$(function(){

      $('#infantiles').hide();
      $('#terror').hide();
      $('#comedia').hide();
      $('#romanticas').hide();
      $('#familiares').hide();


  /* $('#in').click(function() {
      $('#in').addClass("active");
      $('#infantiles').show()
      $('#terror').hide();
      $('#comedia').hide();
      $('#romanticas').hide();
      $('#familiares').hide();
      $('#estrenos').hide();
   });

   $('#te').click(function() {
      $('#te').addClass("active");
      $('#infantiles').hide()
      $('#terror').show();
      $('#comedia').hide();
      $('#romanticas').hide();
      $('#familiares').hide();
      $('#estrenos').hide();
   });

   $('#co').click(function() {
      $('#infantiles').hide()
      $('#terror').hide();
      $('#comedia').show();
      $('#romanticas').hide();
      $('#familiares').hide();
      $('#estrenos').hide();
   });

   $('#fa').click(function() {
      $('#infantiles').hide()
      $('#terror').hide();
      $('#comedia').hide();
      $('#romanticas').hide();
      $('#familiares').show();
      $('#estrenos').hide();
   });

   $('#es').click(function() {
      $('#infantiles').hide()
      $('#terror').hide();
      $('#comedia').hide();
      $('#romanticas').hide();
      $('#familiares').hide();
      $('#estrenos').show();
   });*/

   $('#es').click(function() {
      vistas($('#es'),$('#in'),$('#te'),$('#co'),$('#ro'),$('#fa'),$('#estrenos'),$('#infantiles'),$('#terror'),$('#comedia'),$('#romanticas'),$('#familiares'))
   });

   $('#in').click(function() {
      vistas($('#in'),$('#es'),$('#te'),$('#co'),$('#ro'),$('#fa'),$('#infantiles'),$('#estrenos'),$('#terror'),$('#comedia'),$('#romanticas'),$('#familiares'))
   });

   $('#te').click(function() {
      vistas($('#te'),$('#es'),$('#in'),$('#co'),$('#ro'),$('#fa'),$('#terror'),$('#estrenos'),$('#infantiles'),$('#comedia'),$('#romanticas'),$('#familiares'))
   });

   $('#co').click(function() {
      vistas($('#co'),$('#es'),$('#in'),$('#te'),$('#ro'),$('#fa'),$('#comedia'),$('#estrenos'),$('#infantiles'),$('#terror'),$('#romanticas'),$('#familiares'))
   });

   $('#ro').click(function() {
      vistas($('#ro'),$('#es'),$('#in'),$('#te'),$('#co'),$('#fa'),$('#romanticas'),$('#estrenos'),$('#infantiles'),$('#terror'),$('#comedia'),$('#familiares'))
   });

   $('#fa').click(function() {
      vistas($('#fa'),$('#ro'),$('#es'),$('#in'),$('#te'),$('#co'),$('#familiares'),$('#romanticas'),$('#estrenos'),$('#infantiles'),$('#terror'),$('#comedia'))
   });


   function vistas(activo,oc1,oc2,oc3,oc4,oc5,mostrar,de1,de2,de3,de4,de5) {
      activo.addClass('active');
      oc1.removeClass('active');
      oc2.removeClass('active');
      oc3.removeClass('active');
      oc4.removeClass('active');
      oc5.removeClass('active');

      mostrar.show();
      de1.hide();
      de2.hide();
      de3.hide();
      de4.hide();
      de5.hide();
   };


});