<?php


class resultadoModel
{
    private $db;
    private $encuesta;

    public function __construct(){
        $this->db = new Database();

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
    public function get_sexo()
    {
        $sql="Select count(sexo) * 100 /(select count(*) from encuestas) as total from encuestas GROUP BY sexo ";
        $this->db->query($sql);

        return  $this->db->resultSet();
    }
    public function get_nombre()
    {
        $sql="Select nombre ,count(nombre) as total from encuestas GROUP BY nombre ";
        $this->db->query($sql);

        return  $this->db->resultSet();
    }
    public function get_actividad()
    {
        $sql="Select count(hobby) * 100 / (select count(*) from hobbys) as total from hobbys GROUP BY hobby ";
        $this->db->query($sql);

        return  $this->db->resultSet();
    }
    public function get_horas()
    {

        $sql="Select hobby, sum(horas) as total from hobbys group by hobby ";
        $this->db->query($sql);

        return  $this->db->resultSet();
    }


}