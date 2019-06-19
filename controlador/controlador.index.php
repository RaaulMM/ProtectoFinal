<?php 
    require_once "modelo/Database.php";
    require_once "modelo/Panel.php";
    require_once "modelo/Evento.php";
    require_once "modelo/Usuario.php";
    require_once "modelo/Propro.php";
class controladorIndex{
 
         public function __construct(){
 
         }
      
         public function index(){
            session_start();
            if((isset($_SESSION['usu']))){
                $usuario = $_SESSION['usu'];
                $tipo = usuario::tipo($usuario);

                if($tipo->getTipo() =="1"){
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
         

         public function indexCalendario(){
            session_start();
            if((isset($_SESSION['usu']))){
                
                $usuario = $_SESSION['usu'];
                $conprobarCita = Panel::miCita($usuario);

                if(empty($conprobarCita)){
                    require_once "vista/calendario.php";
                }else{
                    $cita = panel::miCita($usuario) ;
                    require_once "vista/vista.panel.php";}
                   

                
            }else {
                require_once "vista/index.login.php";}
         }
         	
         

     }

?>