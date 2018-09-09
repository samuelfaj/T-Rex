<?php
    namespace TRex\Modules\Index;

    use TRex\Classes\Example as GlobalClass;
    use TRex\Modules\Index\Classes\Example as LocalClass;

    class Controller
    {
        public $module;
        public $data = array();

        public function __construct($module)
        {
            $this->module = $module;
            $this->model  = new Model();

            $example = new GlobalClass();
            $this->data['global-class'] = $example->example();
        }

        public function render()
        {
            $example = new LocalClass();
            $this->data['local-class'] = $this->model->example($example->name);

            $this->module->view
                ->title('REX')
                ->css(true)
                ->javascript(true)
                ->data($this->data)
                ->render();
        }
    }