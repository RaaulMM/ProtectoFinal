<!DOCTYPE html>
<html lang="es">
<head>
	<title>Usuarios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/css.css">
</head>
 

<body>
	
<?php 

	?>

	<h1>Usuarios</h1>

	<h3>
		<a href="index.php?mod=Usuario&ope=registro"> Crear Usuario</a>
	</h3>

	<ul>
		<?php 
		
		foreach ($datos as $item) :
		?>
		<li>
			<?= $item->getNombre(); ?> - [
			
			<a href="">editar</a> |
			<a href="index.php?mod=Usuario&ope=delete&idUsu">borrar</a> ]

		</li>
		<?php
			endforeach;
		?>
	</ul>
</body>
</html>