<?php
    namespace TRex\AutoLoader;

    class Finder
    {
        public $path;

        private $rules;
        private $include_path;

        private const debug = false;

        public function __construct($name)
        {
            $this->name  = str_replace('\\', DIRECTORY_SEPARATOR, $name);
            $this->rules = preg_grep('/^rule_/', get_class_methods($this));
            $this->include_path = TREX_ROOT;

            foreach($this->rules as $rule)
            {
                call_user_func(array($this, $rule));
                if(!empty($this->path)) break;
            }
        }

        private function rule_1()
        {
            $path = $this->include_path . $this->name . '.php';

            if(self::debug) var_dump($path);
            if(file_exists($path)) $this->path = $path;
        }

        private function rule_2()
        {
            $name = $this->name;
            $path = $this->include_path . strtolower($name . '.php');

            if(self::debug) var_dump($path);
            if(file_exists($path)) $this->path = $path;
        }

        private function rule_3()
        {
            $name = $this->name;
            $path = $this->include_path . strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $name) . '.php');

            if(self::debug) var_dump($path);
            if(file_exists($path)) $this->path = $path;
        }

        private function rule_4()
        {
            $name   = $this->name;
            $path   = preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $name);
            $path   = explode('/', $path);
            $path[] = end($path);
            $path   = $this->include_path . strtolower( implode('/', $path) . '.php');

            if(self::debug) var_dump($path);
            if(file_exists($path)) $this->path = $path;
        }

        private function rule_5()
        {
            $name   = $this->name;
            $name   = str_replace('TRex' . DIRECTORY_SEPARATOR,'', $name);
            $path   = preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $name);
            $path   = explode('/', $path);
            $path   = $this->include_path . strtolower( implode('/', $path) . '.php');

            if(self::debug) var_dump($path);
            if(file_exists($path)) $this->path = $path;
        }

        private function rule_6()
        {
            $name   = $this->name;
            $name   = str_replace('TRex' . DIRECTORY_SEPARATOR,'', $name);
            $path   = preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $name);
            $path   = explode('/', $path);
            $path[] = end($path);
            $path   = $this->include_path . strtolower( implode('/', $path) . '.php');

            if(self::debug) var_dump($path);
            if(file_exists($path)) $this->path = $path;
        }
    }