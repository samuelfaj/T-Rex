<?php
    define("TREX_ROOT", __DIR__ ."/../");
    require_once(TREX_ROOT. 't-rex.conf.php');

    (new TRex\Api(explode('/', $_GET['params'])));