<?php

/** ===== Regexp Route Example ===== **/
/** ================================ **/

$router->get('#^/regexp*(/)*[/a-zA-Z0-9_]*$#', function($req,$res){
	$res->render('regexp', array(
		'title' => 'Regexp Example',
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