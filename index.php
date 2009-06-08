<?php
define('BASEDIR', '/dispatcher/');
define('ROOT', dirname(__FILE__));

include 'lib/dispatcher.php';

global $basedir;

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
?>

