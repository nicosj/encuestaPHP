<?php

class installModel{

    private $db;


    public function __construct(){
        $this->db = new Database();

    }

    public function createConection($data){
        $dato=$data["dbname"];
        $file = "<?php
                 define('DB_HOST', '".$data["host"]."');
                 define('DB_USER', '".$data["dbuser"]."');
                 define('DB_PASS', '".$data["pass"]."');
                 define('DB_NAME', '".$data["dbname"]."');
                 ?>";

        file_put_contents('./config/config.php', $file);

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

        if($this->db->query($sql) === TRUE) {
            $this->db->execute();
            return true;
        }

        return false;

    }
 /*   public function createModelTable($data="zxzxzx"){


    }*/



}