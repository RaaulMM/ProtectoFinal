<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calendario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"> </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="css/reset.css">
	  <link rel="stylesheet" href="css/css.css">
    <!--FULL CALENDAR-->
    <script src="js/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="css/css.css">
    <script src="js/es.js"></script>
    

    <!-- js BOOTSTRA -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- SCRIP MIO -->
    <script src="js/custom.js"></script>
</head>
   
<body>
  <div class="container">
 <div class="cerrarSesion bcalendario"><a class="csesion" href="index.php?mod=Panel&index"> volver al panel</a> </div>
  
      <div id="CalendarioWeb"></div> 
    </div> <br>
  </div>


<!-- Modal -->
<div class="modal fade" id="ModalClik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
        <?php require_once "modelo/Database.php";  ?>
        <?php require_once "modelo/Evento.php";   ?>
        <?php require_once "modelo/Usuario.php";   ?>

        <form action="index.php" method="GET">
        <input type="hidden" name="mod" value="evento">
        <input type="hidden" name="ope" value="registro">
        
        <input type="hidden" name="txtFechaInicio" id="txtFechaInicio" >
        <input type="hidden" name="txtFechaFinal" id="txtFechaFinal" >


      
        <div class="fecha">
        <label>Fecha:</label>
        <input class="field imput" type="text" name="txtFechaI" id="txtFechaI" readonly=""><br>
        </div>
        <div class="fechaDesde">
        <label>Desde:</label>
        <input class="field imput" type="time" name="txtHoraI" id="txtHoraI" readonly="">
        </div>
        <div class="fechaHasta">
        <label>Hasta:</label>
        <input class="field imput" type="time" name="txtHoraF" id="txtHoraF" readonly=""><br>
        </div>
        <div class="textDescrip">
        <label>Descripción de la consulta:</label>
        </div>
        <textarea id="txtDescripcion" name="txtDescripcion" rows="5" cols="60" style="width: 100%;"></textarea><br>

        <?php 
          $datos = Usuario::getAllUsu() ;
            foreach ($datos as $item) :
        ?>
        <input type="hidden" name="idUsu" id="idUsu" value="<?= $item->getId();?>" ><br>
          <?php endforeach; ?>
        
        <label>Seleciona el proyecto del cual perteneces:</label>
        <select id="idPro" name="idPro">
                <?php 
                 $datos = Usuario::getAllPro() ;
                          foreach ($datos as $item) :
                ?>
                          <option value="<?= $item->idPro_Pro;?>"> 
                            <?= $item->nombre;?>
                          </option>
                          <?php
                            endforeach;
                          ?>
        </select><br>
        <input type="hidden" name="color" value="#C7C6C5">
      </div>
      <div class="modal-footer">
      <button class="btn btn-success" type="submit" >Registrar</button> 
      </form>
        
      </div>
    </div>
  </div>
</div> 



<script type="text/javascript">
      var uri = window.location.toString();
      if (uri.indexOf("?") > 0) {
      var clean_uri = uri.substring(0, uri.indexOf("?"));
      window.history.replaceState({}, document.title, clean_uri);
      }
    </script>

</body>
</html>
