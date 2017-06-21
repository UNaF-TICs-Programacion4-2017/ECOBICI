<?php
/*
* Api Ecobicix
* @Version : 0.1.1
*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';



$error_404 = new \Slim\Container();


//Configuro el error 404, en caso que no encuentre
$error_404['notFoundHandler'] = function ($error_404) {
    return function ($request, $response) use ($error_404) {
        $mensaje = Array('Status'=>404,'Mensaje'=>'Recurso no existe');
        return $error_404['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode($mensaje));
    };
};




$app = new \Slim\App($error_404);
$db  = new PDO('mysql:host=localhost;dbname=prueba;charset=utf8','root',''); //Conexion con PDO


//Metdhod Get
$app->get('/',function(Request $request,Response $response){

  $data = array('api' => 'Ecobicix', 'version' => "0.1.1","Grupo"=>"Tacuara","Provincia"=>"Formosa","Facultad"=>"FAEN");
  $response->write(json_encode($data));

});


$app->get('/bicicletas', function (Request $request, Response $response) use($app,$db) {
    $dbquery = $db->prepare("SELECT * FROM bicicleta");
    $dbquery->execute();
    $datos = Array("Bicicletas"=>$dbquery->fetchAll(PDO::FETCH_ASSOC));
    print_r(json_encode($datos));

});



$app->get('/bicicletas/{id}', function (Request $request, Response $response) use($app,$db) {

    $id      = $request->getAttribute('id');
    $dbquery = $db->prepare("SELECT * FROM bicicleta WHERE id=$id");
    $dbquery->execute();
    $datos   = Array("Bicicleta"=>$dbquery->fetchAll(PDO::FETCH_ASSOC));
    
    if($dbquery->rowCount()){
        print_r(json_encode($datos));
    }else{
        $mensaje = Array("Mensaje"=>"No existe el registro solicitado");
        print_r(json_encode($mensaje));
    }

});



$app->get('/usuarios/{iduser}', function (Request $request, Response $response) {
    $iduser = $request->getAttribute('iduser');
    $dbquery = $db->prepare("SELECT * FROM usuario WHERE id=$iduser");
    $dbquery->execute();
    $datos   = Array("Usuario"=>$dbquery->fetchAll(PDO::FETCH_ASSOC));
    
    if($dbquery->rowCount()){
        print_r(json_encode($datos));
    }else{
        $mensaje = Array("Mensaje"=>"No existe el registro solicitado");
        print_r(json_encode($mensaje));
    }
});




$app->get('/usuarios/{iduser}/bicicleta/{idbicicleta}', function (Request $request, Response $response) {
    $iduser = $request->getAttribute('iduser');
    $idbicicleta = $request->getAttribute('idbicicleta');

    $response->getBody()->write("Usuario , $iduser");
    $response->getBody()->write("Bicicleta , $idbicicleta");

    return $response;
});


//Metdhod Post

$app->run();

