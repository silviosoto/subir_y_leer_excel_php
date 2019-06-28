

  $(document).ready(function(){
    $( "#CrearHabitacion" ).submit(function( event ) {
        event.preventDefault();
        alert("asdad");
        var ruta =window.location.origin +"/Habitacion/";
    
        var formData = new FormData(document.getElementById("CrearHabitacion"));
        console.log(formData);
             $.ajax({
              url: 'server.php',
              type: 'POST',
                data:formData,
              processData: false,  // tell jQuery not to process the data
              contentType: false, 
              success : function(json) {
                console.log(json);
              },
              error : function(ms) {
        
              },
          });
      });
    
    
  });