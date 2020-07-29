<?php

/**
 * This is the entry routing script. It handles routing
 * and templating functionality for user defined routes
 * and views by using `Router`, `Request` and `Response`
 * objects.
 * 
 * This code is based on the original material from this Medium paper:
 * https://medium.com/the-andela-way/how-to-build-a-basic-server-side-routing-system-in-php-e52e613cf241
 * 
 * 
 * @package PocketPHP
 * @version 0.0.1
 * @author  John Theco <john.theco.dev@gmail.com>
 * @license MIT
 * 
 * @link    https://gitlab.com/johntheco/pocketphp
 * @see     https://gitlab.com/johntheco/pocketphp#readme
 */


/** ===== Import Libraries ===== **/
/** ============================ **/

require_once('lib/Request.php');
require_once('lib/Response.php');
require_once('lib/Router.php');



/** ===== Router Object Creation ===== **/
/** ================================== **/

$router = new Router(new Request, new Response);



/** ===== Scan Routes Function ===== **/
/** ================================ **/

function ScanRoutes($directory){
    $routes = array();
    $route_list = scandir($directory);
    foreach($route_list as $route){
        if($route == ".") { continue; }
        if($route == ".."){ continue; }
        if(is_dir($directory . $route)){   
            $upper_route_list = ScanRoutes($directory . $route . '/');
            foreach($upper_route_list as $upper_route){
                array_push($routes, $upper_route);
            }
        } else {
            array_push($routes, $directory . $route);
        }
    }

    return $routes;
}



/** ===== Routes Scanning and Requiring ===== **/
/** ========================================= **/

$routes = ScanRoutes(ROOT . '/routes/');
foreach($routes as $route){ require_once($route); }

?>