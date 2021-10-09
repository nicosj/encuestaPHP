<?php
	
	class Encuestamodel {
		
		private $db;


		public function __construct(){
			$this->db = new Database();

		}
		
		public function insertar($data){
		    try{
                $sql="select 1 from encuestas";
                $this->db->query($sql);
                $this->db->execute();
            }catch(Exception $e){
                $sql ="CREATE TABLE IF NOT EXISTS `encuestas` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `nombre` text,
                      `sexo` text,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=690 DEFAULT CHARSET=latin1;
                    CREATE TABLE IF NOT EXISTS `hobbys` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `llave` int(11) NOT NULL DEFAULT '0',
                      `hobby` text,
                      `horas` text NOT NULL,
                      PRIMARY KEY (`id`),
                      KEY `FK_hobbys_encuestas` (`llave`),
                      CONSTRAINT `FK_hobbys_encuestas` FOREIGN KEY (`llave`) REFERENCES `encuestas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                    ) ENGINE=InnoDB AUTO_INCREMENT=895 DEFAULT CHARSET=latin1;";

                $this->db->query($sql) ;
                $this->db->execute();
            }

            try{
                $sql = "INSERT INTO encuestas (nombre, sexo) VALUES (:nombre, :sexo)";
                $this->db->query($sql);
                $this->db->bind(':nombre',$data["nombre"]);
                $this->db->bind(':sexo',$data["sexo"]);
                $this->db->execute();
		        $id=$this->db->lastInsert();
		        if($data["hobby"]!==0){
                    $cont=0;
                    foreach($data["hobby"] as $loco){
                    $sql = "INSERT INTO hobbys (llave,hobby,horas) VALUES (:llave, :hobby,:horas)";
                    $this->db->query($sql);
                    $this->db->bind(':llave',(int)$id);
                    $this->db->bind(':hobby',$loco);
                    $this->db->bind(':horas',$data["caja"][$loco]);
                    $this->db->execute();
                    $cont++;
                    }
		        }else{
                    $sql = "INSERT INTO hobbys (llave,hobby,horas) VALUES (:llave, :hobby,:horas)";
                    $this->db->query($sql);
                    $this->db->bind(':llave',(int)$id);
                    $this->db->bind(':hobby',$data["hobby"]);
                    $this->db->bind(':horas',0);
                     $this->db->execute();
                }
                $sql="Select * from hobbys join encuestas on (hobbys.llave=encuestas.id) where llave=$id";
                $this->db->query($sql);

                return  $this->db->resultSet();
            }catch(PDOException $e){
              echo "Error: ".$e->getMessage();
            }

		}



	}
?>