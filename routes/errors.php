<?php

/** ===== No View Route Example ===== **/
/** ================================= **/

$router->get('/no-view', function($req,$res){
	$res->render('view', array(
		'title' => 'no-view',
		'css' => array(
			'assets/css/bootstrap.min.css',
		),
		'js' => array(
			'assets/js/bootstrap.bundle.min.js',
			'assets/js/jquery-3.5.0.min.js',
		)
	));
});

/** ===== No Template Route Example ===== **/
/** ===================================== **/

$router->get('/no-layout', function($req,$res){
	$res->render('view', array(
		'title' => 'no-layout',
		'layout' => 'layout',
		'css' => array(
			'assets/css/bootstrap.min.css',
		),
		'js' => array(
			'assets/js/bootstrap.bundle.min.js',
			'assets/js/jquery-3.5.0.min.js',
		)
	));
});

?>