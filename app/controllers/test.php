<?php
class TestController {
    function _default() {
        include 'app/views/root.php';
    }
    
    function show() {
        global $someThing;
        $someThing = "This is some extra stuff.";
        include 'app/views/root.php';
    }
}
?>
