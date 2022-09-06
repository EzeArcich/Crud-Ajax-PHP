<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="main.css">
    <script src="scripts.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



 
</head>
  <body>
    <div class="container-fluid" id="form1">
        <div class="row">
        <h1 class="text-center mt-4">CRUD con<span class="badge bg-success">Ajax</span></h1>
        <div class="container-fluid mt-5">
            <div class="row ">
            <div class="col-md-1 ">
            </div>
            <div class="col-md-4">
                <h4 style="margin-left:120px; color:#c0d4e7; font-size:">Ingresar <small class="text-muted">unidad</small></h4>
                <form id="form_data" class="mt-5" method="POST">
                    <div class="form-floating mb-3" style="color:white;">
                        <input class="form-control" style="width:60%;" type="text" name="marca" id="marca" placeholder="Marca">
                        <label for="floatingInput">Marca</label>
                    </div>
                
                    <div class="form-floating mb-3">
                        <input class="form-control " style="width:60%;" type="text" name="modelo" id="modelo" placeholder="Modelo">
                        <label for="floatingInput">Modelo</label>
                    </div>
                
                    <div class="form-floating mb-3">
                        <input class="form-control " style="width:60%;" type="text" name="color" id="color" placeholder="Color">
                        <label for="floatingInput">Color</label>                    
                    </div>

                    <button type="submit" name="btn_guardar" id="btn_guardar" class="btn btn-success" >Aceptar</button>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table tablavehiculos table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php
                        include("conexion.php");
                        $sql="SELECT * FROM vehiculos";
                        $consulta=mysqli_query($con, $sql);
                        foreach ($consulta as $item) {
                            
                            $datos=$item['id']."||".$item['marca']."||".$item['modelo']."||".$item['color'];
                              
                        ?>   
                        <tr>
                            <td><?php echo $item["id"] ?></td>
                            <td><?php echo $item["marca"] ?></td>
                            <td><?php echo $item["modelo"] ?></td>
                            <td><?php echo $item["color"] ?></td>
                            <td><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_update" onclick="get_modal('<?php echo $datos?>');" id="modal_popup">Editar</button></td>
                        </tr>
                    </tbody>
                    <?php
                       } 
                    ?>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
 

    <!-- Modal editar -->

    <div class="modal fade" id="Modal_update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_data_update" class="mt-5" method="POST">
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="id2" id="id2" placeholder="Marca">
                <label for="floatingInput">Id</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="marca2" id="marca2" placeholder="Marca">
                <label for="floatingInput">Marca</label>
            </div>
                
            <div class="form-floating mb-3">
                <input class="form-control " type="text" name="modelo2" id="modelo2" placeholder="Modelo">
                <label for="floatingInput">Modelo</label>
            </div>
                
            <div class="form-floating mb-3">
                <input class="form-control " type="text" name="color2" id="color2" placeholder="Color">
                <label for="floatingInput">Color</label>                    
            </div>

                    

            <button type="submit" name="btn_actualizar" id="btn_actualizar" class="btn btn-success" >Aceptar</button>
            <button class="btn btn-danger" name="btn_eliminar" id="btn_eliminar">Eliminar</button>
            
        </form>
        
      </div>
      
    </div>
  </div>
</div>

<!-- Fin de Modal editar -->


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script> 
    
    
    <script>
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });


        $(document).ready( function () {
        $('.tablavehiculos').DataTable();
        });
    

    
        $(document).ready(function(){
            $("#btn_guardar").on('click', function(e){
                e.preventDefault();
                agregar_data();
            });
        });
    
    
        $(document).ready(function(){
            $("#btn_actualizar").on('click', function(e){
                e.preventDefault();
                update_datos();
            });
        });
    

    
        $(document).ready(function(){
            $("#btn_eliminar").on('click', function(e){
                e.preventDefault();
                swalWithBootstrapButtons.fire({
                title: 'Estás seguro?',
                text: "No podrás revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, borralo!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                    'Eliminado!',
                    'El registro fue eliminado con éxito!.',
                    'success',
                    )
                    delete_datos();
                    setTimeout(reladData,2000);
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Tu registro está a salvo :)',
                    'error'
                    )
                }
                });
                
                
            });
        });


        
    </script>
    
</body>
</html>