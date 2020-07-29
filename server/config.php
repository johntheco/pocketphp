<?php

/**
 * This is startup configuration file. It stores all
 * necessary settings for server's functionality with
 * `define` function.
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


/** ===== PHP Global Variables ===== **/
/** ================================ **/

define("ROOT", "{$_SERVER['DOCUMENT_ROOT']}");



/** ===== Template Engine Variables ===== **/
/** ===================================== **/

define("LAYOUT", "main");
define("ASSETS", "public");



/** ===== MySQL Database Variables ===== **/
/** ==================================== **/

define("HOST",        "");
define("DATABASE",    "");
define("USERNAME",    "");
define("PASSWORD",    "");



/** ===== Mongo Database Variables ===== **/
/** ==================================== **/

define("MONGO_PORT", "3100");

?>