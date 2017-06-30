<?php

/*
*@Api : Ecobicix
* Modelo Bicicletas
*/

require_once './config/database.mysql.php';

class Bicicleta_model extends DatabaseMysqlConfig{

    public $mensajes;


    public function getDataBicicletas(){
        $this->query = "SELECT * FROM bicicletas";
        $this->get_results_from_query();
        return $this->rows;
    }

}