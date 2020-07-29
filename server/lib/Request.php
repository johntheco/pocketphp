<?php

/**
 * This file contains a class for the Request class for
 * initializing objects that contain information about the
 * HTTP request.
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


/** ===== Import Interface ===== **/
/** ============================ **/

require_once('IRequest.php');



/** ===== Request Class ===== **/
/** ========================= **/

class Request implements IRequest {

    /** ===== Construct Method ===== **/
    /** ============================ **/

    function __construct(){
        $this->bootstrapSelf();
    }


    /**
     * Sets all keys in the global $_SERVER array as
     * properties of the Request class and assigns their
     * values as well.
     * 
     * $_SERVER is an array containing information such as
     * headers, paths, and scripts locations. The entries in
     * this array are created by the web server.
     */
    private function bootstrapSelf(){
        foreach($_SERVER as $key => $value){
            $this->{$this->toCamelCase($key)} = $value;
        }
    }    


    /**
     * Converts string from snake case to camel case.
     */
    private function toCamelCase($string){
        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);

        foreach($matches[0] as $match){
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }

        return $result;
    }


    /**
     * getBody() is an implementation of the method defined
     * in the IRequest interface. Returns array of all $_POST
     * recieved variables.
     */
    public function getBody(){
        if($this->requestMethod === "GET"){ return; }
        if($this->requestMethod === "POST"  ||
           $this->requestMethod === "PUT"   ||
           $this->requestMethod === "PATCH" ||
           $this->requestMethod === "DELETE"){
            $body = array();
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

        return $body;
        }
    }
}

?>