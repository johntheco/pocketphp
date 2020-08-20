<?php

require_once(ROOT . '/middleware/auth.php');
require_once(ROOT . '/middleware/admin/auth.php');



/** ===== Home Page Routes ===== **/
/** ============================ **/

$router->get('/', function($req,$res){

	$userauth = UserAuthMiddleware();

	$res->render('home', array(
		'title' => 'Home',
		'userauth' => $userauth,
		'adminauth' => $adminauth,
		'css' => array(
			'assets/css/bootstrap.min.css',
			'assets/css/home.css',
		),
		'js' => array(
			'assets/js/jquery-3.5.0.min.js',
			'assets/js/bootstrap.bundle.min.js',
		)
	));
});

$router->get('/home', function($req,$res){
	header('Location: /');
});



/** ===== Login Page Routes ===== **/
/** ============================= **/

$router->get('/login', function($req,$res){

	$userauth = UserAuthMiddleware('/home');

	$res->render('login', array(
		'title' => 'Login',
		'css' => array(
			'assets/css/bootstrap.min.css',
			'assets/css/login.css',
		),
		'js' => array(
			'assets/js/jquery-3.5.0.min.js',
			'assets/js/bootstrap.bundle.min.js',
		)
	));
});

$router->post('/login', function($req,$res){
	require_once(ROOT . '/controllers/login.php');
});



/** ===== Register Page Routes ===== **/
/** ================================ **/

$router->get('/register', function($req,$res){

	$userauth = UserAuthMiddleware('/home');

	$res->render('register', array(
		'title' => 'Register',
		'css' => array(
			'assets/css/bootstrap.min.css',
			'assets/css/register.css',
		),
		'js' => array(
			'assets/js/jquery-3.5.0.min.js',
			'assets/js/bootstrap.bundle.min.js',
		)
	));
});

$router->post('/register', function($req,$res){
	require_once(ROOT . '/controllers/register.php');
});



/** ===== Logout Route ===== **/
/** ======================== **/

$router->get('/logout', function($req,$res){
	require_once(ROOT . '/controllers/logout.php');
});



/** ===== User Profile Routes ===== **/
/** =============================== **/

$router->get('/profile', function($req,$res){

	$userauth = UserAuthMiddleware();

	$res->render('profile', array(
		'title' => 'Profile',
		'userauth' => $userauth,
		'adminauth' => $adminauth,
		'css' => array(
			'assets/css/bootstrap.min.css',
			'assets/css/profile.css',
		),
		'js' => array(
			'assets/js/jquery-3.5.0.min.js',
			'assets/js/bootstrap.bundle.min.js',
		)
	));
});

$router->post('/profile', function($req,$res){
	
});



/** ===== PHP Info ===== **/
/** ==================== **/

$router->get('/phpinfo', function($req,$res){
	phpinfo();
});

?>