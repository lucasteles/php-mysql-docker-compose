<?php

	require 'Slim/Slim.php';
	require "lib/factory.php";

	Slim\Slim::registerAutoloader();

	$app = new \Slim\Slim(array(
		'debug' => true
	));

	$app->response->headers->set('Content-Type', 'application/javascript');

	$service = Factory::GetServiceImplementation();

	$app->get('/', function() use ($app) {
		print "Hello fruits";
	});


	// Agrupamento de funções da API
	$app->group('/api', function () use ($app, $service) {
		$app->get('/getList/', function() use ($app, $service) {
			$service->GetList();
		});
		$app->get('/getList/:id', function($id) use ($app, $service) {
			$service->GetFruit($id);
		});
	});



	$app->run();

?>
