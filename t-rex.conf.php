<?php
    header('Content-Type: text/html; charset=utf-8');

    // DATABASE
    define('TREX_DATABASE'       , array(
        'host'     => 'localhost' ,  // string - Host of Connection.
        'user'     => 'root'      ,  // string - Connection Username.
        'password' => ''          ,  // string - Connection Password.
        'database' => 'test'      ,  // string - Default Database name.
        'db_type'  => 'mysqli'    ,  // string - Type of Database. It can be: 'mysql', 'mysqli' , 'mssql' , 'sqlserv' , 'pgsql'.
    ));

    // API
    define('TREX_API_VERSION' , '1.0');
    define('TREX_API_BASE'    , '\\TRex\\Classes\\Bases\\ApiMethod');
    define('TREX_API_INITIAL_NAMESPACE', 'TRex\\Classes\\Api\\');

    require_once TREX_ROOT. 'vendor/autoload.php';

    foreach (glob(TREX_ROOT. "classes/bases/*.php")     as $filename){ require_once($filename); }
    foreach (glob(TREX_ROOT. "classes/abstracts/*.php") as $filename){ require_once($filename); }
    foreach (glob(TREX_ROOT. "classes/api/*.php")       as $filename){ require_once($filename); }

    foreach (glob(TREX_ROOT. "core/classes/*.php")      as $filename){ require_once($filename); }
    foreach (glob(TREX_ROOT. "classes/*.php")           as $filename){ require_once($filename); }