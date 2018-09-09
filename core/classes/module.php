<?php
    namespace TRex\Core\Classes;

    class Module
    {
        public $View;
        public $Require;
        public $Template;

        public function __construct($name = ''){
            $this->name     = $name ?: basename($_SERVER['PHP_SELF'], '.php');
            $this->View     = new _View($this);
            $this->Require  = new _Require($this);
            $this->Template = new _Template($this);

            $controllerName   = '\\TRex\\Modules\\' . $this->name . '\\Controller';
            $this->controller = new $controllerName($this);
        }
    }