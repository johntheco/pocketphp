<?php

if(is_array($this->css)){
    foreach($this->css as $value){
        if(file_exists(ROOT . '/' . ASSETS . '/' . $value)){
            echo "\r\n\t";
            echo '<link type="text/css" rel="stylesheet" href="' . $value . '">';
        }
    }
} else {
    if(file_exists(ROOT . '/' . ASSETS . '/' . $this->css)){
        echo "\r\n\t";
        echo '<link type="text/css" rel="stylesheet" href="' . $this->css . '">';
    }
}

?>