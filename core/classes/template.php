<?php
namespace TRex;

class _Template{
    public $folder;

    public function __construct($module){
        $this->module = $module;
    }

    public function get($name, $extension = '.php'){
        return require(TREX_ROOT . 'template/' . $name . $extension);
    }

    public function header($name = 'header'){
        $this->get($name);
    }

    public function footer($name = 'footer'){
        $this->get($name);
    }
}