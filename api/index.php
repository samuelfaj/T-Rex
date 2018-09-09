<?php
    define("TREX_ROOT", __DIR__ ."/../");
    require_once(TREX_ROOT. 'conf.php');

    use TRex\Core\Classes\Api;

    new Api(explode('/', $_GET['params']));