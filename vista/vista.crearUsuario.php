<!DOCTYPE html>
<html>
<head>
	<title>CREAR USUARIO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
<div class="wrapper-login">	
<div class="divcentral">
<h2 class="titulo">Formulario de registro</h2>
	<form action="index.php" method="GET">
		<input type="hidden" name="mod" value="Usuario">
		<input type="hidden" name="ope" value="registro">

		
		<div class="usu">
			<label>Nombre:</label>
			<input class="field" type="text" name="nombre" autofocus required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"><br>
		</div>

		<div class="usu">
			<label>apellidos:</label>
			<input class="field" type="text" name="apellidos" requiredcpattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}"><br>
		</div>

		<div class="usu">
			<label>email:</label>
			<input class="field" type="text" name="email" required placeholder="example@example.algo" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"><br>
		</div>

		<div class="usu">
			<label>Usuario:</label>
			<input class="field" type="text" name="usu" required pattern="^([A-Za-z]+[0-9]{0,2}){5,12}$"><br>
		</div>

		<div class="usu">
			<label>Contraseña: </label>
			<input class="field" type="password" name="contraseña" required minleng="4" pattern="[0-9]{4,4}" title="(PIN de 4 digitos)" size="6"><br>
		</div>

		<div class="usu">
			<label>dni:</label>
			<input class="field" type="text" name="dni" required placeholder="0000000A" pattern="[0-9]{8}[A-Za-z]{1}" size="10"><br>
		</div>




	<div class="submit"><button type="submit">Registrar</button> </div>	
	</form>
</div>
</div>
</body>
</html>