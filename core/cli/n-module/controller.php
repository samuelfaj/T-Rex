<?php
namespace TRex\Modules\[%1];

class Controller{
    public $module;

    public function __construct($module){
        $this->module = $module;
        $this->model  = new Model();
    }

    public function render(){
        $example = new Example();

        $this->module->View
            ->title('REX')
            ->css(true)
            ->javascript(true)
            ->data($this->model->example($example->name))
            ->render();
    }
}