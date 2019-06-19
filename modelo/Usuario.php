<?php  
		
	require_once "Database.php" ;

class Usuario {

		private $idUsu ;
		private $nombre ;
		private $apellidos ;
		private $email ;
		private $usu ;
		private $contraseña ;
		private $dni ;
		public $tipo;

		private $idPro_Pro ;
		



		public function __contruct(){

		}

		//SETTER
		public function setIdPro($idPro_Pro){$this->idPro_Pro = $idPro_Pro ;}
		public function setId($idUsu){$this->idUsu = $idUsu ;}
		public function setNombre($nombre){$this->nombre = $nombre ;}
		public function setApellidos($apellidos){$this->apellidos = $apellidos ;}
		public function setEmail($email){$this->email = $email ;}
		public function setUsuario($usu){$this->usu = $usu ;}
		public function setContraseña($contraseña){$this->contraseña = $contraseña ;}
		public function setDni($dni){$this->dni = $dni;}
		public function setTipo($tipo){$this->tipo = $tipo;}

		//GETTER
		public function getIdPro_Pro() {return $this->idPro_Pro ;}
		public function getId() {return $this->idUsu ;}
		public function getNombre () {return $this->nombre ;}
		public function getApellidos () {return $this->apellidos ;}
		public function getEmail () {return $this->email ;}
		public function getUsuario () {return $this->usu ;}
		public function getContraseña () {return $this->contraseña ;}
		public function getDni () {return $this->dni ;}
		public function getTipo () {return $this->tipo ;}
		



		//INSERTAR DATOS NUEVOS EN TABLA TABLERO
		public function insert(){
			$db = Database::getInstance() ;
			$db->doQuery("INSERT INTO usuario(nombre,apellidos, email, usu, contraseña, dni) VALUES (:nom, :ape, :ema, :usu, :cont, :dni) ;",
						 [":nom"=>$this->nombre,
						  ":ape"=>$this->apellidos,
						  ":ema"=>$this->email,
						  ":usu"=>$this->usu,
						  ":cont"=>$this->contraseña,
						  ":dni"=>$this->dni,]) ;

			
		}

		public function getAllUsu(){
			$db = Database::getInstance() ;
			$db->doQuery("SELECT * FROM usuario WHERE usu=:usu;",
                                 [":usu" => $_SESSION['usu']]);
			
			$datos = [] ;

			while ($item = $db->getRow("usuario")):
				array_push($datos, $item) ;
			endwhile ;

			//
			return $datos ;
		}
		public function getAllUsus(){
			$db = Database::getInstance() ;
			$db->doQuery("SELECT * FROM usuario");
			
			$datos = [] ;

			while ($item = $db->getRow("usuario")):
				array_push($datos, $item) ;
			endwhile ;

			//
			return $datos ;
		}
		
		public function getAllPro(){
			$db = Database::getInstance() ;
			$db->doQuery("SELECT pp.idPro_Pro, p.nombre FROM pro_pro pp 
						INNER JOIN proyecto p ON pp.idProyecto = p.id");
			
			$datos = [] ;

			while ($item = $db->getRow()):
				array_push($datos, $item) ;
			endwhile ;

			//
			return $datos ;
		}
		public function delete($idUsu){
			$db = Database::getInstance() ;
			$db->doQuery("DELETE FROM usuario WHERE idUsu=:idt ;",
						 [":idt"=>$idUsu]) ;
						   
			
		}
		public function usuarios(){
            $db = Database::getInstance() ;
            $db->doQuery("SELECT * FROM usuario WHERE tipo = 2;");
            
            $usuarios = [] ;

            while ($ite = $db->getRow("usuario")):
                array_push($usuarios, $ite) ;
            endwhile ;

            return $usuarios ;
		}
		public function tipo($usuario){
			$db = Database::getInstance() ;
			$db->doQuery("SELECT tipo FROM usuario WHERE usu = :$usuario;",["$usuario"=>$usuario]);
			
			$tipo ; 
			$tipo = $db->getRow("usuario");

			return $tipo ;
		}

	}


	
?>