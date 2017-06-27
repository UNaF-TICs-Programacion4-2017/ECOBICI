<?php
/*
* Api Ecobicix
* @Version : 0.1.1
*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';
//framework
$error_404 = new \Slim\Container();
$app = new \Slim\App($error_404);


//controllers
require "controllers/usuarios_controller.php";
$usuarios = new Usuarios_controller();


//Configuro el error 404, en caso que no encuentre
$error_404['notFoundHandler'] = function ($error_404) {
    return function ($request, $response) use ($error_404) {
        $mensaje = Array('Status'=>404,'Mensaje'=>'Recurso no existe.');
        return $error_404['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode($mensaje));
    };
};



//Metdhod Get
$app->get('/',function(Request $request,Response $response){

  $data = array('api' => 'Ecobicix', 'version' => "0.1.1","Grupo"=>"Tacuara","Provincia"=>"Formosa","Facultad"=>"FAEN");
  $response->write(json_encode($data));

});


$app->get('/usuarios', function (Request $request, Response $response) use($app,$usuarios) {
    $usuarios->getUsuarios();
});

$app->get('/usuarios/{iduser}', function (Request $request, Response $response) {
    $iduser = $request->getAttribute('iduser');

});



$app->get('/bicicletas', function (Request $request, Response $response) {
    echo "Bicis";

});



$app->get('/bicicletas/{id}', function (Request $request, Response $response) {

    $id      = $request->getAttribute('id');


});








$app->get('/usuarios/{iduser}/bicicleta/{idbicicleta}', function (Request $request, Response $response) {
    $iduser = $request->getAttribute('iduser');
    $idbicicleta = $request->getAttribute('idbicicleta');

    $response->getBody()->write("Usuario , $iduser");
    $response->getBody()->write("Bicicleta , $idbicicleta");

    return $response;
});


$app->run();
