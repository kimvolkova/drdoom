<?php 
	include 'plantilla.html'; 
  $contador = new cliente();
  $array_clientes = $contador->listar_clientes();
?>
<?php startblock('article') ?>
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Bienvenido Odontologo</h3>
        <h6 class="font-weight-normal mb-0">Estas son las citas del dia de hoy</h6>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid-margin transparent">
    <div class="row">
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-tale">
          <div class="card-body">
            <p class="mb-4">TOTAL CLIENTES</p>
            <p class="fs-30 mb-2"><?php echo count($array_cliente); ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">TOTAL FACTURAS</p>
            <p class="fs-30 mb-2">0</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-light-danger">
          <div class="card-body">
            <p class="mb-4">TOTAL PRODUCTOS</p>
            <p class="fs-30 mb-2">0</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endblock() ?>