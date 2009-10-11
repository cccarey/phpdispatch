<?php
class Dispatcher {
    var $reqController;
    var $controller;
    var $controllerScript;
    var $controllerClass;
    var $action;
    var $parameters;
    
    function Dispatcher() {
        $requestURI = explode('/', $_SERVER['REQUEST_URI']);
        $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
        
        $commandArray = array_diff_assoc($requestURI, $scriptName);
        $commandArray = array_values($commandArray);
        
        $this->reqController = $commandArray[0];
        
        // Check if the url is the root.
        // if it is then set the command to the root controller
        // and _default function.
        if ($this->reqController == '') {
            // root controller is no the root of the folder, i.e. no requested controller
            $this->setController();
        }
        else {
            $this->setController($this->reqController);
        }
        $this->action = $commandArray[1];
        $this->parameters = array_slice($commandArray, 2);
    }
    
    function setController($name='root') {
        if ($name == '') {
            // if $name is set and empty, set to the root controller
            $name = 'root';
        }
        $this->controller = $name;
        $this->controllerScript = 'app/controllers/'.$this->controller.'.php';
        $this->controllerClass = $this->controller.'Controller';
    }
    
    function controllerExists() {
        if ($this->controller == $this->reqController || $this->reqController == '') {
            return file_exists($this->controllerScript);
        }
        return false;
    }
    
    function dispatch() {
        if (!$this->controllerExists()) {
            $this->setController();
        }
        include $this->controllerScript;
        $controller = new $this->controllerClass();
       
        if (!is_callable(array($controller, $this->action))) {
            $this->action = '_default';
        }
        
        call_user_func(array($controller, $this->action));
    }
}
?>
