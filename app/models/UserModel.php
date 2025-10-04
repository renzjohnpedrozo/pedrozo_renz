<?php
    defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

    class UserModel extends Model {
        
        protected $table = 'users';
        protected $primary_key = 'id';
        
        public function __construct()
        {
            parent::__construct();
        }

        //eme
        public function get_user_by_id($id)
        {
            return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
        }

        public function get_all_users()
        {
            return $this->db->table($this->table)->get_all();
        }

        //eme end

        public function page($q = '', $limit = 10, $page = 1)
        {
            $offset = ($page - 1) * $limit;

             // === For total count ===
            $count_builder = $this->db->table('users');
                if ($q !== '') {
                    $count_builder->like('username', $q);
                    $count_builder->or_like('email', $q);
                }
            $total_rows = $count_builder->count();

            // === For records ===
            $records_builder = $this->db->table('users');
                 if ($q !== '') {
                    $records_builder->like('username', $q);
                    $records_builder->or_like('email', $q);
                }
            // LIMIT expects (offset, limit) for MySQL, so pass correctly
            $records = $records_builder->limit($offset, $limit)->get_all();

            return [
            'total_rows' => $total_rows,
            'records'    => $records
            ];
        }

    }
?>