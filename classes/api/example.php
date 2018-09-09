<?php
    /*
        This is an example of T-REX API Class
        You can see it on: http://localhost/T-Rex/api/Example/example
    */

    namespace TRex\Classes\Api;

    use \TRex\Classes\Bases\ApiMethod;

    class Example extends ApiMethod
    {
        public function example()
        {
            $this->response('oi');
        }
    }