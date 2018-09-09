<?php
    namespace TRex\Core\Classes;

    class _Require{
        private $module;

        public function __construct($module){
            $this->module = $module;
            $this->folder = TREX_ROOT . 'modules/' . $this->module->name . '/';

            $this->core();
            $this->classes();
        }

        private function core($neededFiles = array('controller','model','module.conf')) : void
        {
            foreach ($neededFiles as $file) {
                if(file_exists($this->folder . $file . '.php')){
                    require_once($this->folder . $file . '.php');
                }
            }
        }

        private function classes() : void
        {
            foreach (glob($this->folder . "classes/*.php") as $filename){
                require_once($filename);
            }
        }

        public function css($name, $extension = '.css') : void
        {
            echo '<style>';
            require_once ($this->module->view->folder . $name . $extension);
            echo '</style>';
        }

        public function javascript($name, $extension = '.js') : void
        {
            echo '<script>';
            require_once ($this->module->view->folder . $name . $extension);
            echo '</script>';
        }
    }