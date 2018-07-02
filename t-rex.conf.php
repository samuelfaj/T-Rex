<?php
header('Content-Type: text/html; charset=utf-8');

define('TREX_DATABASE' , array(
    'host'     => 'localhost' ,  // string - Host of Connection.
    'user'     => 'root'      ,  // string - Connection Username.
    'password' => ''          ,  // string - Connection Password.
    'database' => 'test'      ,  // string - Default Database name.
    'db_type'  => 'mysqli'    ,  // string - Type of Database. It can be: 'mysql', 'mysqli' , 'mssql' , 'sqlserv' , 'pgsql'.
));

require_once TREX_ROOT. 'vendor/autoload.php';

foreach (glob("classes/*.php")      as $filename){ require_once($filename); }
foreach (glob("core/classes/*.php") as $filename){ require_once($filename); }

