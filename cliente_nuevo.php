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
        <h3 class="font-weight-bold">Nuevo Cliente</h3>
        <h6 class="font-weight-normal mb-0"></span></h6>
      </div>
    </div>
  </div>
</div>

                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Formulario Nuevo Cliente</h4>
                    <form class="forms-sample" action="action/control_cliente.php" method="post">
                    <input name="caso" value="1" type="hidden">
                      <div class="form-group">
                        <label for="exampleInputName1">Nombres</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="nombres" placeholder="Digite los nombres">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Apellidos</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="apellidos" placeholder="Digite los apellidos">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Celular</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="celular" placeholder="Digite el numero de celular">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Tipo</label>
                        <select class="form-select" id="exampleSelectGender" name="tipo">
                          <option>START</option>
                          <option>VIP</option>
                          <option>PLATINUM</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
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