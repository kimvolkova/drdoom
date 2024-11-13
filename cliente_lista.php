<?php 
	include 'plantilla.html'; 
    startblock('article');
    $consultar = new cliente();
    $array_cliente = $consultar->listar_clientes();
?>
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Lista Clientes</h3>
        <h6 class="font-weight-normal mb-0">Este es el total de clientes <span class="text-primary"><?php echo count($array_cliente)?></span></h6>
      </div>
    </div>
  </div>
</div>
 
<div class="row justify-content-center">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card">    
        <div class="card">
            <div class="card-body">
              <div class="row">
                <h4 class="card-title">lista clientes</h4>
              </div>
                <p class="card-description"> Total<code>#<?php echo count($array_cliente)?></code></p>

                <?php 
                    if(count($array_cliente)!=0){                    
                ?>

                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>	
                            <th>#</th>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Motivo</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $cont = 0;
                            foreach($array_cliente as $item){
                                $cont++;

                        ?>
                        <tr>
                            <td><?php echo $cont?></td>
                            <td><?php echo $item['nombre']?></td>
                            <td><?php echo $item['apellido']?></td>
                            <td><?php echo $item['celular']?></td>
                            <td><?php echo $item['tipo']?></td>
                            <td>
                              <?php if($item['estado']==1){ ?>
                                <?php echo "ACTIVO"?>
                              <?php }else{ ?>
                                <?php echo "INACTIVO"?>
                              <?php } ?>
                             


                            <td>
                              <?php if($item['estado']=="1"){ ?>
                                  <label class="btn btn-outline-danger btn-sm" onclick="estadoCliente(3,'<?php echo $item['codigo']?>',0)">Cambiar Estado</label>
                              <?php }else{ ?>
                              <label class="btn btn-outline-success btn-sm" onclick="estadoCliente(3,'<?php echo $item['codigo']?>',1)">Cambiar Estado</label>
                                <?php } ?>
                                <a class="btn btn-outline-info btn-sm btn-sm" href="cliente_editar.php?ID=<?php echo $item['codigo']?>">Editar Perfil</a>
                            </td>
                        </tr>

                        <?php 
                            }
                        ?>

                    </tbody>
                    </table>
                </div>
                <?php 
                    }else{
                        echo "<center><h2 class='text-warning'>No hay clientes registrados!!!</h2></center>
";
                    } 
                ?>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="modalEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Estado Cliente</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCliente" action="action/control_cliente.php" method="post">
            <center><h2>Deseas cambiar el estado del Cliente?</h2></center>
            <br>
          <input id="inputEstadoID" name="id" type="hidden">
          <input id="inputEstadoCaso" name="caso" type="hidden">
          <input id="inputEstado" name="estado" type="hidden">
          <center><button type="submit" class="btn btn-primary" onclick="sendEstado()">Enviar</button></center>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>         
        

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCliente" action="action/controlador_cliente.php" method="post">
          <input id="inputID" name="id" type="hidden">
          <input id="inputCaso" name="caso" type="hidden">
          <div class="form-group">
            <label for="inputNombres">Nombres</label>
            <input type="text" id="inputNombres" name="nombres" class="form-control">
          </div>
          <div class="form-group">
            <label for="inputApellidos">Apellidos</label>
            <input type="text" id="inputApellidos" name="apellidos" class="form-control">
          </div>
          <div class="form-group">
            <label for="inputCelular">Celular</label>
            <input type="text" id="inputCelular" name="celular" class="form-control">
          </div>                                         
          <button type="button" class="btn btn-primary" onclick="sendForm()">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>    


    </div>
</div>

<?php endblock() ?>
<script>

  function sendForm(){    
    let formulario = document.getElementById('formCliente');
    let nombres = $('#inputNombres').val();
    alert(nombres);
    if(nombres==""){
      Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'error',
        confirmButtonText: 'Cool'
      })      
      alert("no se admiten campos nulos");
      return false;
    }
    formulario.submit();    
  }

</script>