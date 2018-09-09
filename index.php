<?php
    header('Content-Type: text/html; charset=utf-8');

    define("TREX_ROOT", __DIR__ ."/");
    require_once('conf.php');

    (new TRex\Core\Classes\Module($_GET['params'] ?? ''))
        ->controller
        ->render();