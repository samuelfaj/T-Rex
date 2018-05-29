<?php
    define("TREX_ROOT", __DIR__ ."/");
    require_once('t-rex.conf.php');

    $module = new TRex\Module();
    $module->controller->render();
?>