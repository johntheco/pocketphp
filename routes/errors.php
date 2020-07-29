<?php

/** ===== No View Route Example ===== **/
/** ================================= **/

$router->get('/no-view', function($req,$res){
	$res->render('view', array(
		'title' => 'no-view',
		'css' => array('assets/css/style.css'),
		'js' => array('assets/js/jquery-3.5.0.min.js')
	));
});

/** ===== No Template Route Example ===== **/
/** ===================================== **/

$router->get('/no-layout', function($req,$res){
	$res->render('view', array(
		'title' => 'no-layout',
		'layout' => 'layout',
		'css' => array('assets/css/style.css'),
		'js' => array('assets/js/jquery-3.5.0.min.js')
	));
});

?>