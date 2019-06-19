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
    <script src="js/sumitPanelAdmin.js"></script>
    <script src="js/textDesc.js"></script>

    
    <title>Panel Admin</title>
</head>
<body>
    <div class="wrapper-panelAdmin">
      <div class="cesion">
        <a class="csesion a z" href="index.php?mod=Usuario&ope=Csesion" > Cerrar sesión</a>
      </div>
        <div class="wrapper-container">
            <div class ="todaCitas">
                <h1 class="usu">Citas Pendientes</h1>
                <?php foreach ($eventos as $item) : ?>
                    <div style="padding-bottom:10px;">
                        <?=$item->getDay(); ?>-<?=$item->getMonth(); ?>-<?=$item->getYear(); ?> - <?=$item->getHour(); ?>:<?=$item->getMinute(); ?> - <?=$item->getNombreU(); ?> <?=$item->getApellido(); ?> - <?=$item->getProyecto(); ?>
                        - <a data-toggle="modal" style="color:rgb(35, 114, 241)" data-target="#modalDescripcion" class="fas fa-info-circle icono" onClick="textDesc(<?= $id = $item->getId()?>)" title="DESCRIPCION"></a><br>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class ="todaCitas">
                <h1 class="usu">Usuarios<a class="fas fa-plus-square icono" href="index.php?mod=Usuario&ope=registro" title="AGREGAR USUARIO"></a></h1>
                <?php foreach ($usuarios as $ite) : ?>
                    <div style="padding-bottom:10px;">
                    <?=$ite->getNombre(); ?> <?=$ite->getApellidos(); ?> | <?=$ite->getEmail(); ?> <?=$ite->getDni(); ?> 
                        - <a class="fas fa-trash icono" href="index.php?mod=Panel&ope=deleteUsu&idUsu=<?= $ite->getId()?>" title="BORRAR USUARIO"></a><br>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class ="todaCitas">
                <h1 class="usu">Proyectos <a data-toggle="modal" data-target="#modalAñadirProyecto" class="fas fa-plus-square icono" href="" title="AGREGAR PROYECTOS"></a></h1>
                <div class="tablones">
                    <?php foreach ($allProyectos as $item) : ?>
                        <div style="padding-bottom:10px;">
                        <?=$item->getNombreProyecto(); ?>
                            - <a class="fas fa-trash icono" href="index.php?mod=Panel&ope=deleteProy&idProy=<?= $item->getIdProyecto()?>" title="BORRAR PROYECTO"></a><br>
                            <?php $id = $item->getIdProyecto()?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class ="todaCitas">
                <h1 class="usu">Profesores <a data-toggle="modal" data-target="#modalAñadirProfesor" class="fas fa-plus-square icono" href="" title="AGREGAR PROFESOR"></a><br></h1>
                <div class="tablones">
                    <?php foreach ($allProfesores as $item) : ?>
                        <div style="padding-bottom:10px;">
                        <?=$item->getNombrePro(); ?> <?=$item->getApellidosPro(); ?>
                            - <a class="fas fa-trash icono" href="index.php?mod=Panel&ope=deleteProf&idProf=<?= $item->getIdProfesor()?>" title="BORRAR PROFESOR"></a><br>
                            <?php $id = $item->getIdProfesor()?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class ="todaCitas">
                <h1 class="usu">Proytecto - Profesor <a data-toggle="modal" data-target="#modalProPro" class="fas fa-plus-square icono" href="" title="AGREGAR PROFESOR"></a><br></h1>
                <div class="tablones">
                    <?php foreach ($allProPro as $item) : ?>
                        <div style="padding-bottom:10px;">
                        <?=$item->getNombreProy(); ?> - <?=$item->getNombreProf(); ?> <?=$item->getApellidoProf(); ?>
                            - <a class="fas fa-trash icono" href="index.php?mod=Panel&ope=deleteProPro&idProPro=<?= $item->getIdProPro()?>" title="BORRAR RELACIÓN"></a><br>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
        </div>
        
    </div>




<!-- Modal descripción-->
<div class="modal fade" id="modalDescripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DESCRIPCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2 class="divpanel">descripción</h2><br>
        <div class="textArea" id="textArea">
          <span></span>
        </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL AÑADIR PROYECTO -->
<div class="modal fade" id="modalAñadirProyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR PROYECTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="">
            <div class="fecha">
                <label>Nombre proyecto</label>
                <input class="field imput" type="text" name="nombreProyecto" id="nombreProyecto"><br>
            </div> 
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" onClick="ajaxSubmit(1)">Registrar</button> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL AÑADIR PROFESOR -->
<div class="modal fade" id="modalAñadirProfesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR PROFESOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method=""> 
            <div class="fecha">
                <label>Nombre</label>
                <input class="field imput" type="text" name="nombreProfesor" id="nombreProfesor"><br>
            </div> 
            <div class="fecha">
                <label>Apellidos</label>
                <input class="field imput" type="text" name="apelledidoProfesor" id="apelledidoProfesor"><br>
            </div> 
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" onClick="ajaxSubmit(2)">Registrar</button> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PROFESOR PPROYECTO -->
<div class="modal fade" id="modalProPro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PROYECTO - PROFESOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="GET"> 
          <select id="idProy" name="idProy">
            <?php foreach ($allProyectos as $item) : ?>
              <option value="<?= $item->getIdProyecto();?>"> <?= $item->getNombreProyecto();?> </option>
            <?php endforeach;?>
          </select>
          <select id="idProf" name="idProf">
            <?php foreach ($allProfesores as $item) : ?>
              <option value="<?= $item->getIdProfesor();?>"> <?= $item->getNombrePro();?> <?= $item->getApellidosPro();?> </option>
            <?php endforeach;?>
          </select>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" onClick="ajaxSubmit(3)">Registrar</button> 
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
        ¿Seguro que quieres borrar ?
      </div>
      <div class="modal-footer">
	 	<a style="color: white;" class="a b" href=""> borrar</a>
		<a class="csesion a"  data-dismiss="modal" href=""> Cerrar</a>
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