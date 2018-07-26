<?php
    namespace TRex\Classes\Bases;

    use TRex\Query;

    class Table
    {
        protected $table = 'Table Name';
        protected $primary_key = 'idtable';


        public function get(
            array $where = array(['field' => '1', 'operator' => '=', 'value' => '1']),
            array $limit = array(0, 20))
        {
            $query = new Query();
            $query->table($this->table);

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

        public function add(array $fields)
        {
            $query = new Query();
            $query->table($this->table);
            return $query->insert($fields);
        }
    }