document.addEventListener('DOMContentLoaded', function() {
  fetch('/DrDoom/eventos/eventos.php')
    .then(response => response.json())
    .then(data => {
      console.log("Fetched events:", data); 

      var myModal = new bootstrap.Modal(document.getElementById('myModal'));
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        eventDisplay: 'list-item',
        initialView: 'dayGridMonth',
        locale: 'es',
        eventClick: function(info) {
          // Rellena los campos del modal con la información del evento
          document.getElementById("evento-titulo").innerText = info.event.title;
          document.getElementById("evento-fecha").innerText = info.event.start;
          document.getElementById("evento-hora").innerText = info.event.extendedProps.hora;
          document.getElementById("evento-documento_paciente").innerText = info.event.extendedProps.documento_paciente;
          document.getElementById("evento-nombre_doctor").innerText = info.event.extendedProps.nombre_doctor;
          document.getElementById("evento-motivo").innerText = info.event.extendedProps.motivo;
          document.getElementById("evento-estado").innerText = info.event.extendedProps.estado;
          
          // Abre el modal
          $("#eventoModal").modal("show");
        },
        events: data, 
        headerToolbar: {
          left: 'prev,next,today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        dateClick: function (info){
          document.getElementById('fecha').value = info.dateStr;
          myModal.show();
        }
      });
      calendar.render();
    })
    .catch(error => console.error("Error fetching events:", error));
});


