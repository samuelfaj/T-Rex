<?php
    namespace TRex\Core\Classes;

    class Api
    {
        protected $class;
        protected $method;
        protected $params;

        protected $base   = TREX_API_BASE;
        protected $header = 'Content-Type: application/json';

        public function __construct(array $params)
        {
            $this->class  = TREX_API_INITIAL_NAMESPACE . $params[0];
            $this->method = $params[1];
            $this->params = $params;

            if(!class_exists($this->class))
            {
                $this->error(404);
                die();
            }else{
                $this->class = new $this->class($this);
            }

            if (!is_subclass_of($this->class, $this->base))
            {
                $this->error(404);
                die();
            }

            if(!is_callable(array($this->class, $this->method)))
            {
                $this->error(404);
                die();
            }

            $this->execute();
        }

        public function execute() : void
        {
            $call = array($this->class, $this->method);
            call_user_func_array($call, array($this->params));
        }

        public function error(int $code) : void
        {
            $this->response($code, false);
        }

        public function response(int $code, $return = array()) : void
        {
            http_response_code($code);

            if(is_array($return))
            {
                header($this->header);
                echo json_encode($return);
            }
        }
    }