<?php
    namespace TRex;

    class Db extends \ClassDb\Db
    {
        public function __construct(array $connection = array(),bool $debugmode = false, bool $connect_automatically = true, bool $disconnect_at_destruct = false)
        {
            if(empty($connection))
            {
                $connection = TREX_DATABASE;
            }

            parent::__construct($connection, $debugmode, $connect_automatically, $disconnect_at_destruct);
        }
    }