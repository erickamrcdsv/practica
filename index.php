<?php

//incluimos el framework slim
require_once 'vendor/autoload.php';

//redbean orm config
require 'rb.php';

R::setup('mysql:host=localhost;dbname=examen', 'root', '1234');
R::freeze(false);

//slim framework
$app = new \Slim\Slim();

//funcion get
$app->get('/', function() use($app){
	$app->render('index.html');
});

//funcion post
$app->post('/contacto.php', function() use($app){
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