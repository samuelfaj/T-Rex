<?php
    namespace TRex\Classes\Bases;

    use TRex\Core\Classes\Api;

    class ApiMethod
    {
        protected $api;

        final public function __construct(Api $api)
        {
            $this->api = $api;
        }

        final public function response($response, int $code = 200, bool $error = false)
        {
            $this->api->response($code, array(
                'link'    => $_SERVER['REQUEST_URI'] ,
                'code'    => $code                   ,
                'error'   => $error                  ,
                'version' => TREX_API_VERSION        ,
                'return'  => $response
            ));
        }

        final public function error(int $code = 400, string $description)
        {
            $this->response($description, $code, true);
        }
    }