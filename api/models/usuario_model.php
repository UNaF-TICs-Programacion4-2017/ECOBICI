<?php
/*
*@Api : Ecobicix
* Modelo Usuario
*/


require_once './config/database.mysql.php';

class Usuario_model extends DatabaseMysqlConfig{

    public $mensaje;

    //todos los usuarios registrados
    public function getDataUsers(){
      $this->query = 'select * from usuarios';
      $this->get_results_from_query();
      return $this->rows;
    }

    //Un usuario especifico ID
    public function getDataUserId($idUsuario){
        $this->query = "SELECT     persona.nombre,persona.apellido,persona.direccion,usuarios.usuarios,usuarios.idusuarios,usuarios.profile_photo
                        FROM       usuarios_personas
                        INNER JOIN usuarios ON usuarios.idusuarios = usuarios_personas.usuarios_idusuarios
                        INNER JOIN persona ON persona.idpersona    = usuarios_personas.persona_idpersona
                        WHERE      usuarios_personas.usuarios_idusuarios = '$idUsuario'";
        $this->get_results_from_query();

        if(count($this->rows) ==2){
          print_r(json_encode($this->rows));
        }else{
          print_r(json_encode(Array("Mensaje"=>"No existe el usuario con el id ".$idUsuario)));
        }
    }

}