<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
	<!-- js BOOTSTRA -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"> </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/css.css">
    <script src="js/custom.js"></script>
    
    <title>Panel de Control</title>
</head>
<body>

<div class="wrapper-panel">
    <div class="tuCita">
		<h1 class="tituloPanel">Hola <?=$_SESSION["usu"] ?>!</h1>
		<h2 class="divpanel">Datos de tu cita</h2><br>
		<?php if (empty($cita)){?>
			<div class="noCita">Aun no tienes una cita</div>
		<?php } else{ ?>
		<?php foreach ($cita as $item) : ?>
			<?=$item->getDay(); ?> - <?=$item->getMonth(); ?> - <?= $item->getYear(); ?> a las <?= $item->getHour(); ?>:<?= $item->getMinute(); ?>
			- <a data-toggle="modal" data-target="#avisoBorrar" class="fas fa-trash icono" href="" title="BORRAR CITA"></a><br>
			<br><h2 class="divpanel">Descripcion de tu cita: <a class="fas fa-pen-square icono" data-toggle="modal" data-target="#update" href="" title="EDITAR CITA"></a> </h2><br>
			<textarea class="area"readonly ><?= $item->getTitle(); ?></textarea>
			<?php $id = $item->getId()?>
		<?php endforeach; ?>
		<?php }?>

		<div class="botonesPanel">
			<?php if (empty($cita)){?>
				<div class="bpaneld">
					<a class="a v" href="index.php?mod=index&ope=indexCalendario"> Nueva cita</a>
				</div>
			<?php } else{ ?>	
				<div class="bpaneld">
					<a style="color: white;" class="a b" data-toggle="modal" data-target="#modalCita"> Nueva cita</a>
				</div>
			<?php }?>
			<div class="bpaneli">
				<a class="csesion a" href="index.php?mod=Usuario&ope=Csesion"> Cerrar sesión</a>
			</div>
		</div>
	</div>
</div>








<!-- Modal aviso cita-->
<div class="modal fade" id="modalCita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Solo puedes tener una cita activa. 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal aviso borrado-->
<div class="modal fade" id="avisoBorrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">	 	
        ¿Seguro que quieres borrar la cita?
      </div>
      <div class="modal-footer">
	 	<a style="color: white;" class="a b" href="index.php?mod=Panel&ope=delete"> borrar</a>
		<a class="csesion a"  data-dismiss="modal" href=""> CerraR</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal UPDATE-->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR DESCRIPCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php foreach ($cita as $item) : ?>
      <form action="index.php" method="get">
        <input id="mod" name="mod" type="hidden" value="Panel"/>
        <input id="ope" name="ope" type="hidden" value ="update"/>
        <input id="id" name="id" type="hidden" value="<?= $item->getId() ?>" /><br>
        <h2 class="divpanel">descripción</h2><br>
        <textarea id="texto" name="texto" class="area" autofocus><?= $item->getTitle() ?></textarea><br>
       
      <?php endforeach; ?>
    <br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Editar cita</button> 
        <button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Cancelar</button> 
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