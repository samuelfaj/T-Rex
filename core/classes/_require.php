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

        private function core($neededFiles = array('controller','model','module.conf')){
            foreach ($neededFiles as $file) {
                if(file_exists($this->folder . $file . '.php')){
                    require_once($this->folder . $file . '.php');
                }
            }
        }

        private function classes(){
            foreach (glob($this->folder . "classes/*.php") as $filename){
                require_once($filename);
            }
        }

        public function css($name, $extension = '.css'){
            echo '<style>';
            require_once ($this->module->View->folder . $name . $extension);
            echo '</style>';
        }

        public function javascript($name, $extension = '.js'){
            echo '<script>';
            require_once ($this->module->View->folder . $name . $extension);
            echo '</script>';
        }
    }