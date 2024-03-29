<?php
		
     require_once "modelo/Database.php";
     require_once "modelo/Usuario.php";
    
 
     class controladorUsuario{
 
         public function __construct(){
 
         }
      
         public function index(){
            
             session_start();

             if($_SERVER["REQUEST_METHOD"] == "GET") {
                 if (isset($_GET["usu"])){
                     $usu = $_GET["usu"];
                     $contraseña = $_GET["contraseña"];
                 }
                
                 $db = Database::getInstance();
 
                 $db->doQuery("SELECT * FROM usuario WHERE usu=:usu AND contraseña=:cont;",
                                 [":usu" => $usu,
                                  ":cont" =>$contraseña]);
                 $resultado = $db->getRow();
                 $tipo = usuario::tipo($usu);

                 if ($resultado !== false) {
                    $_SESSION['usu'] = $usu;

                    if ($tipo->getTipo() == "1"){
                        header("Location: index.php?mod=Panel&ope=indexAdmin");}
                    else{
                     header("Location: index.php?mod=Panel&ope=index");}
                     
                 }else{
                     require_once "vista/index.login.php";
                     echo "<div class='error'>Usuario o contraseña incorrecto<div>";
                 }
             }
           
         }
 
         public function registro(){

            if (isset($_GET["apellidos"])):

            $usu = new Usuario();
            $usu->setNombre($_GET["nombre"]) ;
            $usu->setApellidos($_GET["apellidos"]) ;
            $usu->setEmail($_GET["email"]) ;
            $usu->setUsuario($_GET["usu"]) ;
            $usu->setContraseña($_GET["contraseña"]) ;
            $usu->setDni($_GET["dni"]) ;
            $usu->insert() ;
            header('Location: index.php?mod=index&ope=index');
        
        else:
            //
            require_once "vista/vista.crearUsuario.php" ;
        endif ;
         }


        public function Listado() {
            $datos = Usuario::getAllUsus() ;
            require_once "vista/vista.ListaUsuario.php" ;
        }
        public function delete(){

        if (isset($_GET["idUsu"])) Usuario::delete($_GET["idUsu"]) ;
            header('Location: index.php?mod=Usuario&ope=Listado');  
        }

        public function Csesion(){
        session_start() ;
        $_SESSION = [] ;
        session_destroy();
        

        header('Location: index.php');

        }
        public function tipoUsu(){
            $usuario = $_SESSION['usu'];

            $tipo = usuario::tipo($usuario) ;
        }


}
 

 ?>