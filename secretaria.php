<?php 
	include 'plantilla.html'; 
  $secretaria = new secretaria();
?>
<?php startblock('article') ?>
<script src="assets/js/main.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/es.js"></script>
    <script src="assets/js/calendario.js"></script>
    <link rel="stylesheet" href="assets/css/main.min.css">
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Bienvenida Secretaria</h3>
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
            <input type="date" class="form-control" id="start">
            <label for="start">Fecha</label>
          </div>
        </div>
        <div class="modal-footer">
        
        </div>
      </form>-->
      <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Registro de Nueva Cita</h4>
                        <button type="button" class="btn btn-outline-danger mdi mdi-close btn-fw mb-3" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="forms-sample" id="formulario_citas">
                    <input name="caso" value="1" type="hidden">
                      <div class="form-group row">
                        <label for="nombre_doctor" class="col-sm-3 col-form-label">Nombre del doctor</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="nombre_doctor">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="fecha" class="col-sm-3 col-form-label">Fecha</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="fecha">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="hora" class="col-sm-3 col-form-label">Hora</label>
                        <div class="col-sm-9">
                          <input type="time" class="form-control" id="hora">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nombre_paciente" class="col-sm-3 col-form-label">Nombre del paciente</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="nombre_paciente">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="apellidos_paciente" class="col-sm-3 col-form-label">Apellidos del paciente</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="apellidos_paciente">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="documento_paciente" class="col-sm-3 col-form-label">Documento del paciente</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="documento_paciente">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="motivo" class="col-sm-3 col-form-label">Motivo de la cita</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="motivo">
                        </div>
                      </div>
                      <button type="button" class="btn btn-primary me-2" onclick="sendForm(event)">Confirmar</button>
                    </form>
                  </div>
                </div>
              </div>
       
    </div>
  </div>
</div>

<div class="modal" id="eventoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de la cita</h5>
                <button type="button" class="btn btn-outline-danger btn-fw" data-bs-dismiss="modal">Cerrar</button>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <strong>Nombre Paciente:</strong> <span id="evento-titulo"></span><br>
                    <strong>Documento Paciente:</strong> <span id="evento-documento_paciente"></span><br>
                    <strong>Doctor:</strong> <span id="evento-nombre_doctor"></span><br>
                    <strong>Fecha:</strong> <span id="evento-fecha"></span><br>
                    <strong>Hora:</strong> <span id="evento-hora"></span><br>
                    <strong>Motivo:</strong> <span id="evento-motivo"></span><br>
                    <strong>Estado:</strong> <span id="evento-estado"></span>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" title="Confirmar" class="btn btn-outline-success mdi mdi-check btn-fw"></button>
                <button type="button" title="Cancelar" class="btn btn-outline-danger mdi mdi-close btn-fw"></button>
            </div>
        </div>
    </div>
</div>

<?php endblock() ?>
<script>
        function sendForm(event) {
        event.preventDefault();

        let nombreDoc = $('#nombre_doctor').val();
        let nombrePac = $('#nombre_paciente').val();
        let apellidosPac = $('#apellidos_paciente').val();
        let fecha = $('#fecha').val();
        let hora = $('#hora').val();
        let motivo = $('#motivo').val();
        let documento = $('#documento_paciente').val();
        console.log("Nombre Doctor:", nombreDoc);
        console.log("Nombre Paciente:", nombrePac);
        console.log("Apellidos Paciente:", apellidosPac);
        console.log("Fecha:", fecha);
        console.log("Hora:", hora);
        console.log("Motivo:", motivo);
        console.log("Documento:", documento);

        let camposVacios = [];
        function validarCampoVacio(campo, nombreCampo) {
          if (campo == "") {
            camposVacios.push(nombreCampo);
            return false;
          }
          return true;
        }

        validarCampoVacio(nombreDoc, "Nombre Doctor");
        validarCampoVacio(nombrePac, "Nombre Paciente");
        validarCampoVacio(apellidosPac, "Apellidos Paciente");
        validarCampoVacio(fecha, "Fecha");
        validarCampoVacio(hora, "Hora");
        validarCampoVacio(motivo, "Motivo");
        validarCampoVacio(documento, "Documento");

        console.log(camposVacios); // Verificar campos vacíos en consola

        if (camposVacios.length > 0) {
          Swal.fire({
            title: 'Error!',
            text: `Los siguientes campos están vacíos: ${camposVacios.join(", ")}`,
            icon: 'error',
            confirmButtonText: 'Ok'
          });
          return;
        }

        let datos = {
          caso: 1,
          nombre_doctor: nombreDoc,
          nombre_paciente: nombrePac,
          apellidos_paciente: apellidosPac,
          fecha: fecha,
          hora: hora,
          motivo: motivo,
          documento_paciente: documento
        };

        $.ajax({
          type: 'POST',
          url: '/DrDoom/action/control_secretaria.php',
          data: datos,
          dataType: 'json',
          success: function(response) {
            if (response.error) {
              Swal.fire({
                title: 'Error!',
                text: response.mensaje,
                icon: 'error',
                confirmButtonText: 'Ok'
              });
            } else {
              Swal.fire({
                title: 'Éxito!',
                text: response.mensaje,
                icon: 'success',
                confirmButtonText: 'Ok',
              }).then(() => {
                  document.getElementById("formulario_citas").reset();
                  $("#myModal").modal("hide");
                  location.reload(true);
              });
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
}

$('.btn-outline-success.mdi.mdi-check').click(function() {
  var documentoPaciente = document.getElementById("evento-documento_paciente").innerText;
  var horaCita = document.getElementById("evento-hora").innerText;

  console.log("Documento paciente:", documentoPaciente);
  console.log("Fecha hora:", horaCita);

  $.ajax({
    type: 'POST',
    url: '/DrDoom/action/control_secretaria.php',
    data: {
      caso: 2,
      documento_paciente: documentoPaciente,
      hora: horaCita,
      estado: 'confirmada'
    },
    beforeSend: function() {
      console.log("Enviando solicitud AJAX...");
    },
    success: function(response) {
      if (response == 'proceso exitoso!!!') {
        Swal.fire({
          title: 'Éxito!',
          text: 'El estado de la cita se actualizó correctamente',
          icon: 'success',
          confirmButtonText: 'Aceptar'
        });

        // Cambia el estado visualmente en el modal
        document.getElementById("evento-estado").innerText = 'confirmada';

        // Actualiza el estado del evento en el calendario de FullCalendar
        var event = calendar.getEventById(documentoPaciente); // Asegúrate de que el evento tenga un 'id' único que sea el documento del paciente
        if (event) {
          event.setExtendedProp('estado', 'confirmada');
        }

        // Cierra el modal
        $('#eventoModal').modal('hide');
      } else {
        Swal.fire({
          title: 'Error!',
          text: 'No se pudo actualizar el estado de la cita',
          icon: 'error',
          confirmButtonText: 'Aceptar'
        });
      }
    }
  });
});

$('.btn-outline-danger.mdi.mdi-close').click(function() {
  var documentoPaciente = document.getElementById("evento-documento_paciente").innerText;
  var horaCita = document.getElementById("evento-hora").innerText;

  console.log("Documento paciente:", documentoPaciente);
  console.log("Fecha hora:", horaCita);

  $.ajax({
    type: 'POST',
    url: '/DrDoom/action/control_secretaria.php',
    data: {
      caso: 2,
      documento_paciente: documentoPaciente,
      hora: horaCita,
      estado: 'cancelada'
    },
    beforeSend: function() {
      console.log("Enviando solicitud AJAX...");
    },
    success: function(response) {
      if (response == 'proceso exitoso!!!') {
        Swal.fire({
          title: 'Éxito!',
          text: 'El estado de la cita se actualizó correctamente',
          icon: 'success',
          confirmButtonText: 'Aceptar'
        });

        // Cambia el estado visualmente en el modal
        document.getElementById("evento-estado").innerText = 'cancelada';

        // Actualiza el estado del evento en el calendario de FullCalendar
        var event = calendar.getEventById(documentoPaciente); // Asegúrate de que el evento tenga un 'id' único que sea el documento del paciente
        if (event) {
          event.setExtendedProp('estado', 'cancelada');
        }

        // Cierra el modal
        $('#eventoModal').modal('hide');
      } else {
        Swal.fire({
          title: 'Error!',
          text: 'No se pudo actualizar el estado de la cita',
          icon: 'error',
          confirmButtonText: 'Aceptar'
        });
      }
    }
  });
});
</script>