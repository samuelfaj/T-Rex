<?php
    namespace TRex\Core\Classes;

    class Module
    {
        public $name;
        public $view;
        public $require;
        public $template;
        public $controller;

        public function __construct($name = '')
        {
            $this->name     = $name ?: basename($_SERVER['PHP_SELF'], '.php');
            $this->view     = new _View($this);
            $this->require  = new _Require($this);
            $this->template = new _Template($this);

            $controllerName   = '\\TRex\\Modules\\' . $this->name . '\\Controller';
            $this->controller = new $controllerName($this);
        }
    }