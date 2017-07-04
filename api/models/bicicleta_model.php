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


    public function getDataBicicletaRecorrido($id,$fecha){
        //echo "Aca le paso al modelo ".$fecha;

        $this->query = "SELECT * FROM recorridos WHERE fecha = '$fecha' and bicicleta_idbicicleta = '$id'";
        $this->get_results_from_query();
        return $this->rows;
        
    }

}