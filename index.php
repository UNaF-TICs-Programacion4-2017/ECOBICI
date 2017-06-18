<?php
/*
* Api Ecobicix
* @Version : 0.0.1
*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;



//Metdhod Get
$app->get('/',function(Request $request,Response $response){
  $data = array('api' => 'Ecobicix', 'version' => "0.1.1","Grupo"=>"Tacuara","Provincia"=>"Formosa","Facultad"=>"FAEN");
  $response->write(json_encode($data));
});


$app->get('/bicicleta', function (Request $request, Response $response) {
    $response->getBody()->write("Nos permite acceder al listado de las bicicletas registradas");
    return $response;
});

$app->get('/bicicleta/{id}', function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
    $response->getBody()->write("Nos permite acceder a una bicicleta especifica , $id");

    return $response;
});

$app->get('/usuario/{iduser}', function (Request $request, Response $response) {
    $iduser = $request->getAttribute('iduser');
    $response->getBody()->write("Accedemos a los datos de un usuario , $iduser");

    return $response;
});

$app->get('/usuario/{iduser}/bicicleta/{idbicicleta}', function (Request $request, Response $response) {
    $iduser = $request->getAttribute('iduser');
    $idbicicleta = $request->getAttribute('idbicicleta');

    $response->getBody()->write("Usuario , $iduser");
    $response->getBody()->write("Bicicleta , $idbicicleta");

    return $response;
});


//Metdhod Post

$app->run();
