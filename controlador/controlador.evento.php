<?php 
	require_once "modelo/Database.php";
    require_once "modelo/Evento.php";

  class controladorEvento{


  	public function __construct(){
 
    }


	public function index(){

	}

	public function registro(){



		if (isset($_GET["txtDescripcion"])):

		$usu = new evento();
		$usu->setTitle($_GET["txtDescripcion"]) ;
		$usu->setColor($_GET["color"]) ;
		$usu->setStartFecha($_GET["txtFechaInicio"]) ;
		$usu->setEnde($_GET["txtFechaFinal"]) ;
		$usu->setIdUsu($_GET["idUsu"]) ;
		$usu->setIdProyecto($_GET["idPro"]) ;

		$usu->insert() ;

		header("Location: index.php?mod=Panel&ope=index" );

		print_r($_GET["txtFechaInicio"]);
		print_r($_GET["txtFechaFinal"]);
		else:
		require_once "vista/calendario.php" ;
		endif ;
	}
	public function listaEve(){
            $micita = Evento::miCita() ;
            require_once "vista/vista.ListaUsuario.php" ;
        
	}
	
  }


?>