<?php
/*
*@Api : Ecobicix
* Controller Usuario
*/

require_once "./models/usuario_model.php";

class Usuarios_controller extends Usuario_model{


    public function getUsuarios(){
        print_r(json_encode($this->getDataUsers()));
    }

}
