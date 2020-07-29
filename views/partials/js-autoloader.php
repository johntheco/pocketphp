<?php

if(is_array($this->js)){
    foreach($this->js as $value){
        if(file_exists(ROOT . '/' . ASSETS . '/' . $value)){
            echo "\r\n\t";
            echo '<script type="text/javascript" src="' . $value . '"></script>';
        }
    }
} else {
    if(file_exists(ROOT . '/' . ASSETS . '/' . $this->js)){
        echo "\r\n\t";
        echo '<script type="text/javascript" src="' . $this->js . '"></script>';
    }
}

?>