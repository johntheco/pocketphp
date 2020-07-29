<?php

/** ===== 404 Page Routes ===== **/
/** =========================== **/

$router->get('/404', function($req,$res){
    $res->render('404', array(
        'title' => '404',
        'css' => 'assets/css/style.css',
        'js'  => 'assets/js/jquery-3.5.0.min.js'
    ));
});

?>