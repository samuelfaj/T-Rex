<?php
    namespace TRex\Modules\Index;

    class Controller
    {
        public $module;
        public $data = array();

        public function __construct($module)
        {
            $this->module = $module;
            $this->model  = new Model();

            $example = new \TRex\Classes\Example();
            $this->data['global-class'] = $example->example();
        }

        public function render()
        {
            $example = new Example();
            $this->data['local-class'] = $this->model->example($example->name);

            $this->module->View
                ->title('REX')
                ->css(true)
                ->javascript(true)
                ->data($this->data)
                ->render();
        }
    }