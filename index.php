<?php
define('ROOT', dirname(__FILE__));

define('BASEDIR', str_replace('//', '/', dirname($_SERVER['SCRIPT_NAME']).'/'));

include 'fw/dispatcher/dispatcher.php';

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
?>

