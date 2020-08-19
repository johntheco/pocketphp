<?php

// Requiring middleware for administration routes.
require(ROOT . '/middleware/admin/auth.php');


/** ===== Root Page Routes ===== **/
/** ============================ **/

$router->get('/admin', function($req,$res){

    // Check if user has all cookies required...
    // If he is - then we'll redirect him to
    // the `success route` - /admin/dashboard.
    // 
    // In other way - he'll be redirected to
    // the login page by middleware itself.
    AdminAuthMiddleware('/admin/dashboard');

});



/** ===== Dashboard Page Routes ===== **/
/** ================================= **/

$router->get('/admin/dashboard', function($req,$res){

    AdminAuthMiddleware();

    $res->render('admin/dashboard', array(
        'title' => 'PocketPHP :: Administration Panel',
        'css' => array(
            'assets/css/bootstrap.min.css',
            'assets/css/admin.css'
        ),
        'js' => array(
            'assets/js/jqury-3.5.0.min.js',
            'assets/js/bootstrap.bundle.min.js',
        )
    ));
});



/** ===== Login Routes ===== **/
/** ======================== **/

$router->get('/admin/login', function($req,$res){

    AdminAuthMiddleware('/admin/dashboard');

    $res->render('admin/login', array(
        'title' => 'PocketPHP :: Login',
        'css' => array(
            'assets/css/bootstrap.min.css',
            'assets/css/admin.css',
        ),
        'js' => array(
            'assets/js/jquery-3.5.0.min.js',
            'assets/js/bootstrap.bundle.min.js',
        )
    ));
});

$router->post('/admin/login', function($req,$res){
    AdminAuthMiddleware();
    require(ROOT . '/controllers/admin/login.php');
});



/** ===== Register Routes ===== **/
/** =========================== **/

$router->get('/admin/register', function($req,$res){
    // This is deprecated functionality at the moment
    // because I don't really know how to properly
    // implement such thing like registrating for
    // admin position.
    // 
    // Still there's useful code for login page,
    // so I'll keep it.
    AdminAuthMiddleware();
});

$router->post('/admin/register', function($req,$res){
    AdminAuthMiddleware();
});



/** ===== Admin Logout Routes ===== **/
/** =============================== **/

$router->get('/admin/logout', function($req,$res){
    AdminAuthMiddleware();
    require(ROOT . '/controllers/admin/logout.php');
});
