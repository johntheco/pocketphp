<?php

/**
 * This file contains the Response class, which handles
 * templating system with public `render` function. It
 * checks, whether requested view and layout exists,
 * and then either shows an error, or renders HTML page.
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

require_once('IResponse.php');



/** ===== Response Class ===== **/
/** ========================== **/

class Response implements IResponse {
    private $view;
    private $args;


    /**
     * Checks whether requested layout exists.
     */
    private function layout_exists($layout){
        $this->path = ROOT . '/views/layouts/' . $layout . '.php';
        if(file_exists($this->path)){
            $this->view_exists($this->view, $this->path);
        } else {
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>PocketPHP :: No Layout Error</title><link rel="stylesheet" href="assets/css/style.css"></head><body><h1>PocketPHP :: No Layout Error</h1><h2>Warning!</h2><p>You didn\'t configured layout PHP file for your views.<br>Please, create file with name \'' . $layout . '.php\' in \'views/layouts/\' directory.</p><br><br><br><p>Developed by John Theco<br>URL: <i>john.theco.dev@gmail.com</i><br>Version: <i>0.0.1</i></p></body></html>';
        }
    }


    /**
     * Checks whether requested view exists.
     */
    private function view_exists($view, $layout){
        $view = ROOT . '/views/' . $view . '.php';
        if(file_exists($view)){
            $this->view = $view;
            require_once($layout);
        } else {
            echo '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>PocketPHP :: No View Error</title><link rel="stylesheet" href="assets/css/style.css"></head><body><h1>PocketPHP :: No View Error</h1><h2>Warning!</h2><p>You didn\'t configured view PHP file for this route.<br>Please, create file with name \'' . $this->title . '.php\' in \'views\' directory.</p><br><br><br><p>Developed by John Theco<br>URL: <i>john.theco.dev@gmail.com</i><br>Version: <i>0.0.1</i></p></body></html>';
        }
    }


    /**
     * Parsing all arguments, which was requested, such as title,
     * css, or js, or other static files and etc, and then checking
     * whether requested layout and view are existing. If it is,
     * then it renders HTML page.
     */
    public function render($view, $args){
        $this->view = $view;
        $this->args = $args;

        foreach($this->args as $key => $value){
            $this->{$key} = $value;
        }

        if(!$this->title) { $this->title = "PocketPHP"; }
        if(!$this->layout){ $this->layout = LAYOUT;     }
        
        $this->layout_exists($this->layout);
    }
}

?>