<?php

// Preparing HTML element with error...
$element = "
<div style=\"position: fixed; z-index: 3;\"class=\"toast\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\">
    <div class=\"toast-header\">
        <strong class=\"mr-auto\">Error</strong>
        <button type=\"button\" class=\"ml-2 mb-1 close\" data-dismiss=\"toast\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>
    <div class=\"toast-body\">
        {$_COOKIE['ERROR']}
    </div>
</div>
";

// If error is set, show it!
if(isset($_COOKIE['ERROR'])){
    echo $element;
}

?>