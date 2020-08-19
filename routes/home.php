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

$router->get('/hash', function($req,$res){
	return password_hash('stanlee', PASSWORD_BCRYPT);
});

?>