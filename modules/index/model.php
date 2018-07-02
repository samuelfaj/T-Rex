<?php
namespace TRex\Modules\Index;

class Model{
    public function __construct()
    {

    }

    public function example($string)
    {
        return array($string, str_rot13($string));
    }
}