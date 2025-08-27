<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="../css/dark.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Sistema de Inventario</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="../php/principal.php">
          <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
        </a>
        <ul class="navbar-nav ml-auto"></ul>
      </div>
    </nav>
  </header>

  <div class="modo" id="modo"></div>

  <div style="height: 50px;"></div>

  <?php
  session_start();
  require ("../php/connect2.php");

  $query = "SELECT * FROM eventoscalendar";
  $resulEventos = mysqli_query($conn, "SELECT * FROM eventoscalendar");

  $result = mysqli_query($conn, $query);

  if (!$result) {
    die('Error en la consulta: ' . mysqli_error($conn));
  }

  ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col msjs">
        <?php include ('msjs.php'); ?>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-md-12 mb-3">
        <h3 class="text-center" id="title">Calendario</h3>
      </div>
    </div> -->

    <div id="calendar"></div>


    <?php
    include ('modalNuevoEvento.php');
    include ('modalUpdateEvento.php');
    ?>



    <script src="js/jquery-3.0.0.min.js"> </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/fullcalendar.min.js"></script>
    <script src='locales/es.js'></script>

    <script type="text/javascript">
      $(document).ready(function () {
        $("#calendar").fullCalendar({
          header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
          },

          locale: 'es',

          defaultView: "month",
          navLinks: true,
          editable: true,
          eventLimit: true,
          selectable: true,
          selectHelper: false,

          //Nuevo Evento
          select: function (start, end) {
            $("#exampleModal").modal();
            $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));

            var valorFechaFin = end.format("DD-MM-YYYY");
            var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
            $('input[name=fecha_fin').val(F_final);

          },

          events: [
            <?php
            while ($dataEvento = mysqli_fetch_array($resulEventos)) { ?>
            {
                _id: '<?php echo $dataEvento['id']; ?>',
                title: '<?php echo $dataEvento['evento']; ?>',
                start: '<?php echo $dataEvento['fecha_inicio']; ?>',
                end: '<?php echo $dataEvento['fecha_fin']; ?>',
                color: '<?php echo $dataEvento['color_evento']; ?>'
              },
            <?php } ?>
          ],


          //Eliminar Evento
          eventRender: function (event, element) {
            element
              .find(".fc-content")
              .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");

            //Eliminar evento
            element.find(".closeon").on("click", function () {

              var pregunta = confirm("Deseas Borrar este Evento?");
              if (pregunta) {

                $("#calendar").fullCalendar("removeEvents", event._id);

                $.ajax({
                  type: "POST",
                  url: 'deleteEvento.php',
                  data: { id: event._id },
                  success: function (datos) {
                    $(".alert-danger").show();

                    setTimeout(function () {
                      $(".alert-danger").slideUp(500);
                    }, 3000);

                  }
                });
              }
            });
          },


          //Moviendo Evento Drag - Drop
          eventDrop: function (event, delta) {
            var idEvento = event._id;
            var start = (event.start.format('DD-MM-YYYY'));
            var end = (event.end.format("DD-MM-YYYY"));

            $.ajax({
              url: 'drag_drop_evento.php',
              data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
              type: "POST",
              success: function (response) {
                // $("#respuesta").html(response);
              }
            });
          },

          //Modificar Evento del Calendario 
          eventClick: function (event) {
            var idEvento = event._id;
            $('input[name=idEvento').val(idEvento);
            $('input[name=evento').val(event.title);
            $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
            $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

            $("#modalUpdateEvento").modal();
          },


        });


        //Oculta mensajes de Notificacion
        setTimeout(function () {
          $(".alert").slideUp(300);
        }, 3000);


      });

    </script>

<script src="../js/main.js"></script>

    <!-- <script> //Bloqueo clic derecho y bloqueo para visualizar codigo fuente
        $(document).bind("contextmenu", function (e) {
            e.preventDefault();
        });

        $(document).keydown(function (e) {
            if (e.which === 123) {
                return false;
            }
            if (e.ctrlKey && (e.keyCode == 'U'.charCodeAt(0) || e.keyCode == 'u'.charCodeAt(0))) {
                return false;
            }
        });
    </script> -->

</body>



</html>