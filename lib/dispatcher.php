<?php
class Dispatcher {
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
        
        $this->controller = $commandArray[0];
        $this->action = $commandArray[1];
        $this->parameters = array_slice($commandArray, 2);

        // Check if the url is the root.
        // if it is then set the command to the root controller.
        // and _default function.
        if ($this->controller == '') {
            $this->controller = 'root';
        }

        $this->controllerScript = 'app/controllers/'.$this->controller.'.php';
        $this->controllerClass = $this->controller.'Controller';
        
        //$this->Command = new Axial_Command($controllerName, $controllerFunction, $parameters);
    }
    
    function controllerExists() {
        return file_exists($this->controllerScript);
    }
    
    function dispatch() {
        if (!$this->controllerExists()) {
            return;
        }
        include $this->controllerScript;
        $controller = new $this->controllerClass();
        echo ($controller == null);
        $controller->execute();
    }
}
?>
