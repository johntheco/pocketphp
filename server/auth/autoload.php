<?php

// Register given function as __autoload() implementation.
// When someone trying to create new class in PHP, it'll
// trigger and will try to do something by executing
// `Closure` function.

spl_autoload_register(function($class){

    /** The Package Namespace **/
    /** ===================== **/

    $ns = 'Aura\Auth';
    // $namespace = 'Aura\Auth';

    // echo "CLASS: " . $class . "<br>";
    // echo "NAMESPACE: " . $ns . "<br>";
    // echo "NAMESPACE: " . $namespace . "<br>";



    /** What prefixes should be recognized? **/
    /** =================================== **/

    // $prefixes = array(
    //     "{$namespace}\_Config\\" => array(
    //         __DIR__ . '/config'
    //     ),
    //     "{$namespace}\\" => array(
    //         __DIR__ . '/src',
    //         __DIR__ . '/tests',
    //     ),
    // );

    $prefixes = array(
        "{$ns}\_Config\\" => array(
            __DIR__ . '/config',
        ),
        "{$ns}\\" => array(
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ),
    );



    /** Go through the prefixes **/
    /** ======================= **/

    foreach($prefixes as $prefix => $dirs){

        /** Does the requested class match the namespace prefix? **/
        /** ==================================================== **/

        $prefix_len = strlen($prefix);
        // $prefix_length = strlen($prefix);

        // echo "PREFIX LENGTH: " . $prefix_length . "<br>";
        // echo "PREFIX: " . $prefix . "<br>";
        // echo "SUBSTR: " . substr($class, 0, $prefix_length) . "<br>";
        
        if(substr($class, 0, $prefix_len) !== $prefix){
            continue;
        }
        // if(substr($class, 0, $prefix_length) !== $prefix){
        //     continue;
        // }

        

        /** Strip the prefix off the class **/
        /** ============================== **/
        
        $class = substr($class, $prefix_len);
        // $class = substr($class, $prefix_length);
        
        // echo "CLASS: " . $class . "<br>";
        


        /** A Partial Filename **/
        /** ================== **/
        
        $part = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        // echo "PARTIAL: " . $part . "<br>";



        /** Go through the directories to find classes **/
        /** ========================================== **/

        foreach($dirs as $dir){
            $dir = str_replace('/', DIRECTORY_SEPARATOR, $dir);
            // echo "&nbsp;&nbsp;&nbsp;&nbsp;DIR: " . $dir . "<br>";
            $file = $dir . DIRECTORY_SEPARATOR . $part;
            // echo "&nbsp;&nbsp;&nbsp;&nbsp;FILE: " . $file . "<br>";
            if(is_readable($file)){
                // echo "&nbsp;&nbsp;&nbsp;&nbsp;FILE: " . $file . " is readable<br>";
                require $file;
                return;
            }
        }
    }
});

?>