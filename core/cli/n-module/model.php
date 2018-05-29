<?php
namespace TRex\Modules\[%1];

class Model{
    public function __construct(){

    }

    public function example($string){
        return array($string, str_rot13($string));
    }
}