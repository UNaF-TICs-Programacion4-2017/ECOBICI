<?php
/*
*@Api : Ecobicix
* Controller Bicicletas
*/


require_once "./models/bicicleta_model.php";

class Bicicletas_controller extends Bicicleta_model{

    public $mensaje;
    private $total_registros;

    public function getBicicletas(){
        print_r(json_encode($this->getDataBicicletas()));
    }


    public function getBicicletaRecorrido($id,$fecha){        
        print_r(json_encode($this->getDataBicicletaRecorrido($id,$fecha)));
    }

}
