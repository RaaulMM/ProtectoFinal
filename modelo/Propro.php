<?php  
		
	require_once "Database.php" ;

class propro {

        private $idProfesor ;
        private $nombrePro ;
        private $apellidosPro ;
        
        Private $idProyecto ;
        Private $nombreProyecto ;

        private $idProPro ;
        private $idProy ;
        private $idProf ;

        private $nombreProy;
        private $nombreProf;
        private $apellidoProf;

        
        



		public function __contruct(){

        }

        //SETTER
        public function setIdProfesor($idProfesor){$this->idProfesor = $idProfesor ;}
        public function setNombrePro($nombrePro){$this->nombrePro = $nombrePro ;}
        public function setApellidosPro($apellidosPro){$this->apellidosPro = $apellidosPro ;}

        public function setIdProPro($idProPro){$this->idProPro = $idProPro ;}
        public function setNombreProyecto($nombreProyecto){$this->nombreProyecto = $nombreProyecto ;}
        
        public function setIdProyecto($idProyecto){$this->idProyecto = $idProyecto ;}
        public function setIdProy($idProy){$this->idProy = $idProy ;}
        public function setIdProf($idProf){$this->idProf = $idProf ;}  
        
        public function setNombreProy($nombreProy){$this->nombreProy = $nombreProy ;}
        public function setNombreProf($nombreProf){$this->nombreProf = $nombreProf ;}
        public function setApellidoProf($apellidoProf){$this->apellidoProf = $apellidoProf ;} 
        
        //GETTER
		public function getIdProfesor() {return $this->idProfesor ;}
        public function getNombrePro() {return $this->nombrePro ;}
        public function getApellidosPro() {return $this->apellidosPro ;}
       
        public function getIdProyecto() {return $this->idProyecto ;}
        public function getNombreProyecto() {return $this->nombreProyecto ;}

        public function getIdProPro() {return $this->idProPro ;}
        public function getIdProy() {return $this->idProy ;}
        public function getIdProf() {return $this->idProf ;}

        public function getNombreProy() {return $this->nombreProy ;}
        public function getNombreProf() {return $this->nombreProf ;}
        public function getApellidoProf() {return $this->apellidoProf ;}


        public function allProfesores(){
			$db = Database::getInstance() ;
			$db->doQuery("SELECT p.id as idProfesor, p.nombre as nombrePro, p.apellidos as apellidosPro FROM profesor p;");
			
			$allProfesores = [] ;

			while ($item = $db->getRow("propro")):
				array_push($allProfesores, $item) ;
			endwhile ;

			//
			return $allProfesores ;
        }
        public function allProyectos(){
			$db = Database::getInstance() ;
			$db->doQuery("SELECT py.id as idProyecto, py.nombre as nombreProyecto FROM proyecto py;");
			
			$allProyectos= [] ;

			while ($item = $db->getRow("propro")):
				array_push($allProyectos, $item) ;
			endwhile ;

			//
			return $allProyectos ;
        }
        public function allProPro(){
			$db = Database::getInstance() ;
			$db->doQuery("SELECT pp.idPro_Pro as idProPro, pf.nombre as nombreProf, pf.apellidos as apellidoProf ,py.nombre as nombreProy FROM pro_pro pp LEFT JOIN profesor pf ON pp.idProfesor = pf.id LEFT JOIN proyecto py ON pp.idProyecto = py.id");
			
			$allProPro= [] ;

			while ($item = $db->getRow("propro")):
				array_push($allProPro, $item) ;
			endwhile ;

			//
			return $allProPro ;
        }
        public function registroPro($nombre){
            $db = Database::getInstance() ;
            $db->doQuery("INSERT INTO proyecto (id, nombre) VALUES (NULL, :nombre)",[":nombre"=> $nombre]);

        }

        public function registroProfesor($nombre,$apellido){
            $db = Database::getInstance() ;
            $db->doQuery("INSERT INTO profesor (id, nombre, apellidos) VALUES (NULL, :nombre, :apellido)",[":nombre"=> $nombre, ":apellido"=>$apellido]);

        }
        public function registroProPro($idProy,$idProf){
            $db = Database::getInstance() ;
            $db->doQuery("INSERT INTO pro_pro (idPro_Pro, idProyecto, idProfesor) VALUES (NULL, :idProy, :idProf)",[":idProy"=> $idProy, ":idProf"=>$idProf]);

        }

        public function deleteProye($idProy){
            $db = Database::getInstance() ;
            $db->doQuery("DELETE FROM proyecto WHERE id = :id;",[":id"=> $idProy]);
        }
        public function deleteProfe($idP){
            $db = Database::getInstance() ;
            $db->doQuery("DELETE FROM profesor WHERE id = :id;",[":id"=> $idP]);
        }

        public function deleteUsu($idU){
            $db = Database::getInstance() ;
            $db->doQuery("DELETE FROM usuario WHERE idUsu = :id;",[":id"=> $idU]);
        }

        public function deleteProPro($idProPro){
            $db = Database::getInstance() ;
            $db->doQuery("DELETE FROM pro_pro WHERE idPro_Pro = :id;",[":id"=> $idProPro]);
        }

        


        
    }