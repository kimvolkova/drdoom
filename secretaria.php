<?php 
	include 'plantilla.html'; 
  $contador = new cliente();
  $array_clientes = $contador->listar_clientes();
?>
<?php startblock('article') ?>
    <script src="assets/js/main.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/es.js"></script>
    <link rel="stylesheet" href="assets/css/main.min.css">
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Bienvenida Secretaria</h3>
        <h6 class="font-weight-normal mb-0">Calendario</h6>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin transparent">
    <div class="row">
    <div id='calendar'></div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!--<form id="formulario">
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="fecha">
            <label for="fecha">Fecha</label>
          </div>
          <div class="form-floating mb-3">
          <input type="text" class="form-control" id="nombre_doctor">
          <label for="nombre_doctor">Nombre del doctor</label>
          </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-info" id="btnAccion">Confirmar</button>
        </div>
      </form>-->
      <div class="col-md-12 grid-margin stretch-card">
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Registro de Nueva Cita</h4>
              <p class="card-description"> Horizontal form layout </p>
              <form class="forms-sample" id="formulario_citas">
                <input name="caso" value="1" type="hidden">
                <div class="form-group row">
                  <label for="nombre_doctor" class="col-sm-3 col-form-label">Nombre del doctor</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nombre_doctor" name="nombre_doctor">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fecha" class="col-sm-3 col-form-label">Fecha</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="fecha" name="fecha">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hora" class="col-sm-3 col-form-label">Hora</label>
                  <div class="col-sm-9">
                    <input type="time" class="form-control" id="hora" name="hora">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nombre_paciente" class="col-sm-3 col-form-label">Nombre del paciente</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nombre_paciente" name="nombre_paciente">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="apellidos_paciente" class="col-sm-3 col-form-label">Apellidos del paciente</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="apellidos_paciente" name="apellidos_paciente">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="motivo" class="col-sm-3 col-form-label">Motivo de la cita</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="motivo" name="motivo">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Cancelar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>                      
                <button type="submit" class="btn btn-primary" id="btnAccion">Confirmar</button>
              </form>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
<?php endblock() ?>

<script src="assets/js/calendario.js"></script>
<script>const base_url = '<?php echo base_url; ?>';</script>
<script>
let frm = document.getElementById('formulario_citas');  
frm.addEventListener('submit', function(e){
  e.preventDefault();
  const nombre_doctor = document.getElementById('nombre_doctor').value;
  const fecha = document.getElementById('fecha').value;
  const hora = document.getElementById('hora').value;
  const nombre_paciente = document.getElementById('nombre_paciente').value;
  const apellidos_paciente = document.getElementById('apellidos_paciente').value;
  const motivo = document.getElementById('motivo').value;
  if (nombre_doctor == '' || fecha == '' || hora == '' || nombre_paciente == '' || 
      apellidos_paciente == '' || motivo == '') {
        Swal.fire(
          'Aviso',
          'Todos los campos son requeridos',
          'wraning'
        )
  } else {
    const url = base_url + 'secretaria/registrar'
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function();
    if (this. readyState ==4 && this.status == 200){
      console.log(this.responseText);
    }
  }
});
</script>