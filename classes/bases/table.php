<?php
    namespace TRex\Classes\Bases;

    use TRex\Core\Classes\Query;

    class Table
    {
        protected const table = 'Table Name';
        protected const primary_key = 'idtable';

        public $data = array();

        public function __construct($id)
        {
            if(empty($id)) return false;

            $get = $this->get(
                ['field' => self::primary_key, 'operator' => '=', 'value' => $id],
                [0, 1]
            );

            if(!empty($get->rows)){
                $this->data = $get->rows[0];
            }
        }


        public function get(
            array $where = array(['field' => '1', 'operator' => '=', 'value' => '1']),
            array $limit = array(0, 20)
        ) : object
        {
            $query = new Query();
            $query->table(self::table);

            foreach ($where as $where_)
            {
                $query->where($where_['field'], $where_['value'], $where_['operator']);
            }

            $query->limit($limit);
            $fetch = $query->select(['SQL_CALC_FOUND_ROWS *'])->fetch;
            $total = $query->exec('SELECT FOUND_ROWS() as conta')->fetch;

            return (object) array(
                'rows'  => $fetch,
                'total' => $total[0]['conta'] ?? 0
            );
        }

        public function add(array $fields) : object
        {
            $query = new Query();
            $query->table(self::table);
            return $query->insert($fields);
        }
    }