<?php
include 'lib/dispatcher.php';

global $basedir;
global $dispatcher;

$basedir = "/dispatcher/";
$dispatcher = new Dispatcher();
$dispatcher->dispatch();
?>

