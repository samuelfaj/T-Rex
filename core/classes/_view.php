<?php
    namespace TRex\Core\Classes;

    class _View
    {
        public $name;
        public $data;
        public $folder;
        public $module;
        public $template;

        public $css        = true;
        public $javascript = true;

        public function __construct(Module $module)
        {
            $this->module = $module;
        }

        public function title($title) : _View
        {
            define('TREX_TITLE', $title);

            return $this;
        }

        public function css($boolean) : _View
        {
            $this->css = $boolean;

            return $this;
        }

        public function javascript($boolean) : _View
        {
            $this->javascript = $boolean;

            return $this;
        }

        public function data($data) : _View
        {
            $this->data = (object) $data;

            return $this;
        }

        public function render($name='view', $data = array()) : void
        {
            $this->name     = $name;
            $this->folder   = $this->module->require->folder . 'views/' . $name . '/';
            $this->template = $this->module->template;

            if(!empty($data)){ $this->data = (object) $data; }

            require_once ($this->folder . $name . '.php');

            if($this->css)       { $this->module->require->css($name);        }
            if($this->javascript){ $this->module->require->javascript($name); }
        }

        public function get($name, $extension = '.php') : void
        {
            require_once ($this->folder . 'includes/' . $name . $extension);
        }

        public function asset($name) : string
        {
            return 'modules/' . $this->module->name . '/views/' . $this->name . '/assets/' . $name;
        }
    }