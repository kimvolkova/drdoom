<?php 
	include 'plantilla.html'; 
    startblock('article');
    $ID = $_GET['ID'];
    $consultar_cliente = new cliente();
    $cliente = $consultar_cliente->detalle_cliente($ID);
?>
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Editar Clientte</h3>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card">    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulario Detalles Cliente</h4>
                <p class="card-description">Formulario de actualizacion de datos del cliente</code></p>

                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" id="formNuevoDriver" action="action/control_cliente.php" method="post">
                      <div class="form-group">
                        <input name="caso" value="2" type="hidden">
                        <input name="id" value="<?php echo $cliente['nClienteID']?>" type="hidden">
                        <label for="exampleInputName1">Nombres</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="nombres" value="<?php echo $cliente['cNombre']?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Apellidos</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="apellidos" value="<?php echo $cliente['cApellido']?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Celular</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="celular" value="<?php echo $cliente['cCel']?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Tipo</label>
                        <select class="form-select" id="exampleSelectGender" name="tipo" value="<?php echo $cliente['cTipo']?>">
                          <option>START</option>
                          <option>VIP</option>
                          <option>PLATINUM</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary me-2" onclic="modificarCliente">Enviar</button>
                      <a class="btn btn-light" href="cliente_lista">Volver</a>
                    </form>
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