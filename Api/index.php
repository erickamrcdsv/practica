<?php
//incluimos redbean
require_once 'rb.php';
R::setup('mysql:host=localhost;dbname=examen;charset=utf8', 'root', '1234');
R::freeze(true);

//incluimos el framework slim
require_once 'vendor/autoload.php';

//creamos la aplicacion
$app = new \Slim\Slim();

//funcion get
$app->get('/', function() use($app){
	$app->render('contacto.php');
});
//funcion post
$app->post('/', function() use($app){
	$app->render('contacto.php');
	$request = $app->request;
	$nombre = $request->post('nombre');
	$correo = $request->post('correo');
	$comentario = $request->post('comentario');
	
	//insertamos datos a la tabla contactos
	$contactos = R::dispense('contactos');
	$contactos->nombre= $nombre;
	$contactos->email= $correo;
	$contactos->comentario = $comentario;
	$id = R::store($contactos);
	echo $id;
});

//correr la aplicacion
$app->run();