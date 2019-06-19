<?php 

	require_once "Database.php" ;
	/**
	 * 
	 */
	class panel{

        private $id;
		private $title;
		private $color;
		private $start;
		private $end;
		private $idUsu;
		private $proyecto;
        private $nombreU;
        private $apellido;
        private $hour;
        private $minute;
        private $month;
        private $year;
        private $day;
        private $hoy;

        private $descripcion ;
        


        //SETTER
		public function setId($id){$this->id = $id ;}
		public function setTitle($title){$this->title = $title ;}
		public function setColor($color){$this->color = $color ;}
		public function setStart($start){$this->start = $start ;}
		public function setEnd($end){$this->end = $end ;}
		public function setIdUsu($idUsu){$this->idUsu = $idUsu ;}
		public function setProyecto($idProyecto){$this->proyecto = $proyecto ;}
        public function setNombreU($nombreU){$this->nombreU = $nombreU ;}
        public function setApellido($apellido){$this->apellido = $apellido ;}
        public function setHour($hour){$this->hour = $hour ;}
        public function setMinute($minute){$this->minute = $minute ;}
        public function setMonth($month){$this->month = $month ;}
        public function setYear($year){$this->year = $year ;}
        public function setDay($day){$this->dai = $day ;}
        public function setDescripcion($descripcionay){$this->descripcion = $descripcion ;}
       
        
		//GETTER
		public function getId () {return $this->id ;}
		public function getTitle () {return $this->title ;}
		public function getColor () {return $this->color ;}
		public function getStart () {return $this->start;}
		public function getEnd () {return $this->end ;}
		public function getIdUsu () {return $this->idUsu ;}
		public function getProyecto () {return $this->proyecto ;}
        public function getNombreU () {return $this->nombreU ;}
        public function getApellido(){return $this->apellido ;}
        public function getHour(){$hour =  date("H", strtotime($this->start)); return $hour;}
        public function getMinute(){$minute =  date("i", strtotime($this->start)); return $minute;}
        public function getMonth(){$month =  date("m", strtotime($this->start)); return $month;}
        public function getYear(){$Year =  date("Y", strtotime($this->start)); return $Year;}
        public function getDay(){$day =  date("d", strtotime($this->start)); return $day;}

        public function getDescripcion () {return $this->descripcion ;}

        public function miCita($usuairo){
            $db = Database::getInstance() ;
            $db->doQuery( "SELECT e.id, u.nombre, u.idUsu, e.start, e.title FROM eventos e 
            inner JOIN usuario u ON e.idUsu = u.idUsu
            WHERE e.end > now() and u.usu =:idt ;",
                [":idt"=>$usuairo]) ;
            $cita = [] ;

            while ($item = $db->getRow("panel")):
                array_push($cita, $item) ;
            endwhile ;

            return $cita ;
                
            }
        public function delete($usuairo){
            $db = Database::getInstance() ;
            $db->doQuery( "DELETE e FROM eventos e 
            inner JOIN usuario u ON e.idUsu = u.idUsu
            WHERE e.end > now() and u.usu =:idt ;",
                [":idt"=>$usuairo]) ;
        }

        public function update($id,$text){
            $db = Database::getInstance() ;
            $db->doQuery( "UPDATE eventos e SET title= :text WHERE e.id = :ide;",
                [":ide"=>$id,
                 ":text" =>$text]) ;
        }

        public function eventos(){
            $db = Database::getInstance() ;
            $db->doQuery(" SELECT e.id, e.start, u.nombre as nombreU, u.apellidos as apellido, p.nombre as proyecto FROM eventos e LEFT JOIN usuario u ON e.idUsu = u.idUsu LEFT JOIN pro_pro pp ON e.idPro = pp.idPro_Pro LEFT JOIN proyecto p ON pp.idProyecto = p.id WHERE e.end > now() AND u.tipo = 2 ORDER BY e.start");
            
            $eventos = [] ;

            while ($item = $db->getRow("panel")):
                array_push($eventos, $item) ;
            endwhile ;

            return $eventos ;
        }

        public function descripcion($id){
            $db = Database::getInstance() ;
            $db->doQuery("SELECT e.title FROM eventos e where id = :idt",[":idt"=> $id]);
            
            $descripcion = [] ;

            while ($item = $db->getRow("panel")):
                array_push($descripcion, $item) ;
            endwhile ;

            return $descripcion ;
        }
        

}