<?php
    namespace TRex;

    class Query extends \ClassDb\Query
    {
        public function __construct($connection = array(), $debugmode = false, $connect_automatically = true, $disconnect_at_destruct = false){
            if(empty($connection))
            {
                $connection = TREX_DATABASE;
            }

            parent::__construct($connection, $debugmode, $connect_automatically, $disconnect_at_destruct);
        }

    }