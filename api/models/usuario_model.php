<?php
/*
*@Api : Ecobicix
* Model Usuario
*/


require_once './config/database.mysql.php';

class Usuario_model extends DatabaseMysqlConfig{

    public $mensaje;

    public function getDataUsers(){
      $this->query = 'select * from usuarios';
      $this->get_results_from_query();
      return $this->rows;
    }

}
