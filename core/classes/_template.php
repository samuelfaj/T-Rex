<?php
    namespace TRex\Core\Classes;

    class _Template
    {
        public $module;
        public $folder;

        public function __construct(Module $module)
        {
            $this->module = $module;
        }

        public function get($name, $extension = '.php')
        {
            require(TREX_ROOT . 'template/' . $name . $extension);
        }

        public function header($name = 'header') : void
        {
            $this->get($name);
        }

        public function footer($name = 'footer') : void
        {
            $this->get($name);
        }
    }