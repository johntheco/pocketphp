<?php

/** ===== Home Page Routes ===== **/
/** ============================ **/

$router->get('/', function($req,$res){
	$res->render('home', array(
		'title' => 'Home',
		'css' => 'assets/css/style.css',
		'js' => 'assets/js/jquery-3.5.0.min.js'
	));
});

?>