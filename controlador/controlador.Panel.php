<?php   
    require_once "modelo/Database.php";
    require_once "modelo/Panel.php";
    require_once "modelo/Evento.php";
    require_once "modelo/Usuario.php";
    require_once "modelo/Propro.php";

    class controladorPanel{

        public function __construct(){
            
        }
        public function index(){
            session_start();
            if((isset($_SESSION['usu']))){
             $usuario = $_SESSION['usu'];
             $tipo = usuario::tipo($usuario);
                if($tipo->getTipo()== "1"){
                    $eventos = panel::eventos() ;
                    $usuarios = usuario::usuarios();
                    $allProfesores = propro::allProfesores();
                    $allProyectos = propro::allProyectos();
                    $allProPro = propro::allProPro();

                    require_once "vista/vista.panelAdmin.php";
                }else{
                    $cita = panel::miCita($usuario) ;
                    require_once "vista/vista.panel.php";}
            }else {
                require_once "vista/index.login.php";}
        }
        
        public function delete(){
            session_start();
            if((isset($_SESSION['usu']))){   
                $usuario = $_SESSION['usu'];

                panel::delete($usuario) ;

                header('Location: index.php?mod=Panel&ope=index');
               }else {
                   require_once "vista/index.login.php";}
        }

        public function update(){
            session_start();
            if((isset($_SESSION['usu']))){
                $usuario = $_SESSION['usu'];
   
                panel::update($_GET["id"], $_GET["texto"]) ;

              
                header('Location: index.php?mod=Panel&ope=index');
               }else {
                   require_once "vista/index.login.php";}
        }
        

        public function indexAdmin(){
            session_start();
            if((isset($_SESSION['usu']))){
             $usuario = $_SESSION['usu'];
                $tipo = usuario::tipo($usuario);

                if($tipo->getTipo()=="1"){
                    $eventos = panel::eventos() ;
                    $usuarios = usuario::usuarios();
                    $allProfesores = propro::allProfesores();
                    $allProyectos = propro::allProyectos();
                    $allProPro = propro::allProPro();
                    

                    require_once "vista/vista.panelAdmin.php";
                }else{
                    $cita = panel::miCita($usuario) ;
                    require_once "vista/vista.panel.php";}
            }else {
                require_once "vista/index.login.php";}
        }

        public function registroPro(){
            $nombre = $_GET["nombreProyecto"];
            propro::registroPro($nombre);
            header('Location:index.php');
        }

        public function registroProfesor(){
            $nombre = $_GET["nombreProfesor"];
            $apellidos = $_GET["apelledidoProfesor"];
            propro::registroProfesor($nombre,$apellidos);

            
            header('Location:index.php');
        }

        public function registroProPro(){
            $idProy = $_GET["idProy"];
            $idProf = $_GET["idProf"];
            propro::registroProPro($idProy,$idProf);

            header('Location:index.php');
        }
        public function deleteProy(){

            $id = $_GET["idProy"];
            propro::deleteProye($id);

            header('Location:index.php');
        }
        public function deleteProf(){

            $id = $_GET["idProf"];
            propro::deleteProfe($id);

            header('Location:index.php');
        }
        public function deleteUsu(){

            $id = $_GET["idUsu"];
            propro::deleteUsu($id);

            header('Location:index.php');
        }
        public function deleteProPro(){
            $id = $_GET["idProPro"];
            propro::deleteProPro($id);

            header('Location:index.php');
        }

        public function textArea(){
            $id = $_GET["idText"];
            $text =  evento::textArea($id);
            
            
            echo "<textarea id='texto' name='texto' class='area' readonly=''>".$text->getTitle()."</textarea>";
        }


        
    }



?>