<?php
/*
*@Api : Ecobicix
*@Descricion Configuracion para Acceso a base de datos
*/
class DatabaseMysqlConfig{

   //atributes
   private   $db_enrivonment = 'localhost';
   private   $db_usuario     = 'root';
   private   $db_password    = '';
   protected $db_database    = 'ecobici';
   protected $query;
   protected $rows = array(); //para los datos obtenidos
   private   $conexion;
   public    $resultados;

   //Conexion con Mysqli
   private function open_conexion(){
      $this->conexion = new mysqli($this->db_enrivonment,$this->db_usuario,$this->db_password,$this->db_database);
   }

   //Desconectar la base de datos
   private function close_conexion() {
       $this->conexion->close();
   }

   //ejecutar consultas query
    protected function execute_single_query(){
        $this->open_conexion();
        $this->conexion->query($this->query);
        $this->close_conexion();
    }


    //traer resultados de una consulta en un array
    protected function get_results_from_query(){
      $this->open_conexion();
      $this->resultados = $this->conexion->query($this->query);
      while($this->rows[] = $this->resultados->fetch_assoc());
      $this->resultados->close();
      $this->close_conexion();
      array_pop($this->rows);
    }

}
