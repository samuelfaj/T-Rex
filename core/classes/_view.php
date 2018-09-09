<?php
    namespace TRex\Core\Classes;

    class _View{
        public $name;
        public $data;
        public $folder;
        public $template;

        public $css        = true;
        public $javascript = true;

        public function __construct($module){
            $this->module = $module;
        }

        public function title($title){
            define('TREX_TITLE', $title);

            return $this;
        }

        public function css($boolean){
            $this->css = $boolean;

            return $this;
        }

        public function javascript($boolean){
            $this->javascript = $boolean;

            return $this;
        }

        public function data($data){
            $this->data = (object) $data;

            return $this;
        }

        public function render($name='view', $data = array()){
            $this->name     = $name;
            $this->folder   = $this->module->Require->folder . 'views/' . $name . '/';
            $this->template = $this->module->Template;

            if(!empty($data)){ $this->data = (object) $data; }

            require_once ($this->folder . $name . '.php');

            if($this->css)       { $this->module->Require->css($name);        }
            if($this->javascript){ $this->module->Require->javascript($name); }
        }

        public function get($name, $extension = '.php'){
            require_once ($this->folder . 'includes/' . $name . $extension);
        }

        public function asset($name){
            return 'modules/' . $this->module->name . '/views/' . $this->name . '/assets/' . $name;
        }
    }