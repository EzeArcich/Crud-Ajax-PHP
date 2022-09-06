function clear(){
    $("#id").val("");
     $("#marca").val("");
     $("#modelo").val("");
     $("#color").val("");
 }

 function reladData(){
    setTimeout(function() {
   location.reload();
   }); 
}



function agregar_data(){
    var datos=$("#form_data").serialize();

    $.ajax({

        method: "POST",
        url: "insertar.php",
        data: datos,
        success: function(e){
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Registro ingresado con éxito!',
                showConfirmButton: false,
                timer: 1500
              }) 
              setTimeout(clear,1600);
              setTimeout(reladData,1700);
          
        }

    });

    
}


 function get_modal(datos){
     d=datos.split('||');
     $("#id2").val(d[0]);
     $("#marca2").val(d[1]);
     $("#modelo2").val(d[2]);
     $("#color2").val(d[3]);
 }

 

 function update_datos() {

    var datos= $("#form_data_update").serialize();

    $.ajax({
        method:"POST",
        url:"update.php",
        data : datos,
        success: function(e){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Registro actualizado con éxito!',
            showConfirmButton: false,
            timer: 1500
          }) 
          setTimeout(clear,1600);
          setTimeout(reladData,1700);
      
    }
    });

    return false;
 }

 function delete_datos(){
    var datos=$("#form_data_update").serialize();
    $.ajax({
        method: "POST",
        url: "delete.php",
        data: datos,
        success: function(e){
            if(e==1){
                
                
            } else {
                alert("algo malo sucedió");
            }
        }
    });
    return false;
 }