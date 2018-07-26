<?php
    /*
        This is an example of T-REX API Class
        It's loaded always by t-rex.conf.php
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