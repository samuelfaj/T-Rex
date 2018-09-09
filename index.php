<?php
    define("TREX_ROOT", __DIR__ ."/");
    require_once('t-rex.conf.php');

    $module = new TRex\Core\Classes\Module($_GET['params'] ?? '');
    $module->controller->render();