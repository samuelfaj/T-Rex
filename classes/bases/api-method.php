<?php
    namespace TRex\Classes\Bases;

    use TRex\Api;

    class ApiMethod
    {
        protected $api;

        final public function __construct(Api $api)
        {
            $this->api = $api;
        }

        final public function response($response, int $code = 200)
        {
            $this->api->response($code, array(
                'link'    => $_SERVER['REQUEST_URI']          ,
                'code'    => $code                            ,
                'error'   => !!(round($code / 100) === 2)     ,
                'version' => TREX_API_VERSION                 ,
                'return'  => $response
            ));
        }

        final public function error(int $code = 400, string $description)
        {
            $this->response($description, $code);
        }
    }