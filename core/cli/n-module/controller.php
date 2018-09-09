<?php
namespace TRex\Modules\[%1];

class Controller{
    public $module;

    public function __construct($module){
        $this->module = $module;
        $this->model  = new Model();
    }

    public function render(){
        $this->module->view
            ->title('REX')
            ->css(true)
            ->javascript(true)
            ->data(array())
            ->render();
    }
}