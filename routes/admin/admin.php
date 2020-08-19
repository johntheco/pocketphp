<?php

$router->get('/admin', function($req,$res){

    // MIDDLEWARE :: Check if user has admin authentication token
    //               If he doesn't -> redirect to login page.
    //               Else -> redirect to dashboard.

    $admintoken = False;

    if($admintoken){
        header('Location: /admin/dashboard');
    } else {
        header('Location: /admin/login');
    }
});

$router->get('/admin/dashboard', function($req,$res){
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

    header('Location: /admin');
});

$router->post('/admin/register', function($req,$res){
    header('Location: /admin');
});
