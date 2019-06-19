<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="js/jquery.min.js"></script>
	<script src="js/custom.js"></script>
</head>

<body>
<div class="wrapper-login">
	
	<div class="divcentral">

	<img class="imglogo" src="resource/logo2.png" alt="Logo de la Universidad de Málaga" style="height: auto; width: 100%;">

	<h2 class="titulo">BIENVENIDO</h2>
	<form action="index.php" method="get">
		<input type="hidden" name="mod" value="Usuario">
		<input type="hidden" name="ope" value="index">

		<div class="usu">
		<label><i class="fas fa-user"></i></label>
		<input class="field" type="text" name="usu" placeholder="Usuario" autofocus autocomplete="off" required><br>
		</div>

		<div class="pass">
		<label><i class="fas fa-unlock-alt"></i></label>
		<input  class="field" type="password" placeholder="Contraseña" name="contraseña" autocomplete="off" required><br>
		</div>
		<div class="submit"><button type="submit" class="login-btn">ACCEDER</button></div>
	</form>
	<a class="link-new" href="index.php?mod=Usuario&ope=registro"> Crear Nuevo Usuario</a>
	</div>
</div>
</body>
</html>
