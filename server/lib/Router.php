<?php

/**
 * This file contains the Router class. This is the main
 * system, which handles all request/respond functionality
 * for usual, or regexp, or static assets requests, while
 * catching errors, such as 404 and 405.
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


/** ===== Class Router ===== **/
/** ======================== **/

class Router {
    private $request;
    private $response;
    private $supportedHttpMethods = array(
        "GET",
        "POST",
        "PUT",
        "PATCH",
        "DELETE"
    );

    
    /** ===== Construct Method ===== **/
    /** ============================ **/

    function __construct(Request $request, Response $response){
        $this->request = $request;
        $this->response = $response;
    }


    /** ===== Call Method ===== **/
    /** ======================= **/

    function __call($name, $args){
        list($route, $method) = $args;

        if(!in_array(strtoupper($name), $this->supportedHttpMethods)){
            $this->invalidMethodHandler();
        }
        
        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }


    /** ===== Logging and Debugging ===== **/
    /** ================================= **/

    private function debugLog($line){
        $log_file = ROOT . '/log/router.log';
        file_put_contents($log_file, $line . "\n", FILE_APPEND);
    }


    /**
     * Formatting route by throwing away the full
     * path to the page (e.g. 'path/path/page' to
     * 'page') and returns it. If path is root,
     * then it returns '/' symbol.
     */
    private function formatRoute($route){
        $result = rtrim($route, '/');

        if($result === ''){
            return '/';
        }

        return $result;
    }


    /**
     * Handles all regexp requests. It's similar to
     * regular requests, except it goes first in line.
     */
    private function regexpRequestHandler($route, $methodDictionary){

        $route_list = $this->{strtolower($this->request->requestMethod)};

        if(!is_null($route_list)){
            foreach($route_list as $key => $value){
                if(@preg_match($key, null) !== false){
                    
                    /**
                     * Need to check out if static file
                     * of the same name exists...
                     */
                    $s_pos = strpos($route, 'assets/');
                    $s_route = substr($route, $s_pos);
                    $s_path = ROOT . '/' . ASSETS . '/' . $s_route;
                    if(file_exists($s_path)){
                        continue;
                    }

                    if(preg_match($key, $route)){
                        echo call_user_func_array($methodDictionary[$key], array($this->request, $this->response));
                        exit();
                    }
                } else {
                    continue;
                }
            }
        }
    }


    /**
     * Handles static assets requests. Checks
     * if current asset exists, and either returns
     * it, either redirecting to 404.
     */
    private function staticRequestHandler($route){
        $pos = strpos($route, 'assets/');
        $route = substr($route, $pos);

        $path = ROOT . '/' . ASSETS . '/' . $route;

        $slash = strrpos($path, '/');
        $dot = strrpos($path, '.');

        if($dot > $slash){
            if(file_exists($path)){
                if(substr($path, strlen($path) - 4) === '.css'){
                    header('Content-Type: text/css');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.aac'){
                    header('Content-Type: audio/aac');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.abw'){
                    header('Content-Type: application/x-abiword');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.arc'){
                    header('Content-Type: application/x-freearc');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.avi'){
                    header('Content-Type: video/x-msvideo');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.azw'){
                    header('Content-Type: application/vnd.amazon.ebook');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.bin'){
                    header('Content-Type: application/octet-stream');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.bmp'){
                    header('Content-Type: image/bmp');
                    readfile($path);
                } else if(substr($path, strlen($path) - 3) === '.bz'){
                    header('Content-Type: application/x-bzip');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.bz2'){
                    header('Content-Type: application/x-bzip2');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.csh'){
                    header('Content-Type: application/x-csh');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.csv'){
                    header('Content-Type: text/csv');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.doc'){
                    header('Content-Type: application/msword');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.docx'){
                    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.eot'){
                    header('Content-Type: application/vnd.ms-fontobject');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.epub'){
                    header('Content-Type: application/epub+zip');
                    readfile($path);
                } else if(substr($path, strlen($path) - 3) === '.gz'){
                    header('Content-Type: application/gzip');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.gif'){
                    header('Content-Type: image/gif');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.htm'){
                    header('Content-Type: text/html');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.html'){
                    header('Content-Type: text/html');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.ico'){
                    header('Content-Type: image/vnd.microsoft.icon');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.ics'){
                    header('Content-Type: text/calendar');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.jar'){
                    header('Content-Type: application/java-archive');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.jpg'){
                    header('Conten-Type: image/jpeg');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.jpeg'){
                    header('Content-Type: image/jpeg');
                    readfile($path);
                } else if(substr($path, strlen($path) - 3) === '.js'){
                    header('Content-Type: text/javascript');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.json'){
                    header('Content-Type: application/json');
                    readfile($path);
                } else if(substr($path, strlen($path) - 7) === '.jsonld'){
                    header('Content-Type: application/ld+json');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.map'){
                    header('Content-Type: application/octet-stream');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.mid'){
                    header('Content-Type: audio/midi'); // or 'audio/x-midi'
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.midi'){
                    header('Content-Type: audio/midi'); // or 'audio/x-midi'
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.mjs'){
                    header('Content-Type: text/javascript');
                    readfile($path);
                } else if(substr($path, strlen($path) -4) === '.mp3'){
                    header('Content-Type: audio/mpeg');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.mpeg'){
                    header('Content-Type: video/mpeg');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.mpkg'){
                    header('Conten-Type: application/vnd.apple.installer+xml');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.odp'){
                    header('Content-Type: application/vnd.oasis.opendocument.presentation');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.ods'){
                    header('Content-Type: application/vnd.oasis.opendocument.spreadsheet');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.odt'){
                    header('Content-Type: application/vnd.oasis.opendocument.text');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.oga'){
                    header('Content-Type: audio/ogg');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.ogv'){
                    header('Content-Type: video/ogg');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.ogx'){
                    header('Content-Type: application/ogg');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.opus'){
                    header('Content-Type: audio/opus');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.otf'){
                    header('Content-Type: font/otf');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.png'){
                    header('Content-Type: image/png');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.pdf'){
                    header('Content-Type: application/pdf');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.php'){
                    header('Content-Type: application/php');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.ppt'){
                    header('Content-Type: application/vnd.ms-powerpoint');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.pptx'){
                    header('Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.rar'){
                    header('Content-Type: application/x-rar-compressed');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.rtf'){
                    header('Content-Type: application/rtf');
                    readfile($path);
                } else if(substr($path, strlen($path) - 3) === '.sh'){
                    header('Content-Type: application/x-sh');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.svg'){
                    header('Content-Type: image/svg+xml');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.swf'){
                    header('Content-Type: application/x-shockwave-flash');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.tar'){
                    header('Content-Type: application/x-tar');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.tif'){
                    header('Content-Type: image/tiff');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.tiff'){
                    header('Content-Type: image/tiff');
                    readfile($path);
                } else if(substr($path, strlen($path) - 3) === '.ts'){
                    header('Content-Type: video/mp2t');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.ttf'){
                    header('Content-Type: font/ttf');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.txt'){
                    header('Content-Type: text/plain');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.vsd'){
                    header('Content-Type: application/vnd.visio');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.wav'){
                    header('Content-Type: audio/wav');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.weba'){
                    header('Content-Type: audio/webm');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.webm'){
                    header('Content-Type: video/webm');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.webp'){
                    header("Content-Type: image/webp");
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.woff'){
                    header('Content-Type: font/woff');
                    readfile($path);
                } else if(substr($path, strlen($path) - 6) === '.woff2'){
                    header('Content-Type: font/woff2');
                    readfile($path);
                } else if(substr($path, strlen($path) - 6) === '.xhtml'){
                    header('Content-Type: application/xhtml+xml');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.xls'){
                    header('Content-Type: application/vnd.ms-excel');
                    readfile($path);
                } else if(substr($path, strlen($path) - 5) === '.xlsx'){
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.xml'){
                    header('Content-Type: text/xml'); // 'application/xml' if NOT readable from casual users, instead 'text/xml'
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.xul'){
                    header('Content-Type: application/vnd.mozilla.xul+xml');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.zip'){
                    header('Content-Type: application/zip');
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.3gp'){
                    header('Content-Type: audio/3gpp'); // 'video/3gpp' if it contains video
                    readfile($path);
                } else if(substr($path, strlen($path) - 4) === '.3g2'){
                    header('Content-Type: audio/3gpp2'); // 'video/3gpp2' if it contains video
                    readfile($path);
                } else if(substr($path, strlen($path) - 3) === '.7z'){
                    header('Content-Type: application/x-7z-compressed');
                    readfile($path);
                }  else if(substr($path, strlen($path) - 5) === '.wsdl'){
                    header('Content-Type: application/wsdl+xml');
                    readfile($path);
                }  else {
                    readfile($path);
                }
            } else {
                // $this->debugLog("File doesn't exist: " . $route);
                header('Location: /404');
            }
        } else {
            // $this->debugLog("Not a static file: " . $route);
            header('Location: /404');
        }
    }


    /**
     * Handles all unsupported HTTP methods. Supported
     * methods are: GET, POST, PUT, PATCH, DELETE.
     */
    private function invalidMethodHandler(){
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
    }


    /**
     * Handles all requests for non-existing
     * routes. Always redirects to "404".
     */
    private function defaultRequestHandler(){
        header("Location: /404");
    }

  
    /**
     * Resolve Method, which processes all request
     * handlers, from regexp to regular, and 404.
     */
    function resolve(){
        $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->formatRoute($this->request->requestUri);
        $method = $methodDictionary[$formatedRoute];

        if(is_null($method)){
            // $this->debugLog('NULL METHOD || ROUTE: ' . $formatedRoute);
            if($this->regexpRequestHandler($formatedRoute, $methodDictionary)){
                // $this->debugLog('REGEX');
                return;
            } else if(!$this->staticRequestHandler($formatedRoute)){
                // $this->debugLog('STATIC');
                return;
            } else {
                $this->debugLog('DEFAULT');
                $this->defaultRequestHandler();
                return;
            }
        }

        echo call_user_func_array($method, array($this->request, $this->response));
    }


    /** ==== Destruct Method ===== **/
    /** ========================== **/
    function __destruct(){
        $this->resolve();
    }
}

?>