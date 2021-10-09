<?php

class ExcelModel
{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function get_persona()
    {
        $sql="Select * from encuestas";
        $this->db->query($sql);

        return  $this->db->resultSet();
    }

    public function get_hobby()
    {
        $sql="Select * from hobbys";
        $this->db->query($sql);

        return  $this->db->resultSet();
    }



}